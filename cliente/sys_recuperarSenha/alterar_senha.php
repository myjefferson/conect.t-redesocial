<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CONEC.T SUPPORT - Recuperação de conta</title>
        <meta name="viewport" content="width=cliice-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="icon" type="imagem/png" href="../../icones/conec.t-icon-head-web.png">
        <link rel="stylesheet" href="css/sysPassword.css" type="text/css">
        <?php include("header.html"); ?>
    </head>
    <body>
        <?php 
            ob_start(); 
            session_start();
            require '../../conexao_banco.php';
            require "../lib/modais_info.php"; 
            
            //CONFIRMAR USUÁRIO

            if(empty($_GET['pass'])){
                session_destroy();
                header("Location: expirado.php");
            }

            if(isset($_POST['btnVerificar'])){
                if(!empty($_POST['email']) || !empty($_POST['data-nasc'])){
                    $emailcli = $_POST['email'];
                    $dataNasc = $_POST['data-nasc'];

                    $queryDados = mysqli_query($conexao, "SELECT * FROM cliente WHERE email = '$emailcli' AND dataNascimento = '$dataNasc'");
                    if(mysqli_num_rows($queryDados) > 0){      
                        $user = mysqli_fetch_assoc($queryDados); 
                        //ATUALIZANDO O USUARIO E APLICANDO UMA NOVA CHAVE DE SEGURANÇA
                        $newKey = sha1(uniqid(mt_rand(), true));
                        $pass = $_GET['pass'];
                        mysqli_query($conexao, "UPDATE cliente SET forKey = '$newKey' WHERE email = '$emailcli'") or die("Ocorreu um erro ao atualizar a chave");
                        //Chama modal Sucesso
                        $text_title = "TUDO CERTO, ".$user['nome'].".";
                        $text_body = "Na próxima etapa, você vai começar a alterar sua senha!";
                        $text_btn = "Continuar";
                        $action_btn = "alterar_senha.php?pass=$pass&key=$newKey";
                        modalSucesso($text_title, $text_body, $text_btn, $action_btn);
                    }else{ 

                        //Chamada do modal de erro
                        $text_title = "Ops! Temos um problema.";
                        $text_body = "O Usuário não foi encontrado ou</br>está associado a uma conta <b>Cliente</b>.";
                        $text_btn = "Voltar para o login";
                        $action_btn = "../login_cli.php";
                        modalErro($text_title, $text_body, $text_btn, $action_btn);
                    }   
                }else{
                    //Chamada do modal de erro
                    $text_title = "PREENCHER OS CAMPOS É OBRIGATÓRIO.";
                    $text_body = "Você não preencheu todos os campos,</br>e a solicitação expirou. Solicite uma</br>nova recuperação de conta.";
                    $text_btn = "Tentar novamente";
                    $action_btn = "index_rec.php";
                    modalErro($text_title, $text_body, $text_btn, $action_btn);
                }
            }
 
            //ALTERAR SENHA
            if(isset($_POST['btnUpPass'])){  
                //VERIFICA A EXISTÊNCIA DA CHAVE
                error_reporting(0);
                $key = $_GET['key'];
                $queryKey = mysqli_query($conexao, 'SELECT * FROM cliente WHERE forKey = "'.$_GET['key'].'" ');
                if(mysqli_num_rows($queryKey) > 0){
                    $pass = $_GET['pass'];

                    if(!empty($_POST['Pass']) && !empty($_POST['repPass'])){     
                        if($_POST['Pass'] != $_POST['repPass']){ 
                            //Chamada de erro
                            $text_title = "AS SENHAS NÃO ESTÃO IGUAIS.";                                   
                            $text_body = "Por favor, tente novamente, deixando as senhas iguais.";
                            $text_btn = "Tentar novamente";
                            $action_btn = "alterar_senha.php?pass=$pass&key=$key";
                            modalErro($text_title, $text_body, $text_btn, $action_btn); 
                        }
                        else{    
                            if(mysqli_query($conexao, 'UPDATE cliente SET senha = "'.md5($_POST['repPass']).'" WHERE forKey = "'.$_GET['key'].'"')){
                                session_destroy();
                                //SELECT DO USUARIO PARA ENTRAR
                                $querycli = mysqli_query($conexao, 'SELECT * FROM cliente WHERE senha = "'.md5($_POST['repPass']).'" AND forKey = "'.$_GET['key'].'"') or die ("Ocorreu um erro ao selecionar usuário");
                                $infocli = mysqli_fetch_assoc($querycli);
                                $nome = $infocli['nome'];
                                $email = $infocli['email'];
                                $senha = $infocli['senha'];

                                //UPDATE PARA TIRAR A CHAVE DO USUARIO
                                mysqli_query($conexao, "UPDATE cliente SET forKey = NULL WHERE email = '$email' AND senha = '$senha' ") or die("Ocorreu um erro ao fazer atualização");
                                
                                session_start();
                                $_SESSION["nome"] = $infocli["nome"];
                                $_SESSION["email"] = $infocli["email"];
                                $_SESSION["type_user"] = $infocli["type_user"];
                                $_SESSION["foto"] = $infocli["foto"];
                                $_SESSION["id_cli"] = $infocli["id_cli"];
                                
                                //Chamada de sucesso
                                $text_title = "BEM-VINDO DE VOLTA! $nome.";                                   
                                $text_body = "Sua conta foi recuperada, e ja podemos começar.";
                                $text_btn = "Entrar";
                                $action_btn = "../home_cli.php";
                                modalSucesso($text_title, $text_body, $text_btn, $action_btn);

                                //Limpa a chave de acesso 
                                $_GET['pass'] = 0;
                                $_GET['key'] = 0;

                            }else{
                                $text_title = "OPS! UM PROBLEMA OCORREU.";                                   
                                $text_body = "O tempo de recuperação expirou.</br>Por favor, tente novamente, gerando</br>uma nova recuperação de senha.";
                                $text_btn = "Tentar novamente";
                                $action_btn = "index_rec.php";
                                modalErro($text_title, $text_body, $text_btn, $action_btn); 
                            }                                                    
                        }         
                    }else{
                        
                        $text_title = "Não esqueça dos campos.";
                        $text_body = "Por favor, preencha todos os campos <b>corretamente<b>.";
                        $text_btn = "Tentar novamente";
                        $action_btn = "alterar_senha.php?pass=$pass&key=$key";
                        modalErro($text_title, $text_body, $text_btn, $action_btn);
                    }
                }else{
                    session_destroy();
                    header("Location: expirado.php");
                }
            } ?>

        <div id="updatePassword">
            <img src="../style_cli/img_cli/logo.png" id="logo"><label id="support">SUPPORT</label>
            <div class="container">
                <div class="row">
                    <div class="box-center col-sm-12 col-md-12 col-lg-12 col-xs-12" align="center">
                        <div class="box-form col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="box-enviar-email">   
                                <span class="material-icons">lock</span>             
                                <form class="col-sm-12 col-md-12 col-lg-12 col-xs-8" action="alterar_senha.php?pass=<?php if(isset($_GET['pass'])){ echo$_GET['pass']; } ?>&key=<?php if(isset($_GET['key'])){ echo$_GET['key']; } ?>" method="POST">
                                    <h3>Recuperação de conta</h3>
                                    <h5>Cliente</h5>
                                    <p id="text_help"><b>Atenção:</b> </br>Digite uma nova senha para recuperar sua conta.</p>
                                    <div>      
                                        <p id="txt-password">Digite a nova senha</p>
                                        <input minlength="6" oninvalid="setCustomValidity('A senha precisa ter no mínimo 6 digitos.')" class="form-control" type="password" name="Pass" require>
                                        <p id="txt-password">Digite novamente a nova senha</p>
                                        <input minlength="6" oninvalid="setCustomValidity('A senha precisa ter no mínimo 6 digitos.')" class="form-control" type="password" name="repPass" require>   
                                        <input class="form-control btn btn-primary" type="submit" name="btnUpPass" value="Salvar alterações">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    ob_end_flush();
?>