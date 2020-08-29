<?php session_start(); include("../conexao_banco.php"); include("functions_dev.php"); verificar_sessao();?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style_dev/css_dev/my_dmds_dev.css">
    <link rel="stylesheet" href="style_dev/materialize/icons_materialize.css">  
    <link rel="stylesheet" href="style_dev/bootstrap/css/bootstrap.min.css" type="text/css">

    <script type="text/javascript" src="style_dev/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="style_dev/bootstrap/js/bootstrap.min.js"></script>
    <title>CONEC.T - Minhas Demandas</title>
</head>
<body>
    <div class="container">
        <div clas="row">
            <!--Bloco-esquerdo nav-->
            <?php include("../desenvolvedor/nav_dev.php"); ?>
            <div class="float-right">              
                <div class="card card-box-top">
                    <ul>
                        <li><i class="material-icons">people</i>Meus Crientes</li>
                        <li><i class="material-icons">today</i>Agenda</li>
                        <li><i class="material-icons">person_add</i>Solicitações</li>
                    </ul>
                </div>

                <div class="card principal">
                    <div class="head-box1"><h2 id="dmds-atv">Demandas em atividade</h2></div> 

                    <div id="dmds-cards">    
                        <?php $query = mysqli_query($conexao, "select * from demandas where id_working = ".$_SESSION['id']."");
                            while($linha = mysqli_fetch_assoc($query)){
                                echo"<div class='card float-left'>";
                                    echo"<a href='my_dmds_selected.php?demds=".$linha['id_dmds']."' id='bloco_dem'>";                 
                                    echo"<p id='titulo'>".mb_strimwidth($linha['titulo'], 0, 30,"...")."</p>";
                                    echo"<p>".$linha['prazo']."</p>";
                                    echo"<p id='btn_ver_mais'>Mais detalhes</p>";                   
                                    echo"</a>";
                                echo"</div>";
                            }
                        ?>
                    </div>
                </div>
                
                <div class="card principal">
                    <div class="head-box2"><h2 id="dmds-pds">Demandas pendentes</h2></div> 

                    <div id="dmds-cards">    
                        <?php $query = mysqli_query($conexao, "select * from demandas where id_working = ".$_SESSION['id']."");
                            while($linha = mysqli_fetch_assoc($query)){
                                echo"<div class='card float-left'>";
                                    echo"<a href='my_dmds_selected.php?demds=".$linha['id_dmds']."' id='bloco_dem'>";                 
                                    echo"<p id='titulo'>".mb_strimwidth($linha['titulo'], 0, 30,"...")."</p>";
                                    echo"<p>".$linha['prazo']."</p>";
                                    echo"<p id='btn_ver_mais'>Mais detalhes</p>";                   
                                    echo"</a>";
                                echo"</div>";
                            }
                        ?>
                    </div>
                </div>

                <div class="card principal">
                    <div class="head-box3"><h2 id="cldo-cli">Cancelado pelo cliente</h2></div> 

                    <div id="dmds-cards">    
                        <?php $query = mysqli_query($conexao, "select * from demandas where id_working = ".$_SESSION['id']."");
                            while($linha = mysqli_fetch_assoc($query)){
                                echo"<div class='card float-left'>";
                                    echo"<a href='my_dmds_selected.php?demds=".$linha['id_dmds']."' id='bloco_dem'>";                 
                                    echo"<p id='titulo'>".mb_strimwidth($linha['titulo'], 0, 30,"...")."</p>";
                                    echo"<p>".$linha['prazo']."</p>";
                                    echo"<p id='btn_ver_mais'>Mais detalhes</p>";                   
                                    echo"</a>";
                                echo"</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>