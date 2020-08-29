<?php
    include("../conexao_banco.php");

    $id_dev = $_POST['id_dev'];
    $comentario = $_POST['comentario'];
    $id_postagem = $_POST['id_postagem'];

    $insert = mysqli_query($conexao, "INSERT INTO comentarios (id_dev, comentario, data, post) VALUES ('$id_dev','$comentario', now(), '$id_postagem')");

    $query_select = mysqli_query($conexao, "SELECT * FROM postagens WHERE id_post = ".$id_postagem."");
    $lista = mysqli_fetch_array($query_select);

    $query_coment = mysqli_query($conexao, "SELECT count(id) as qtde FROM comentarios WHERE post = ".$id_postagem."");
    $coment_load = mysqli_fetch_assoc($query_coment);
    $num_coments = $coment_load['qtde'];

    $array_num_coments = array('num_coments' => $num_coments);

    echo json_encode($array_num_coments);
?>