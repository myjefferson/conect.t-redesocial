<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=cliice-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>CONEC.T SUPPORT - Recuperação de conta</title>
    <link rel="icon" type="imagem/png" href="../../icones/conec.t-icon-head-web.png">
    <link rel="stylesheet" href="./css/sysPassword.css" type="text/css">
    <?php include("header.html"); ?>
</head>
    <body>
        <div id="recuperar">
            <img src="../style_cli/img_cli/logo.png" id="logo"><label id="support">SUPPORT</label>
            <div class="container">
                <div class="row">   
                    <div class="box-center col-sm-12 col-md-12 col-lg-12 col-xs-12" align="center">
                        <div class="box-form col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="box-enviar-email">   
                                <span class="material-icons">lock</span>             
                                <form class="col-sm-12 col-md-12 col-lg-12 col-xs-8" action="recuperar_sys.php" method="post">
                                    <h3>Recuperação de conta</h3>
                                    <h5>Cliente</h5>
                                    <div>
                                        <p id="txt-email">Email</p>
                                        <input id="email" class="form-control" type="email" name="email_cli" placeholder="exemplo@email.com" autocomplete="off" require>
                                        <p id="text_help">Um link de recuperação será enviado para seu e-mail</p>
                                        <input class="form-control btn btn-primary" type="submit" name="btnEnviarEmail" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <ul>
				<li><a href="../login_cli.php">Entrar como cliente</a></li> 
                <li><a href="../../desenvolvedor/login_dev.php">Entrar como desenvolvedor</a></li>            
                <li><a href="../cadastro_cli.php">Cadastrar-se</a></li>
                <li><a href="../../index.php">Sobre a CONEC.T</a></li>
            </ul>
        </footer>
    </body>
</html>