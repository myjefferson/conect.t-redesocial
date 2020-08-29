<?php 
session_start(); $id_cli = $_SESSION['id_cli']; include("../conexao_banco.php"); include("functions_cli.php");
     
    //Iserção de postagens
    if(isset($_POST["public"])){   
        if($_POST['texto'] != ""){
            //inserindo foto, texto e data
            
            if(empty($_FILES['imagem']['name'])){ 
                $novo_nome = " "; 
            }else{
                $n = rand(0, 1000000);
                $novo_nome = $n.$_FILES["imagem"]["name"];

                move_uploaded_file($_FILES['imagem']['tmp_name'], "postagens_cli/".$novo_nome);
            }
            
            $query = "INSERT INTO postagens (`texto`, `imagem`, `data`,`id_cli`) VALUES ('".$_POST['texto']."','$novo_nome',now(),'$id_cli')";
            
            if(mysqli_query($conexao, $query))
            {
                //header("location: home_cli.php");
            }
            else
            {
                //header("location: home_cli.php");
                echo"Não foi possível inserir a postagem";
            }
        }else{
            echo"É preciso digitar algo para publicar";
        }                       
    }      
?>

<!--Inicio HTML-->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CONEC.T - Página inicial</title>
        <?php include("lib/itens_head.php") ?>
        <link rel="stylesheet" href="style_cli/css_cli/home_cli.css">    
    </head>
    <body name="home">
        <div id="body-mobile" name="home-mobile">

            <div class="container">
                <div class="row">
                    <!--Bloco-esquerdo nav-->
                    <?php include("nav_principal.php"); ?>     
                    
                    <!--Bloco-meio postagens-->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card card-postar">
                            <div class="card-header"><label>Criar publicação</label></div>
                            <form action="home_cli.php" method="POST" enctype="multipart/form-data">                    
                                <textarea class="form-control" type="text" name="texto" cols="4" rows="3" size="40" placeholder="Escreva suas ideias..." required></textarea><br>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/> 
                                    <a style="display: none" onclick="delete_img()" id="delete-img"><span class="material-icons">cancel</span></a>                                              
                                    <img class="" style="display: none" id="img-post" src=""><!--Imagem de visualização quando postar-->
                                        <ul id="pub-btn-right">
                                            <li><input type="file" id="foto" name="imagem" value="Selecionar<br>Foto" style="display: none"></li>
                                            <li><button class="btn btn-primary" type="button" id="foto" value="Foto" onClick="document.getElementById('foto').click()"><i class="large material-icons">camera_alt</i></button></li> 
                                        </ul>
                                                                        
                                    <button class="btn btn-primary" id="btn-postar" name="public" type="submit" onclick="javascript:atualizar_postagens();">Publicar</button>
                            </form>
                        </div>
                        
                        <div id="posts">                                 
                            <?php 
                                //Chamada das postagens
                                $id_page = basename(__FILE__); 
                                include("postagens.php");                     
                            ?>
                        </div>             
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#foto").change(function(){
                var btn_delete = $("#delete-img").show();
                var input = document.querySelector("#foto");

                if(input.files && input.files[0]){
                    var reader = new FileReader();

                    reader.onload = function(e){
                        $("#img-post").attr('src', e.target.result);               
                    }
                    reader.readAsDataURL(input.files[0]);
                    $("#img-post").show();
                }
            });

            function delete_img(){
                var foto = $("#foto");
                $("#delete-img").hide();
                $("#img-post").hide();
                foto.replaceWith(foto.val(''));
            }
        </script>
    </body>
</html>
