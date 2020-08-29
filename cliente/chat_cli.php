<?php 
ob_start(); session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php include("itens_head.php");?>
    <link rel="stylesheet" href="style_cli/css_cli/mensagens_cli.css">
</head>
    <body name="mensagens">
        <div id="body-mobile" name="mensagens-mobile">

            <div class="container">
                <div class="row">
                    <?php include("nav_principal.php"); ?>

                    <div id="pos-container" class="col-sm-12 col-md-8 col-lg-8 col-xl-8">  
                        
                            <div class="box-all-msm">
                                <!--INICIO CAIXA MENSAGENS-->
                                <div class="box-msm-top">
                                    <h3 id="title-locale">Mensagens</h3>
                                </div>
                                
                                <div id="mensagens" class="col-8"> 
                                <div class="container">
                                <div class="row">
                                    <div id="talking">
                                        <?php 
                                        if(!empty($_GET['type_user']) && !empty($_GET['user'])){
                                            
                                            ?><p>Você está conversando com</p>
                                            <?php
                                            $type_talking = $_GET['type_user'];
                                            $id_talking = $_GET['user'];
                                            $query_user = mysqli_query($conexao, "SELECT * FROM cliente WHERE type_user = '$type_talking' AND id = '$id_talking'");
                                            if(mysqli_num_rows($query_user) != 0){
                                                $user_talking = mysqli_fetch_assoc($query_user);
                                                ?>
                                                <img src="fotos_cli/<?php echo$user_talking['foto']; ?>" onerror=this.src="style_cli/img_cli/sem-perfil.png">
                                                <label id="nome-user"><?php echo$user_talking['nome']; ?></label>
                                                <?php } ?><?php } ?>  
                                        </div>
                                    </div>
                                    </div>

                                    <div id="align-msm" class="list-mensagens">
                                        <?php //include("sys_mensagem/list_msm_chat.php"); ?>
                                    </div>

                                     
                                    <!--FORM INSERIR MENSAGEM--> 
                                    <div class="col-12" id="form">
                                        <input type="text" name="mensagem" class="" id="mensagem" palceholder="Digite sua mensagem" autocomplete="off">
                                        <a id="btn_enviar_msm" class="btn_enviar_msm btn-primary"><span class="material-icons">send</span></a></p>
                                        
                                        <input type="hidden" name="type_cli_enviou" id="type_cli_enviou" value="<?php echo$_SESSION['type_user']; ?>">
                                        <input type="hidden" name="id_cli_enviou" id="id_cli_enviou" value="<?php echo$_SESSION['id']; ?>">
                                        
                                        <input type="hidden" name="type_user_recebeu" id="type_user_recebeu" value="<?php echo$_GET['type_user']; ?>">
                                        <input type="hidden" name="id_user_recebeu" id="id_user_recebeu" value="<?php echo$_GET['user']; ?>">
                                    </div>   
                                     
                                </div>
                                
                                
                                <!--INICIO AREA DE USUARIOS-->
                                <div id="usuarios" class="col-4">
                                
                                    <?php //Lista os usuarios
                                        $seleciona = mysqli_query($conexao, "SELECT * FROM cliente");
                                        
                                        while($row = mysqli_fetch_array($seleciona)){
                                            if($row['id_cli'] != $_SESSION['id_cli'] && $row['email'] != $_SESSION['email']){
                                                $nome = $row['nome'];
                                                $usuario = $row['id'];
                                                $foto = $row['foto'];                                            
                                    ?>
                                        <ul>                                     
                                            <!--Pega o id do usuario atual-->
                                            <li><a href="?&type_user=<?php echo$row['type_user']; ?>&user=<?php echo$row['id']; ?>"><b><img src="fotos_cli/<?php echo$foto; ?>" onerror=this.src="style_cli/img_cli/sem-perfil.png"><?php echo $nome; ?></b></a></li>  
                                        </ul>
                                    <?php }}?>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>