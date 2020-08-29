<?php
	include_once "../../conexao_banco.php";
	include_once "funcoes_like.php";
	$id_post = (int)$_POST['post_id'];
	$numero_de_likes = retornar_likes($id_post);
	echo $numero_de_likes;
?>