<?php session_start(); include("../conexao_banco.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>CONEC.T - Minhas demandas</title>
    <?php include("lib/itens_head.php") ?>
    <link rel="stylesheet" href="style_dev/css_dev/dmds_my.css">
</head>
<body name="desenvolvedor" >
    <div name="dev-mobile" id="body-mobile">
        <div class="container">
            <div class="row">
                <!--Bloco-esquerdo nav-->
                <?php include("nav_principal.php"); ?> 

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <!--Menu do topo-->
                    <?php include("nav_dmds.php"); ?>
                    
                    <div class="column-dmds">
                        <div class="card principal_1">
                            <div class="head-box1"><h3 id="dmds-head-text"><span class="material-icons pen">create</span> Demandas em atividade</h3></div> 

                            <div id="dmds-cards"> 

                                <?php $query = mysqli_query($conexao, "select * from demandas where id_working = ".$_SESSION['id']."");
                                    if(mysqli_num_rows($query) > 0){
                                        while($linha = mysqli_fetch_assoc($query)){
                                            echo"<div class='card card-dmds float-left col-xs-5 col-sm-6 col-md-6'>";
                                                echo"<a href='dmds_my_selected.php?dmds=".$linha['id_dmds']."' id='bloco_dem'>";                 
                                                echo"<p id='titulo'>".mb_strimwidth($linha['titulo'], 0, 30,"...")."</p>";
                                                echo"<p>".$linha['prazo']."</p>";
                                                echo"<p id='btn_ver_mais'>Mais detalhes</p>";                   
                                                echo"</a>";
                                            echo"</div>";
                                        }
                                    }else { ?>
                                        <div class="text-info">
                                            <h2 id="title-vazio"><span class="material-icons info">info</span> Nenhum projeto em atividade</h2>
                                            <p>Aproveite para <a href="dmds_main.php"><span class="material-icons search">search</span>PROCURAR UM PROJETO</a> e começar a trabalhar para um cliente.</p>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>

                        <div class="card principal_2">
                            <div class="head-box2"><h3 id="dmds-head-text"><span class="material-icons problem">report_problem</span> Demandas pendentes</h3></div> 

                            <div id="dmds-cards">    
                                <?php $query = mysqli_query($conexao, "select * from demandas where id_working = ".$_SESSION['id']."");
                                    if(mysqli_num_rows($query)){
                                        while($linha = mysqli_fetch_assoc($query)){
                                            echo"<div class='card-dmds card float-left col-xs-5 col-sm-6 col-md-6'>";
                                                echo"<a href='dmds_my_selected.php?dmds=".$linha['id_dmds']."' id='bloco_dem'>";                 
                                                echo"<p id='titulo'>".mb_strimwidth($linha['titulo'], 0, 30,"...")."</p>";
                                                echo"<p>".$linha['prazo']."</p>";
                                                echo"<p id='btn_ver_mais'>Mais detalhes</p>";                   
                                                echo"</a>";
                                            echo"</div>";
                                        }
                                    }else { ?>
                                        <div class="text-info">
                                            <h2 id="title-vazio"><span class="material-icons info">info</span> Nenhum projeto pendente.</h2>
                                            <p>Permanecendo sem pendências, você garante confiança do seu trabalho para o cliente.</p>
                                        </div>
                            <?php } ?>
                            </div>
                        </div>

                        <div class="card principal_3">
                            <div class="head-box3"><h3 id="dmds-head-text"><span class="material-icons block">not_interested</span> Demandas Canceladas</h3></div> 

                            <div id="dmds-cards">    
                                <?php $query = mysqli_query($conexao, "select * from demandas where id_working = ".$_SESSION['id']."");
                                    if(mysqli_num_rows($query)){
                                        while($linha = mysqli_fetch_assoc($query)){
                                            echo"<div class='card card-dmds float-left col-xs-5 col-sm-6 col-md-6'>";
                                                echo"<a href='dmds_my_selected.php?dmds=".$linha['id_dmds']."' id='bloco_dem'>";                 
                                                echo"<p id='titulo'>".mb_strimwidth($linha['titulo'], 0, 30,"...")."</p>";
                                                echo"<p>".$linha['prazo']."</p>";
                                                echo"<p id='btn_ver_mais'>Mais detalhes</p>";                   
                                                echo"</a>";
                                            echo"</div>";
                                        }
                                    }else { ?>
                                        <div class="text-info">
                                            <h2 id="title-vazio"><span class="material-icons info">info</span> Nenhum projeto cancelado.</h2>
                                            <p>Evite acontecer cancelamentos. Dependendo da situação, você ficará com pouca credibilidade.</p>
                                        </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>