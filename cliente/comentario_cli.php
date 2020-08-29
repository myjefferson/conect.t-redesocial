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
                    $insert_coment = mysqli_query($conexao, "INSERT INTO comentariosCli (id_cli, comentario, post, data) VALUES ('$id_cli','$comentario','.$id_post .', '.$hoje.')") or die ("Erro ao inserir comentário");
                }
            }
            
            $check_cli = mysqli_query($conexao, 'SELECT id_cli FROM likes WHERE post = '.$id_post.' AND id_cli = '.$_SESSION['id'].'');
            $do_check_cli = mysqli_num_rows($check_cli);
          
            if($check_user){
                echo"<img src='fotos_cli/".$check_user["foto"]."' id='foto_coment_cli' onerror=this.src='../icones/sem-perfil.png'>"; //Foto do Postador
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