//Insere o comentario
function inserir_coment(id_post, id_dev, hoje_day, coment_text){
	$.post('config_coment/funcoes_coment.php', {post_id: id_post, dev_id: id_dev, day_hoje: hoje_day, coment_text: coment_text}, function(valor){
		if(valor == true){
			atualizar_like(id_post);
			//location.href = "home_dev.php#"+id_post
			//location.reload();

			sem_refresh(id_post);
		}else{
			alert('Desculpe, não foi possivel apagar a postagem');
			//location.reload();
			//atualizar_like(id_post);	
		}
	})
}



