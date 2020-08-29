<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<title>CONEC.T - Para Desenvolvedores</title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">   
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <link rel="stylesheet" href="style_index/index_dev.css">
		<link rel="stylesheet" href="style_index/reset.css">
		<link rel="icon" type="imagem/png" href="icones/conec.t-icon-head-web.png">

		<link rel="stylesheet" href="style_index/icons_materialize.css">  
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    </head>
    <body>
		<div class="container">	
			<div class="row">	
				<!--Nav-->
				<header class="">
					<div class="col-12">
						<a id="img-link" href="index.php"><h1><img src="icones/logo-black.png" alt="CONEC.T"></h1></a>
						<div id="link-ancora">	
							<a href="desenvolvedor/cadastro_dev.php" id="criarconta_dev"><b>Inscrever-se agora</b></a>		
							<a href="index_cli.php" id="paraClientes">Para clientes</a>   	
						</div>
					</div>			
				</header>	

				<script>
					var cords_offset = $("header").offset().top;
					var menu = $("header");
					$(document).on('scroll', function(){
						if(cords_offset >= $(window).scrollTop()){	
							menu.removeClass('fixarMenu');
						}else{
							menu.addClass('fixarMenu');
						}
					});
				</script>

                <div class="principal-screen">
					<div class="mais-top">
						<div class="text-left col-sm-5 col-md-5 col-lg-5 float-left">
							<p>{</p>
							<h1>
								Um lugar ideal para <b>DESENVOLVEDORES</b>
							</h1>

							<h1>
								Que desejam mostrar 
								o que faz 
								<b>PARA TRANSFORMAR
								O MUNDO</b>.
							</h1>	
							<p>};</p>
						</div>
						<img class="img-right col-sm-7 col-md-7 col-lg-7 float-right" src="icones/img-07.png"/>					
					</div>
					<div id="more">
						<p id="txt_more">Conheça Mais</p>
						<p id="icon_more"><span class="material-icons">expand_more</span></p>
					</div>
                </div>
				

				<div class="session-1">
					<div class="float-left col-sm-5 col-md-5 col-lg-5">
						<p id="icon_text"><img src="icones/img-14.png"></p>
						<h2>Publique inovação</h2>
						<p id="text">Um lugar ideal para compartilhar
							informações sobre tecnologia e 
							realizar a criação de projetos com
							a ajuda de programadores.</p>
					</div>
					<img class="img_position col-sm-7 col-md-7 col-lg-7 float-right" src="icones/img-11.png">
				</div>

				<div class="session-2">
					<div class="float-right col-sm-5 col-md-5 col-lg-5">
						<p id="icon_text"><img src="icones/img-13.png"></p>
						<h2>Escreva as tecnologias que você domina</h2>
						<p id="text">Descreva, no seu perfil, suas principais 
							habilidades na programação.
							Apresente suas experiências, e 
							projetos que já desenvolveu.</p>
					</div>
					<img class="img_position col-sm-7 col-md-7 col-lg-7 float-left" src="icones/img-12.png">
				</div>

				<div class="session-final col-12">
					<p>Inscreva-se e conheça conceitos</br>tecnológicos surpreendentes.</p>
					<p><a href="desenvolvedor/cadastro_dev.php">Inscrever-se como desenvolvedor</a></p>
				</div>			
			</div>
		</div>

		<!--RODAPÉ DA CONEC.T-->
        <?php include("general_footer.html"); ?>
	</body>
</html>