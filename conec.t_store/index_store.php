<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CONEC.T Store</title>
        <link rel="stylesheet" href="css_store/index_store.css">
    </head>
    <body>
        <?php include("nav_store.php"); ?>

        <div class="conteudo">
            <header>
                <a id="btn_postar" href="publish_software.php">Publicar Projeto</a>
                <a id="btn_mypublics" href="my_publishs.php">Meus Anúncios</a>
            </header>

            <?php 
                if(isset($_GET['prog'])){
                    include("functions_store.php");
                }
            ?>

            <h2>Novos Programas</h2>
            <div class="fundo1">
                <session id="novos-programas">
                <?php
        
                    $query = mysqli_query($conexao, "SELECT * FROM programas_loja");
                    if($linhas = mysqli_num_rows($query) > 0){          
                        echo "<ul>";                                
                        $i = 0;     
                        while($load = mysqli_fetch_assoc($query) and $i++ < 5){                                                                                                             
                            echo "<li><a href='app_select.php?prog=".$load['id']."'><img src='icons_store/".$load['icone']."' id='icone'/><br><p> ".$load['titulo']."</p><p>".$load['plataforma']."<br>".$load['preco']."</p><br></a>";    
                            //echo "<a href='progs_store/".$load['arc_windows']."' download' id='baixar'><p>Baixar</p></a></li>";    
                            echo "<a href='progs_store/".$load['arc_windows']."' download id='baixar'><p>Baixar</p></a></li>";    
                        }      
                        //echo"<br><a href='#'>Ver mais</a>";                          
                        echo "</ul>";
                    }else{
                        echo"Nada encontrado";}
                ?>    

                </session>
            </div>

            <!--<session id="blocos">
                <figure><ficaption>Programas populares</figcaption>
                    <?php ?>
                </figure>         
            </session>

            <session id="melhores-dev-gratis">
                <p>Melhores desenvolvimentos gratuitos</p>
                <?php
                
                ?>                
            </session>

            <session id="melhores-dev-pagos">
                <p>Melhores desenvolvimentos pagos</p>
                <?php
                
                ?>                
            </session>

            <session id="melhores-dev">
                <p>Top desenvolvedores da semana</p>
                <?php
                
                ?>                
            </session>

            <session id="melhores-dev">
                <p>Melhores desenvolvedores</p>
                <?php
                
                ?>                
            </session>-->
            
        </div>
    </body>
</html>