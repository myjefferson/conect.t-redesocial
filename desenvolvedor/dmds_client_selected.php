<?php session_start(); include("../conexao_banco.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CONEC.T - Demanda</title>
        <?php include("lib/itens_head.php") ?>
        <link rel="stylesheet" href="style_dev/css_dev/dmds_client_selected.css"> 
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!--Bloco-esquerdo nav-->
                <?php include("nav_principal.php");                
                    if(isset($_POST["foto"])){ altera_perfil(); } 
                    $busca_demds = mysqli_query($conexao, 'SELECT C.nome_cliente, D.id_dmds, D.titulo, D.objetivo, D.observs, D.prazo, D.rec_dinheiro FROM demandas D, cliente_teste C WHERE D.id_cli = C.id AND D.id_dmds = '.$_GET['demds'].'');                       
                    $load = mysqli_fetch_assoc($busca_demds);
                ?>   
                
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">    
                    <?php include("nav_dmds.php"); ?>

                    <div id="box-principal">                        
                        <div id="bloco-topo">
                            <button type="button" id="btn-voltar" onClick="history.go(-1)"><span class="material-icons">arrow_back_ios</span>Voltar</button>                                     
                            <p><?php echo"<img src='fotos_dev/..FOTO_AQUI..' id='postador' onerror=this.src='../icones/sem-perfil.png'>"; ?></br>
                            Cliente</p>
                            <p class="nome_cliente"><?php echo $load['nome_cliente']; ?></p>
                            <br/><button type="button" id="btn-solicitar">Solicitar Serviço</button>
                            <hr/>
                        </div>

                        <div id="block-descricao">
                            <?php                              
                            if(mysqli_num_rows($busca_demds) > 0){                                
                                ?>
                                <!--Título do projeto-->
                                <div class="card b1 border-0">   
                                    <div class="card-header bg-secondary">Título</div>   
                                        <div class="card-body bg-dark">                      
                                        <?php
                                            if(!trim(empty($load['titulo'])) == ""){
                                                echo"Nenhum título adicionado";
                                            }else{
                                                echo "<p>".$load['titulo']."</p>";
                                            }
                                        ?>
                                    </div>
                                </div>

                                <!--Objetivo do projeto-->        
                                <div class="card b2 border-0">   
                                    <div class="card-header bg-secondary">Objetivo</div>         
                                    <div class="card-body bg-dark">                
                                        <?php
                                            if(!trim(empty($load['objetivo'])) == ""){
                                                echo"Nenhum objetivo foi descrito";
                                            }else{
                                                echo "<p>".$load['objetivo']."</p>";
                                            }
                                        ?>
                                    </div>
                                </div>

                                <!--Observações do projeto-->        
                                <div class="card b3 border-0">   
                                    <div class="card-header bg-secondary">Observações</div>  
                                        <div class="card-body bg-dark">                      
                                        <?php
                                            if(!trim(empty($load['observs'])) == ""){
                                                echo"Nenhuma observação foi adicionada";
                                            }else{
                                                echo "<p>".$load['observs']."</p>";
                                            }
                                        ?>
                                    </div>
                                </div>

                                <!--Valor a ser pago-->        
                                <div class="card b4 border-0 rounded">   
                                    <div class="card-header bg-secondary">Valor a ser pago</div>          
                                        <div class="card-body bg-dark">          
                                        <?php
                                            if(!trim(empty($load['rec_dinheiro'])) == ""){
                                                echo"Valor a combinar";
                                            }else{
                                                echo "<p>".$load['rec_dinheiro']."</p>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                
                                <!--Prazo do projeto-->  
                                <div class="card b5 border-0"> 
                                    <div class="card-header bg-secondary">Prazo de entrega</div>   
                                    <div class="card-body bg-dark">                        
                                    <?php
                                    if(!trim(empty($load['prazo'])) == ""){
                                        echo"Nenhum prazo adicionado";
                                    }else{
                                        echo "<p>".$load['prazo']."</p>";
                                    }
                            }else{
                                echo"O projeto do cliente não encontrado, por favor tente novamente mais tarde.";
                            }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
        </div>                         
    </body>
</html>