<?php session_start();
if(isset($_SESSION['type_user'])){
    if($_SESSION['type_user'] == "dev"){ ?>

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
                        <img src="assets/img/L.png" class="" id="imgParental" alt="L" onclick="selectParental('L')">
                        <input type="radio" id="L" name="parentalRating" value="L">
                        <img src="assets/img/10.png" class="" id="imgParental" alt="10" onclick="selectParental('10')">
                        <input type="radio" id="10" name="parentalRating" value="10">
                        <img src="assets/img/12.png" class="" id="imgParental" alt="12" onclick="selectParental('12')">
                        <input type="radio" id="12" name="parentalRating" value="12">
                        <img src="assets/img/14.png" class="" id="imgParental" alt="14" onclick="selectParental('14')">
                        <input type="radio" id="14" name="parentalRating" value="14">
                        <img src="assets/img/16.png" class="" id="imgParental" alt="16" onclick="selectParental('16')">
                        <input type="radio" id="16" name="parentalRating" value="16">
                        <img src="assets/img/18.png" class="" id="imgParental" alt="18" onclick="selectParental('18')">
                        <input type="radio" id="18" name="parentalRating" value="18">
                    </div>
                    <script>
                        $("input[name='parentalRating']").css('display','none');
                        function selectParental(typeRating){
                            $("form input[value='"+typeRating+"']").prop('checked', true);
                            $("form #imgParental").attr('class','');
                            $("form img[alt='"+typeRating+"']").attr('class','checkParental');
                        } 
                    </script>

                    <div id="box">
                        <p>Plataforma</p>
                        <div class="boxPlatforms">
                            <img src="assets/img/apple.png" alt="Apple" class="" onclick="platform('Apple')">
                            <input type="checkbox" name="plataforma[]" value="Apple">
                            <img src="assets/img/windows.png" alt="Windows" class="" onclick="platform('Windows')">
                            <input type="checkbox" name="plataforma[]" value="Windows">
                            <img src="assets/img/linux.png" alt="Linux" class="" onclick="platform('Linux')">
                            <input type="checkbox" name="plataforma[]" value="Linux">
                            <img src="assets/img/android.png" alt="Android" class="" onclick="platform('Android')">
                            <input type="checkbox" name="plataforma[]" value="Android">
                        </div>
                    </div>

                    <script>
                        $("form input[name='plataforma[]']").css('display','none');
                        function platform(type){
                            if($("form input[value='"+type+"']").prop('checked') == false){
                                $("form input[value='"+type+"']").prop('checked',true);
                                $("form .boxPlatforms img[alt='"+type+"']").attr('class','checkPlatform');
                            }else{
                                $("form input[value='"+type+"']").prop('checked',false);
                                $("form .boxPlatforms img[alt='"+type+"']").attr('class','');
                            }
                            
                        }
                    </script>
                    
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
<?php 
    }else{
        header("Location: ./index_store.php");     
    }
} ?>