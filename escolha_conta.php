<?php
    session_start();
    if(isset($_SESSION['id_cli'])){
        header("Location: cliente/login_cli.php");
    }else if(isset($_SESSION['id_dev'])){
        header("Location: desenvolvedor/login_dev.php");
    }else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CONEC.T - Bem vindo</title>
        <!--Logo head CONEC.T-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        
        <link rel="icon" type="imagem/png" href="icones/conec.t-icon-head-web.png">
        <link rel="stylesheet" href="style_index/index_init.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="style_index/escolha_conta.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="line-01">
                    <div class="col-sm-12 col-lg-4 float-left">
                        <p class="obj-center bem-vindo">Bem-vindo à</p>
                        <p class="obj-center"><img id="logo" src="icones/logo-black.png"></p>
                        <p id="txt-covid">Todos juntos <b>contra</b> o <b>Covid-19</b>.</p>
                        <p>A prevenção é fundamental!</p>
                    </div>

                    <div class="col-sm-12 col-lg-8 float-right">
                        <img id="img-illustra" src="icones/img-09.png"> 
                    </div>
                </div>
                
                <div id="line-02">
                    <p id="txt-type-conta">Escolha o seu tipo de conta</p>
                    <div>                       
                        <a class="col-sm-12 col-lg-5" href="cliente/login_cli.php" id="btn_cli">Entrar como <b>cliente</b></a>
                        <a class="col-sm-12 col-lg-7" href="desenvolvedor/login_dev.php" id="btn_dev">Entrar como <b>desenvolvedor</b></a>
                    </div>
                </div>
            </div>
        </div>
        <!--RODAPÉ DA CONEC.T E ANIMAÇÕES INDEX-->
        <?php include("general_footer.html"); ?>
    </body>
</html>
    <?php } ?>