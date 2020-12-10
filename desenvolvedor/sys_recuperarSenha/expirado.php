<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="css/expirado.css" type="text/css">
    <title>CONEC.T - Erro404</title>
    
    <?php include("header.html"); ?>
</head>
    <body>
        <div id="timeout">
            <div id="fundo" style="background: #1D2225">
                <span class="material-icons">report_problem</span>
                <div align="center"> 
                    <img src="../style_dev/img_dev/logo.png"><label>SUPPORT</label>
                </div>
                <h1 id="title">Ops! Solicitação expirada.</h1>
                <p id="text1">O tempo para a recuperação de senha se expirou.</p>
                <p id="text2">Por favor, tente novamente solicitar uma <b><a href="index_rec.php">nova recuperação de senha.</a></b></p>
            </div>
            <footer>
                <ul>
                    <li><a href="../login_cli.php">Entrar como cliente</a></li>
                    <li><a href="../../desenvolvedor/login_dev.php">Entrar como desenvolvedor</a></li>    
                    <li><a href="../../index.php">Sobre a CONEC.T</a></li>
                </ul>
            </footer>
        </div>
    </body>
</html>