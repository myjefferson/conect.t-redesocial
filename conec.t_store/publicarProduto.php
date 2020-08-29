<?php 
	include("../conexao_banco.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inserir Produtos</title>
	<meta charset="utf-8">
	<link rel="icon" type="imagem/png" href="../icones/conec.t-icon-head-web.png">
	<link rel="stylesheet" type="text/css" href="css_store/storeBody.css">
	<?php include("itens_head.php"); ?>
</head>
<body style="background: linear-gradient(#0C0E1C);" >
	<div class="fixed-top">
          <nav class="navbar navbar-expand-lg" style="background: white; height: 50px;">
              <div class="container">
                  <div class="collapse navbar-collapse" id="navbarsContainer-2">
                    <div class="logo"><i><img style="float: left; width: 150px; margin-top: 0" src="imgs_store/logo-black.png" alt="CONECT.T"></i></div>
                  </div>
              </div>
          </nav> 
      </div><br><br><br>
       <?php
		/*if(isset($_POST["publicarProduto"])){   
		        if($_POST['nome_produto'] != "" &&  $_POST['preco_produto'] != "" && $_POST['descricao'] != "" && $_POST['telefone'] != "" && $_POST['email'] != ""){
		            
		            if(empty($_FILES['fotoProduto']['name'])){ 
		                $novo_nome = " "; 
		            }else{
		                $n = rand(0, 1000000);
		                $novo_nome = $n.$_FILES["fotoProduto"]["name"];

		                move_uploaded_file($_FILES['fotoProduto']['tmp_name'], "imgs_store/".$novo_nome);
		            }
		            
		            $query = "INSERT INTO produtos (`nome_produto`, `preco_produto`, `descricao`,`telefone`, `email`, `foto_produto`) VALUES ('".$_POST['nome_produto']."','".$_POST['nome_produto']."','".$_POST['descricao']."','".$_POST['telefone']."', '".$_POST['email']."', '".$_POST['foto_produto']."')";
		            
		            if(mysqli_query($conexao, $query))
		            {
		                //header("location: publicarProduto.php");
		                echo"Sucesso";
		            }
		            else
		            {
		                //header("location: publicarProduto.php");
		                echo"Não foi possível inserir a postagem";
		            }
		    }*/      
        ?>

	<div class="container">
		<div class="row">
			<section class="enviarProducts" style=" margin-top: 15px;">
				<form action="publicarProduto.php" method="POST" enctype="multipart/form-data">
					<label style="color: white"><b>Foto do Produto: </b></label>
					<input type="file" name="fotoProduto[]" multiple id="fotoProduto" class="form-control" required="" style="width: 340%; border-radius: 4px;border-width: 2px;border-color: #01FAA9;"><br>
					<label style="color: white"><b>Nome Produto: </b></label>
					<input type="text" name="nome_produto" id="nomeProduto" class="form-control" required="" placeholder="Nome do Produto" style="width: 340%; border-radius: 4px;border-width: 2px;border-color: #01FAA9;"><br>
					<label style="color: white"><b>Preço Produto: </b></label>
					<input type="number" name="preco_produto" id="precoProduto" class="form-control" required="" placeholder="Preço do Produto" style="width: 340%; border-radius: 4px;border-width: 2px;border-color: #01FAA9;"><br>
					<label style="color: white"><b>Descrição do Produto: </b></label>
					<textarea type="" name="descricao" id="descricao" class="form-control" required="" placeholder="Descrição do Produto" style="width: 340%; border-radius: 4px;border-width: 2px;border-color: #01FAA9;"></textarea><br>
					<label style="color: white"><b>Telefone do Produto: </b></label>
					<input type="tel" name="telefone" id="telefone" class="form-control" required="" placeholder="Telefone do Produto" style="width: 340%; border-radius: 4px;border-width: 2px;border-color: #01FAA9;"><br>
					<label style="color: white"><b>Email do Produto: </b></label>
					<input type="Email" name="email" id="email" class="form-control" required="" placeholder="Email do Produto" style="width: 340%; border-radius: 4px;border-width: 2px;border-color: #01FAA9;"><br>
					<a><button name="publicarProduto" class="btn btn-primary">Publicar Produto</button></a>
				</form>
			</section>
		</div>
	</div>
</body>
</html>