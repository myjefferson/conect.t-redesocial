<?php
	session_start();
	include_once "../../conexao_banco.php";
	include_once "funcoes_like.php";
	$id_post = (int)$_POST['post_id'];
	$id_dev = (int)$_SESSION['id'];
	
	if(!verificar_clicado($id_post, $id_dev)){
		if(adicionar_like($id_post, $id_dev)){
			echo 'sucesso';		
		}else{
			echo 'erro';		
		}
	}else{
		echo 'erro';
	}
?>