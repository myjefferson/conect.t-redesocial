<?php session_start(); include("../conexao_banco.php");?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_dev/my_dmds_selected.css">
    <title>BOREALCODE - Demanda Selecionada</title>
</head>
<body>
    <?php include("../desenvolvedor/header_logo.php"); ?>
    <div class="container">
        <?php include("header_dev.php"); ?>
        <div id="posicao-blocos">
           
            <div id="bloco-topo">
                <?php
                    $busca_cli = mysqli_query($conexao, 'SELECT * FROM demandas WHERE id_dmds = '.$_GET["demds"].'');
                ?>
            </div>
           
            <div id="block-enviar">
                <h2>Envio de arquivo instalador</h2>
                <p>Selecione o arquivo/projeto desenvolvido e envie para o cliente.</p>
                <form action="my_dmds_selected.php" method="POST" enctype="multipart/form-data">
                    <input type="file" id="arquivo" name="arquivo" value="Selecionar<br>arquivo" style="display:none;">
                    <input type="button" id="arquivo" value="Upload Projeto" onClick="document.getElementById('arquivo').click()">
                    <button type="submit" name="enviar">Enviar</button>
                </form>
            </div>

            <div id="block-descricao">
                <?php 
                    $busca_demds = mysqli_query($conexao, 'SELECT * FROM demandas WHERE id_dmds = '.$_GET["demds"].'');
                    
                    if(mysqli_num_rows($busca_demds) > 0){
                        $load = mysqli_fetch_assoc($busca_demds);

                        echo "<p id='title'><strong>Título:</strong> ".$load['titulo']."</p><br>Objetivo: ".$load['objetivo']."<br>Prazo para entrega: ".$load['prazo']; 
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>