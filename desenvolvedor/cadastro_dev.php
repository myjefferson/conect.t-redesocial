<?php 
    session_start();
    if(isset($_SESSION['id_dev'])){
        header("location: home_dev.php");
    } 
    require "lib/modais_info.php"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CONEC.T - Cadastro desenvolvedor</title>
        <?php include("lib/itens_head.php") ?>
        <link rel="stylesheet" href="style_dev/css_dev/cad_dev.css">     
    </head>
    <body>
        <div class="container-fluid"><p><img class="float-md-left" src="style_dev/img_dev/logo.png" alt="CONECT.T"></p></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4">
                    
                    <?php            
                        include("../conexao_banco.php");
                        if(isset($_POST['submit'])){

                            $nome = trim($_POST['nome']);
                            $dataNasc = trim($_POST['dataNasc']);
                            $email = trim($_POST['email']);
                            $senha = trim($_POST['senha']);


                            if(!empty($nome) && !empty($dataNasc) && !empty($senha) && !empty($email)){
                                
                                if($_POST['senha'] == $_POST['senha-novamente']){              
                                    $nome = $_POST['nome'];
                                    $data = $_POST['dataNasc'];
                                    $genero = $_POST['genero'];
                                    $email = $_POST['email'];
                                    $senha = md5($_POST['senha']); //criptografia de senha
                                    $termos = $_POST['termos'];
                                    $termos = array_key_exists('termos', $_POST) ? 1 : 0;

                                    $insercao = "INSERT INTO desenvolvedor (type_user, nome, dataNascimento, genero, email ,senha, termos) VALUES ('dev', '$nome', '$data','$genero','$email','$senha', $termos)";
                                    
                                    if(mysqli_query($conexao, $insercao)){ 
                                        //Chamada do modal   
                                        $text_title = "BEM-VINDO, ".$_POST['nome'];                                   
                                        $text_body = "Agora você está cadastrado na CONEC.T, vamos continuar?";
                                        $text_btn = "Continuar";
                                        $action_btn = "cadastro_dev.php";
                                        modalSucesso($text_title, $text_body, $text_btn, $action_btn);    
                                            
                                        if(isset($_POST['email']) && isset($_POST['senha'])){

                                            $email = mysqli_real_escape_string($conexao, $_POST['email']);
                                            $senha = mysqli_real_escape_string($conexao, $_POST['senha']);               
                                            $senha = md5($_POST['senha']);
                                
                                            $nome_sql = mysqli_query($conexao, "SELECT id_dev, nome, foto FROM desenvolvedor WHERE email = '$email' AND senha = '$senha'");
                                            $nome = mysqli_fetch_assoc($nome_sql);
                                            
                                            $query = "SELECT * FROM desenvolvedor WHERE email = '$email' and senha = '$senha' LIMIT 1";
                                            
                                            $resultado = mysqli_query($conexao, $query);
                                            if(mysqli_num_rows($resultado) == 1){  
                                                $_SESSION["nome"] = $nome["nome"];
                                                $_SESSION["foto"] = $nome["foto"];
                                                $_SESSION["id_dev"] = $nome["id_dev"];
                                                $_SESSION["email"] = $nome["email"];
                                                exit();
                                            }
                                        }

                                    }else{                                       
                                        //Chamada do modal de erro
                                        $text_title = "Ops! Tivemos um problema com seu cadastro.";
                                        $text_body = "Por favor, tente novamente.";
                                        $text_btn = "Tentar Novamente";
                                        $action_btn = "cadastro_dev.php";
                                        modalErro($text_title, $text_body, $text_btn, $action_btn);
                                    }
                                }else{ 
                                    //Chamada do modal de erro
                                    $text_title = "Ops! Temos um problema.";
                                    $text_body = "As senhas não estão iguais. Por favor, tente novamente.";
                                    $text_btn = "Tentar Novamente";
                                    $action_btn = "cadastro_dev.php";
                                    modalErro($text_title, $text_body, $text_btn, $action_btn);
                                }             
                            }else{
                                //Chamada do modal de erro
                                $text_title = "Ops! Temos um problema.";
                                $text_body = "Por favor, preencha todos os campos.";
                                $text_btn = "Tentar Novamente";
                                $action_btn = "cadastro_dev.php";
                                modalErro($text_title, $text_body, $text_btn, $action_btn);
                            }
                        }

                        if(isset($_POST['entrar_conta'])){                         
                            header("Location: home_dev.php");
                        }
                    ?>
 
                    <p id="title">Cadastre-se como desenvolvedor</p>                
                    <?php {?>
                    <form name="cadastro" action="cadastro_dev.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <input class="form-control" id="nome" type="text" placeholder="Nome e Sobrenome" name="nome" focus required>
                            <script> $(".form-control[name='nome']").focus(); </script>

                            <!--p>Data de nascimento</p-->
                            <input class="col-6 form-control" id="data" type="date" name="dataNasc" value="2023-01-10">
                            <select class="col-6 form-control" name="genero" required>
                                <option value="" selected disabled>Gênero</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="NI">Não informar</option>
                            </select>
                            <input class="form-control" id="email" type="email" placeholder="Email" name="email" autocomplete="off">                       
                            <input minlength="6" oninvalid="setCustomValidity('A senha precisa ter no mínimo 6 digitos.')" class="form-control" type="password" placeholder="Nova Senha" name="senha" id="senha" required>  
                            <input minlength="6" oninvalid="setCustomValidity('A senha precisa ter no mínimo 6 digitos.')" class="form-control" type="password" placeholder="Digite sua senha novamente" name="senha-novamente" id="repeat-senha" required>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="termos" id="box-check" required>
                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                <label class="custom-control-label" for="box-check">Li e concordo com os<a href="#"> termos de uso</a>. Os termos estarão disponiveis dentro do site.</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" id="cadastrar" type="submit" name="submit">Cadastrar</button>
                        <a id="tenho_conta" href="login_dev.php">Já tenho uma conta</a>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </body>
</html>