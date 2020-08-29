//Função de adicionar like
function add_like(id_post){
	//$('#post_'+id_post+'_like').html('<img src="imgs/loading.gif" />');
	
	$.post('config_like_php/add_like.php', {post_id: id_post}, function(dados){
		if(dados == 'sucesso'){
			get_like(id_post);
			location.reload();			
		}else{
			alert("Você já votou nesta postagem");
			location.reload();
		}
	})
}

//Função de capturar/pegar like
function get_like(id_post){
	$.post('config_like_php/get_like.php', {post_id: id_post}, function(valor){
		$('#post_'+id_post+'_like').text(valor);
	})
}

//Função de deslike
function un_like(id_post, id_dev){
	$.post('config_like_php/un_like.php', {post_id: id_post, dev_id: id_dev}, function(valor){
		if(valor == 'sucesso'){
			location.reload();			
		}else{
			alert("Desculpe, ocorreu um erro");
			location.reload();
		}
	})
}

//Função de apagar postagem
function delete_post(id_post, id_dev){
	$.post('config_posts_php/delete_post.php', {post_id: id_post, dev_id: id_dev}, function(valor){
		if(valor == 'sucesso'){
			location.reload();
		}else{
			alert('Desculpe, não foi possivel apagar a postagem');
			location.reload();
		}
	})

}

//Insere o comentario
function inserir_coment(id_post, id_dev, hoje_day, coment_text){
	$.post('config_coment/funcoes_coment.php', {post_id: id_post, dev_id: id_dev, day_hoje: hoje_day, coment_text: coment_text}, function(valor){
		if(valor == true){
			location.reload();
		}else{
			alert('Desculpe, não foi possivel apagar a postagem');
			location.reload();
		}
	})
}