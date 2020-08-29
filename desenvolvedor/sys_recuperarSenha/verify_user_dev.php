<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CONEC.T SUPPORT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" type="imagem/png" href="../../icones/conec.t-icon-head-web.png">
    <link rel="stylesheet" href="./css/sysPassword.css" type="text/css">
    <link rel="stylesheet" href="../style_dev/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../style_dev/materialize/icons_materialize.css"> 
    
    <script type="text/javascript" src="../style_dev/bootstrap/js/jquery_ajax_2.1.3.min.js"></script>
    <script type="text/javascript" src="../style_dev/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../style_dev/bootstrap/js/bootstrap.min.js"></script>
</head>
    <body>
        <div id="verify">
            <?php 
                session_start();
                require '../../conexao_banco.php';
                require "../lib/modais_info.php";   
                
                $id = $_GET['id'];
                $pass = $_GET['pass'];
                if(!empty($_GET['id']) && !empty($_GET['pass'])){    
                    $queryCod = mysqli_query($conexao, "SELECT * FROM cod_recpassword WHERE id = '$id' AND codRandom = '$pass' ");
                    if(mysqli_num_rows($queryCod) > 0){
                        
                        mysqli_query($conexao, "DELETE FROM cod_recpassword WHERE id = '$id' AND codRandom = '$pass' ");
                    }else{
                        header("Location: expirado.php");
                        session_destroy();
                    }   
                }
                
            ?>

            <img src="../style_dev/img_dev/logo.png" id="logo"><label id="support">SUPPORT</label>
            <div class="container">
                <div class="row">
                    <div class="box-center col-sm-12 col-md-12 col-lg-12 col-xs-12" align="center">
                        <div class="box-form col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="box-enviar-email">   
                                <span class="material-icons">supervisor_account</span>             
                                <form class="col-sm-12 col-md-12 col-lg-12 col-xs-8" action="alterar_senha.php?pass=<?php echo$_GET['pass']; ?>" method="POST">
                                    <h3>Confirmação de usuário</h3>
                                    <h5>Desenvolvedor</h5>
                                    <p id="text_help"><b>Atenção:</b> </br>Preencha os campos corretamente para recuperar sua senha.</p>
                                    <div>      
                                        <p id="txt-email">Email</p>
                                        <input class="form-control" type="email" name="email" placeholder="exemplo@email.com" required autocomplete="off">
                                               
                                        <div class="float-left col-6">
                                            <p id="txt-email">Data de nascimento</p>
                                            <input class="form-control" type="date" name="data-nasc" value="00-00-0000" required>
                                        </div>
                                        <div class="float-right col-6">
                                            <p id="txt-email">Gênero</p>                   
                                            <select class="form-control" name="genero" required>
                                                <option value="" selected disabled>Gênero</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                                <option value="NI">Não informar</option>
                                            </select>
                                        </div>
                                        <input class="form-control btn btn-primary" type="submit" name="btnVerificar" value="Enviar">
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