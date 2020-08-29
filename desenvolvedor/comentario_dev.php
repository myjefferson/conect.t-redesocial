<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php

            //mini foto perfil do comentador
            include("../conexao_banco.php");

            //inserir comentario
            if(isset($_POST['comentar'])){
                $hoje = date("Y,m,d");
                $comentario = $_POST['text'];

                if(empty($comentario)){
                    echo"É necessário escrever um comentário";
                }else{
                    $insert_coment = mysqli_query($conexao, "INSERT INTO comentarios (id_dev, comentario, post, data) VALUES ('$id_dev','$comentario','.$id_post .', '.$hoje.')") or die ("Erro ao inserir comentário");
                }
            }
            
            $check_dev = mysqli_query($conexao, 'SELECT id_dev FROM likes WHERE post = '.$id_post.' AND id_dev = '.$_SESSION['id'].'');
            $do_check_dev = mysqli_num_rows($check_dev);
          
            if($check_user){
                echo"<img src='fotos_dev/".$check_user["foto"]."' id='foto_coment_dev' onerror=this.src='../icones/sem-perfil.png'>"; //Foto do Postador
            }else{
                echo"";
            }    
        ?>

        <div id="area_comentario">
            <form action="" method="post">
                    <input type="text" class="form-control text-coment" name="text" placeholder="Escreva um comentário..."></textarea>
                    <input class="btn btn-primary" type="submit" id="btn_coment" value="Comentar" name="comentar">
            </form>
        </div>
    </body>
</html>