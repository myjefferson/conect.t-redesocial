<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CONEC.T Store - Anunciar Programa</title>

        <link rel="stylesheet" href="assets/css/publish_software.css">
        <script type="text/javascript" src="assets/js/mask.js"></script>
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

            include("navTop_store.php");
        ?>

        <div class="container">
            <div class="row">
                <form method="POST" action="publish_software.php" enctype="multipart/form-data">
                    <div id="top-title">
                        <h1>Anunciar Programa</h1>
                        <p>Por favor, preencha todos os campos a seguir e certifique-se que todos os dados estão corretos.</p>
                    </div>

                    <h3>Detalhes do produto</h3>
                    
                    <div id="box">
                        <p>Título do produto</p>
                        <input type="text" class="form-control" id="title" name="title">
                        <p>Breve resumo de apresentação</p>
                        <textarea placeholder="Melhore sua produtividade com esse programa que..." maxlength="130" class="form-control" id="smallAbout" name="smallAbout"></textarea>
                    </div>   

                    <div id="box_right">
                        <input type="file" id="imagePrincipal" name="imagePrincipal">
                    </div>
                    <a href="javascript::" onclick="addFoto();"><span class="material-icons">add_circle</span>Foto Principal</a>
                    
                    <script> $("#imagePrincipal").hide(); function addFoto(){ $("#imagePrincipal").click(); } </script>
                    
                    <div id="box">
                        <p>Descrição do produto</p>
                        <textarea placeholder="Escreva uma descrição sobre o seu produto detalhadamente." class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div id="box">
                        <p>Classificação indicativa</p>
                        <p>Livre</p>
                        <input type="radio" id="L" name="parentalRating" value="L">
                        <p>10</p>
                        <input type="radio" id="10" name="parentalRating" value="10">
                        <p>12</p>
                        <input type="radio" id="12" name="parentalRating" value="12">
                        <p>14</p>
                        <input type="radio" id="14" name="parentalRating" value="14">
                        <p>16</p>
                        <input type="radio" id="16" name="parentalRating" value="16">
                        <p>18</p>
                        <input type="radio" id="18" name="parentalRating" value="18">
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
                            
                            <script> function selectDialog(){$("#software").click();} $("#software").hide(); </script>
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
            </div>
        </div>
    </body>
</html>