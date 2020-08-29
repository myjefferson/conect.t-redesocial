<?php
	//Função de verificar postagens
	function get_postagens(){
		include("../../conexao_banco.php");
		$posts = array();
		
		$selecionar = mysqli_query($conexao, "SELECT * FROM postagens");		
		while($row = mysqli_fetch_object($selecionar)){
			
			$devLogado = (int)$_SESSION['id'];
			$id_post = $row->post_id;
			$verificar = mysqli_query("SELECT id FROM likes WHERE id_dev  = '$devLogado' AND post = 'id_post'");
			$dev_like = (mysqli_num_rows($verificar) == 0) ? '0' : '1';

			$posts[] = array(
				'id_post' => $row->id,
				'texto' => $row->texto,
				'likes' => $row->likes,
				'dev_like' => $dev_like
			);
		}
		
		return $posts;
	}
	
	//Função de verificar like/deslike
	function verificar_clicado($id_post, $id_dev){
		include("../../conexao_banco.php");
		$id_post = (int)$id_post;
		$id_dev = (int)$id_dev;
		$verificar = mysqli_query($conexao, "SELECT id FROM likes WHERE id_dev = '$id_dev' AND post = '$id_post'");
		return (mysqli_num_rows($verificar) >= 1) ? true : false;
	}
	
	//Função de adicionar likes
	function adicionar_like($id_post, $id_dev){
		include("../../conexao_banco.php");
		$id_post = (int)$id_post;
		$id_dev = (int)$id_dev;
		$atualizar_likes_post = mysqli_query($conexao,"UPDATE postagens SET likes = likes+1 WHERE id = '$id_post'");
		
		if($atualizar_likes_post){
			$inserir_like = mysqli_query($conexao,"INSERT INTO likes (id_dev, post) VALUES ('$id_dev','$id_post')");
			if($inserir_like){
				return true;				
			}else{
				return false;			
			}
		}
	}

	//Função de atualizar os likes 
	function retornar_likes($id_post){
		include("../../conexao_banco.php");
		$id_post = (int)$id_post;
		$selecionar_num_likes = mysqli_query($conexao, "SELECT likes FROM postagens WHERE id = '$id_post'");
		$fetch_likes = mysqli_fetch_object($selecionar_num_likes);
		return $fetch_likes->likes;
	}

	//Função de deslike
	function un_like($id_post, $id_dev){
		include("../../conexao_banco.php");
		$delete = mysqli_query($conexao, "DELETE FROM likes WHERE id_dev = '$id_dev' AND post = '$id_post'");
		
		if($delete){
			$update = mysqli_query($conexao, "UPDATE postagens SET likes = likes-1 WHERE id = '$id_post'");
			if($update){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
?>