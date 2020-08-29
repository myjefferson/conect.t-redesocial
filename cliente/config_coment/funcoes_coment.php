<?php function insert_coment($id_cli, $comentario, $idPost, $hoje){
    include("../conexao_banco.php");

    $insert_coment = mysqli_query($conexao, "INSERT INTO  comentariosCli (id_cli, comentario, post, data) VALUES ('$id_cli','$comentario','.$idPost.', '.$hoje.')") or die ("Erro ao inserir comentário");
    if($insert_coment){
        return true;
    }else{
        return false;
    }
} ?>