<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CONEC.T - Login cliente</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_cli/css_cli/login_cli.css">
        <link rel="stylesheet" href="style_cli/materialize/icons_materialize.css">
        <link rel="stylesheet" href="style_cli/bootstrap/css_cli/bootstrap.min.css" type="text/css">
        <?php require "lib/itens_head.php"; require "lib/modais_info.php"; ?>
    </head>
    <body>
        <div class="container">           
            <div class="row"> 
            <h1><img class="float-md-left" src="style_cli/img_cli/logo.png" alt="CONECT.T"></h1>    
                <!---Conteúdo do esquerdo-->
                <div class="login-box col-sm-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="col-md-12"><h2 style="width: 100%">Entre como cliente</h2></div>

                    <!---Formulário-->   
                    <?php {?>
                        <form method="post" action="login_cli.php">
                            <div class="form-group">
                                <input required class="form-control" type="email" name="email" id="email" size="17" placeholder="Email" onfocus="input_click(this)">
                                <input required class="form-control" type="password" name="senha" id="senha" size="17" placeholder="Senha" onfocus="input_click(this)">
                                <a id="btn_recSenha" href="sys_recuperarSenha/index_rec.php"><p>Esqueceu sua senha?</p></a> 
                            </div>
                            <input type="submit" value="Entrar" id="btnEntrar" class="btn btn-primary"></p>
                            <a id="btn_cad" class="btn btn-primary" href="cadastro_cli.php"><p>Cadastre-se</p></a>   
                        </form>
                        <script>
                            function input_click(colorText){
                                colorText.style.backgroundColor='#385581'
                                colorText.style.color='white'
                            }
                        </script>
                    <?php }?>  
                </div>                               
            </div>
            <!--Rodapé-->
            <span id="rodape" class="align-middle" style="float: right; margin-top: 33%;">
                <p id="text-footer">&copy 2020 COPYRIGHT CONEC.T - <a style="color: #7D26CD;" href="../index_cli.php">Sobre</a> - <a href="../desenvolvedor/login_dev.php" style="color: #7D26CD;">Entrar como desenvolvedor</a></p>
            </span> 
        </div> 
        
        <?php
            //error_reporting(0); 
            session_start();
            if(isset($_SESSION["id_cli"])){
                header("Location: home_cli.php");
            }else{
                include("../conexao_banco.php");
                if(isset($_POST['email']) && isset($_POST['senha'])){

                    $email = mysqli_real_escape_string($conexao, $_POST['email']);
                    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);               
                    $senha = md5($_POST['senha']);

                    $nome_sql = mysqli_query($conexao, "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'");
                    $nome = mysqli_fetch_assoc($nome_sql);
                    
                    $query = "SELECT * FROM cliente WHERE email = '$email' and senha = '$senha' LIMIT 1";
                    
                    $resultado = mysqli_query($conexao, $query);
                    if(mysqli_num_rows($resultado) == 1){ 
                        header("Location: home_cli.php");               
                        $_SESSION["nome"] = $nome["nome"];
                        $_SESSION["email"] = $nome["email"];
                        $_SESSION["type_user"] = $nome["type_user"];
                        $_SESSION["foto"] = $nome["foto"];
                        $_SESSION["id_cli"] = $nome["id_cli"];
                        exit();
                    }else{ 
                        //Chamada do modal de erro
                        $text_title = "Ops! Tivemos um problema ao entrar.";
                        $text_body = "O Email ou a senha estão incorretos. Por favor, tente novamente.";
                        $text_btn = "Tentar Novamente";
                        $action_btn = "login_cli.php";
                        modalErro($text_title, $text_body, $text_btn, $action_btn);
                   }
                }
            }                   
        ?>   
    </body>
    <script type="text/javascript" src="style_cli/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="style_cli/js/bootstrap.min.js"></script>
</html>
<?php ob_end_flush(); ?>