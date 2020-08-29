<?php session_start(); include("../conexao_banco.php");?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>   
    <title>CONEC.T - Demanda Selecionada</title>
    <?php include("lib/itens_head.php") ?>
    <link rel="stylesheet" href="style_dev/css_dev/dmds_my_selected.css">
</head>
    <body>

        <div class="container">
            <div class="row">
                <!--Bloco-esquerdo nav-->
                <?php include("nav_principal.php"); ?>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <!--Menu do topo-->
                    <?php include("nav_dmds.php"); ?>
                    <div class="blocos-principal">
                        <div id="ajust-top"> 
                            <div id="bloco-topo">
                                <div class="col-9 float-left">
                                <button type="button" id="btn-voltar" onClick="history.go(-1)"><span class="material-icons">arrow_back_ios</span>Voltar</button>
                                    <?php
                                        $busca_cli = mysqli_query($conexao, 'SELECT * FROM demandas D, cliente_teste C WHERE D.id_dmds = '.$_GET["dmds"].' AND C.id = D.id_cli ');
                                        $row_cli =mysqli_fetch_assoc($busca_cli);
                                    ?>
                                    <img src="" onerror='this.src="style_dev/img_dev/sem-perfil.png"'>
                                    <p id="txt-cliente">Cliente</p>
                                    <h2 id="nome"><?php echo$row_cli['nome_cliente']; ?></h2>
                                </div>

                                <!--Box de enviar arquivo-->
                                <div class="card-enviar col-3 float-right">                          
                                    <div class="header-text"><h2><!--Em falta aplicar--></h2></div>
                                        <div class="body-enviar">
                                        
                                            <form action="my_dmds_selected.php" method="POST" enctype="multipart/form-data">
                                                <input type="file" id="arquivo" name="arquivo" value="Selecionar<br>arquivo" style="display:none;" required>
                                                <div id="arquivo" onClick="document.getElementById('arquivo').click()"><p><span class="material-icons">add_circle</span></p></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <?php
                                $busca_demds = mysqli_query($conexao, 'SELECT * FROM demandas WHERE id_dmds = '.$_GET["dmds"].'');
                                $load = mysqli_fetch_assoc($busca_demds);
                            ?>

                            <!--INICIO OBSERVAÇOES-->
                            <div id="block-obs">
                                <p>OBSERVAÇÕES IMPORTANTES DO PROJETO</p>
                                <div id="block-obs1">
                                    <span class="material-icons col-1">error</span><label class="col-10">O prazo de entrega é <?php echo$load['prazo']; ?></label>
                                </div>

                                <div id="block-obs2">
                                    <span class="material-icons col-1">error</span><label class="col-10">O prazo de entrega é <?php echo$load['prazo']; ?></label>
                                </div>
                            </div>

                            <!--INICIO DESCRIÇÃO-->
                            <div id="block-descricao">
                                <p>DESCRIÇÃO DO PROJETO</p>
                                <!--Titulo-->
                                <div id="box-principal">
                                    <label>Título</label>
                                    <div id="text">
                                        <?php echo$load['titulo']; ?>
                                    </div>
                                </div>
                                <!--Objetivo-->
                                <div id="box-principal">
                                    <label>Objetivo</label>
                                    <div id="text">
                                        <?php echo$load['objetivo']; ?>
                                    </div>
                                </div>

                                <div id="box-principal">
                                    <label>Observações</label>
                                    <div id="text">
                                        <?php echo$load['observs']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>