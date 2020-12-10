<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CONEC.T Store - Anunciar Programa</title>

    <link rel="stylesheet" href="css_store/publish_software.css">
    <script type="text/javascript" src="js_store/mask.js"></script>
</head>
<body>
    <?php
        session_start();
        if(isset($_POST['publicar'])){
            if(isset($_POST['title']) && isset($_POST['site'])){
                include_once "functions_store.php";
                postar_programa();
            }else{
                echo"Por favor preencha todos os campos";
            }
        }
    ?>

    <?php include("nav_store.php"); ?>
    
    <form method="POST" action="publish_software.php" enctype="multipart/form-data">
        <div id="top-title">
            <h1>Anunciar Programa</h1>
            <p>Por favor, preencha todos os campos a seguir e certifique-se que todos os dados estão corretos.</p>
        </div>

        <h3>Detalhes do produto</h3>
        
        <div id="box">
            <p>Título do produto</p>
            <input type="text" class="form-control" id="title" name="title">
        </div>   
        
        <div id="box">
            <p>Descrição do produto</p>
            <textarea placeholder="Escreva uma descrição sobre o seu produto detalhadamente." class="form-control" type="text" id="description" name="description"></textarea>
        </div>

        <div id="box_right">
            <input type="file" id="imagePrincipal" name="imagePrincipal">
        </div>

        <div id="box">
            <p>Classificação indicativa</p>
            <input type="radio" id="L" name="class" value="L">
            <input type="radio" id="10" name="class" value="10">
            <input type="radio" id="12" name="class" value="12">
            <input type="radio" id="14" name="class" value="14">
            <input type="radio" id="16" name="class" value="16">
            <input type="radio" id="18" name="class" value="18">
        </div>

        <div id="box">
            <p>Plataforma</p>
            Apple<input type="checkbox" name="plataforma[]" value="Apple">
            Windows<input type="checkbox" name="plataforma[]" value="Windows">
            Android<input type="checkbox" name="plataforma[]" value="Android"><br>
        </div>
        
        <div id="principal_box">
            <div id="box_installer">
                <p>Instalador</p>
                <a href="javascript::" id="intaller" class="btn btn-primary" onclick="selectDialog();">Procurar</a>
                <input type="file" name="software" id="software">
                
                <script> function selectDialog(){$("#software").click();} $("#software").css('display','none'); </script>
            </div>
 
            <div id="box_desc_ver">
                <p>Notas da versão</p>
                <textarea type="text" class="form-control" name="desc_ver" id="desc_ver"></textarea>
            </div>
        </div>

        <h3>Contatos do desenvolvedor</h3>
        <div id="box">
            <p>Site</p>
            <input type="text" class="form-control" id="site" name="site" placeholder="https://www.sitedoprojeto.com">
        </div>
        <!--<script> $("#site").mask("(00) 0 0000-0000"); </script>-->
        
        <div id="box">
            <p>Email</p>
            <input type="email" class="form-control" id="email" name="email">
        </div> 
        
        <div id="box">
            <p>GitHub</p>
            <input type="text" class="form-control" id="github" name="github">
        </div> 
        
        <div id="box">
            <p>Preço do produto</p>
            <input type="checkbox" name="free" value=""><label>Gratuito</label>
            Preço<input type="text" class="form-control" id="preco" name="preco"><br>
        </div>

        <p id="confirm"><a href="index_store.php">Cancelar</a>
        <button type="submit" name="publicar" class="btn btn-primary">Publicar</button></p>
    </form>
</body>
</html>