<?php session_start(); include("../conexao_banco.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>CONEC.T - Desenvolver</title>
    <?php include("lib/itens_head.php"); ?>
    <link rel="stylesheet" href="style_dev/css_dev/dmds_main.css">
</head>
    <body name="desenvolver">
        <div name="dev-mobile" id="body-mobile">
            <div class="container">
                <div class="row">   
                    
                    <?php 
                        //Menu principal
                        include("nav_principal.php");  
                    ?>
                    
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <?php 
                            //Menu do topo
                            include("nav_dmds.php"); 
                        ?>

                        <div class="column-dmds">   
                            <?php 
                                $query_dmds = mysqli_query($conexao, "SELECT C.nome, D.id_dmds, D.titulo, D.objetivo, D.observs, D.prazo, D.rec_dinheiro FROM demandas D, cliente C WHERE D.id_cli = C.id_cli ORDER BY id_dmds DESC");
                                if(mysqli_num_rows($query_dmds) > 0){               
                                    while($demanda = mysqli_fetch_assoc($query_dmds)){
                                        echo "<a href='dmds_client_selected.php?demds=".$demanda['id_dmds']."' id='demds_link'>";
                                            echo"<div class='box_project'>";
                                                echo"<img src='fotos_dev/.foto_aqui.' id='postador' onerror=this.src='../icones/sem-perfil.png'>";
                                                echo "<p class='name'>".$demanda['nome']."</p></br>";
                                                echo "<p class='titulo'>".$demanda['titulo']."</p>";
                                                //echo $demanda['tipo_money']."<br>";
                                                echo "<p class='pag'>Pagamento: ".$demanda['rec_dinheiro']."</p>";
                                            echo"</div>";
                                        echo"</a>";
                                    }
                                }else{
                                    echo"<p>Nenhum projeto encontrado.</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>