<?php function insert_coment($id_dev, $comentario, $idPost, $hoje){
    include("../conexao_banco.php");

    $insert_coment = mysqli_query($conexao, "INSERT INTO  comentarios (id_dev, comentario, post, data) VALUES ('$id_dev','$comentario','.$idPost.', '.$hoje.')") or die ("Erro ao inserir comentário");
    if($insert_coment){
        return true;
    }else{
        return false;
    }
} ?>