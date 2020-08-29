<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<title>CONEC.T - Bem vindo</title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">   
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <link rel="stylesheet" href="style_index/index_init.css">
		<link rel="stylesheet" href="style_index/reset.css">
		<link rel="icon" type="imagem/png" href="icones/conec.t-icon-head-web.png">

		<link rel="stylesheet" href="style_index/icons_materialize.css">  
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    </head>
    <body>
		<header class="">
			<div class="col-12">
				<h1 id="logo"><img src="icones/logo.png" alt="CONEC.T"></h1>	
				<h1 id="logo-black"><img src="icones/logo-black.png" alt="CONEC.T"></h1>
				<div id="link-ancora">	
					<a href="escolha_conta.php" id="iniciarsessao">Fazer login</a>   	
				</div>
			</div>			
		</header>

		<script>
			var cords_offset = $("header").offset().top;
			var menu = $("header");
			$("#logo-black").hide();
			$(document).on('scroll', function(){
				if(0 >= $(window).scrollTop()){	
					menu.removeClass('fixarMenu');
					$("#logo-black").hide();
					$("#logo").show();
				}else{
					menu.addClass('fixarMenu');
					$("#logo-black").show();
					$("#logo").hide();
				}
			});
		</script>
		
		<!--VIDEO BACKGROUND-->
		<div class="principal-video">
			<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
				<source src="icones/video_test.mp4" type="video/mp4">
			</video>
			<div class="container h-100">
				<div class="d-flex h-100 text-center align-items-center">
					<div class="w-100 text-white">
						<p class="lead mb-0">Apresentando a</p>
						<h1 class="display-3">CONEC.T</h1>					
					</div>
				</div>
			</div>
		</div>
	
		<div class="container">	
			<div class="row">		
				<div class="principal-client">
					<img class="col-sm-4 col-md-5 img-client" data-anima="slideEsquerda" src="icones/img-01.png" alt="CONEC.T PARA CLIENTES">
					<div class="col-sm-7 col-md-8 col-lg-7 box-client" data-anima="slideDireita">
						<h1 id="title">PARA CLIENTES</h1>
						<p>
							Uma rede social que conecta pessoas criativas 
							junto com a tecnologia!
						</p>
						<p>

							Faça seu projeto sonhado sair do papel, 
							contratando um profissional especializando 
							em desenvolver software.
						</p>
						<div id="link-infos">
							<a id="conheca" href="index_cli.php">Conhecer mais</a>
							<a id="cadastre" href="cliente/cadastro_cli.php">Cadastrar-se</a>
						</div>
					</div>
				</div>
					
				<div class="principal-dev">
					<img class="col-sm-4 col-md-5 img-dev" data-anima="slideEsquerda"src="icones/img-02.png" alt="CONEC.T PARA DESENVOLVEDORES">
					<div class="col-sm-7 col-md-8 col-lg-7 box-dev" data-anima="slideDireita">
						<h1 id="title">PARA DESENVOLVEDORES</h1>
						<p>
							Entre para a comunidade de programadores
							que compartilham ideias incríveis.
						</p>
						
						<p>
							Aqui você pode mostrar suas habilidades e se 
							destacar entre os desenvolvedores, mostrando 
							o seu trabalho para vários clientes seguidores 
							e amigos desenvolvedores.
						</p>
						<div id="link-infos">
							<a id="conheca" href="index_dev.php">Conhecer mais</a>
							<a id="cadastre" href="desenvolvedor/cadastro_dev.php">Cadastrar-se</a>
						</div>
					</div>
				</div>		
			</div>
		</div>
		
		<!--RODAPÉ DA CONEC.T-->
        <?php include("general_footer.html"); ?>
	</body>
</html>