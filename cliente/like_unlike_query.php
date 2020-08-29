<?php
    session_start();
    include("../conexao_banco.php");
    $post = $_POST['id'];
    $id_cli = $_SESSION['id_cli'];

    $query = mysqli_query($conexao, 'SELECT * FROM likes WHERE post = '.$post.' AND id_cli = '.$id_cli.' ');
    $count = mysqli_num_rows($query);

    if($count == 0){
        $insert = mysqli_query($conexao, 'INSERT INTO likes (id_cli, post) VALUES ('.$id_cli.', '.$post.')');
        $update = mysqli_query($conexao, 'UPDATE postagens SET num_likes = num_likes+1 WHERE id_post = '.$post.' ');
    }else{
        $delete = mysqli_query($conexao, "DELETE FROM likes WHERE post = ".$post." AND id_cli = ".$id_cli."");
	    $update = mysqli_query($conexao, 'UPDATE postagens SET num_likes = num_likes-1 WHERE id_post = '.$post.' ');
    }

    $contagem = mysqli_query($conexao, 'SELECT num_likes FROM postagens WHERE id_post = '.$post.'');
    $contar = mysqli_fetch_array($contagem);
    $likes = $contar['num_likes'];

    if($count >= 1){
        $gostei = "<i class='material-icons n_gostei'>thumb_up_alt</i>"; $likes = " ".$likes++."";
    }else{
        $gostei = "<i class='material-icons gostei'>thumb_up</i>"; $likes = " ".$likes--."";
    }
    $array_like = array('likes' => $likes, 'text' => $gostei);

    echo json_encode($array_like);
?>
