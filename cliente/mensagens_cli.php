<?php session_start(); include("../conexao_banco.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php include("lib/itens_head.php"); ?>
    <link rel="stylesheet" href="style_cli/css_cli/mensagens_cli.css">
    <script type="text/javascript" src="js_config/sys_chat.js"></script>
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
                                <!--Tela de bem vindo-->
                                <div id="msm-welcome">
                                    <p><span class="material-icons">message</span></p>
                                    <p id="txt-principal">Converse quando quiser.</p>
                                    <p id="txt_info">Troque mensagens com amigos e desenvolvedores.</p>
                                </div>

                                <div class="container">
                                <div class="row">
                                    <div id="talking">
                                        <?php 
                                        if(!empty($_GET['type_user']) && !empty($_GET['user'])){
                                            
                                            ?><p>Você está conversando com</p>
                                            <?php
                                            $type_talking = $_GET['type_user'];
                                            $id_talking = $_GET['user'];

                                            //SELECT DEV
                                            $query_user_dev = mysqli_query($conexao, "SELECT * FROM desenvolvedor WHERE type_user = '$type_talking' AND id_dev = '$id_talking'");
                                            
                                            //SELECT CLI
                                            $query_user_cli = mysqli_query($conexao, "SELECT * FROM cliente WHERE type_user = '$type_talking' AND id_cli = '$id_talking'");
                                            if(mysqli_num_rows($query_user_dev) != 0 && $type_talking = "dev"){
                                                $user_talking_dev = mysqli_fetch_assoc($query_user_dev);
                                                ?>
                                                <!--Oculta a tela de bem vindo-->
                                                <script> $("#msm-welcome").hide(); </script>

                                                <img src="fotos_dev/<?php echo$user_talking_dev['foto']; ?>" onerror=this.src="style_cli/img_cli/sem-perfil.png">
                                                <label id="nome-user"><?php echo$user_talking_dev['nome']; ?></label>
                                                <?php }else{ 
                                                    $user_talking_cli = mysqli_fetch_assoc($query_user_cli);
                                                    ?>
                                                    <!--Oculta a tela de bem vindo-->
                                                    <script> $("#msm-welcome").hide(); </script>

                                                    <label id="text_client">Desenvolvedor</label>
                                                    <img src="fotos_dev/<?php echo$user_talking_cli['foto']; ?>" onerror=this.src="style_cli/img_cli/sem-perfil.png">
                                                    <label id="nome-user"><?php echo$user_talking_cli['nome']; ?></label>
                                                    
                                               <?php } ?>
                                                
                                                <?php } ?>  
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
                                        <input type="hidden" name="id_cli_enviou" id="id_cli_enviou" value="<?php echo$_SESSION['id_cli']; ?>">
                                        
                                        <input type="hidden" name="type_user_recebeu" id="type_user_recebeu" value="<?php echo$_GET['type_user']; ?>">
                                        <input type="hidden" name="id_user_recebeu" id="id_user_recebeu" value="<?php echo$_GET['user']; ?>">
                                    </div>   
                                     
                                </div>
                                
                                
                                <!--INICIO AREA DE USUARIOS-->
                                <div id="usuarios" class="col-4">
                                
                                    <?php 
                                        //SELECT CLI
                                        $seleciona_cli = mysqli_query($conexao, "SELECT * FROM cliente");
                                        while($row = mysqli_fetch_array($seleciona_cli)){
                                            if($row['id_cli'] != $_SESSION['id_cli'] && $row['email'] != $_SESSION['email']){
                                                    
                                                $nome = $row['nome'];
                                                $usuario = $row['id_cli'];
                                                $foto = $row['foto']; 
                                                
                                                if($row['type_user'] == "cli"){ ?>
                                                    <ul>                                     
                                                        <!--Pega o id do usuario atual-->
                                                        <li><a id="user_select" href="?&type_user=<?php echo$row['type_user']; ?>&user=<?php echo$row['id_cli']; ?>"><b><img src="fotos_dev/<?php echo$foto; ?>" onerror=this.src="style_cli/img_cli/sem-perfil.png"><?php echo $nome; ?></b></a></li>  
                                                    </ul>
                                                <?php } 


                                                
                                            }
                                        }
                                        //SELECT DEV
                                        $seleciona_dev = mysqli_query($conexao, "SELECT * FROM desenvolvedor");
                                        while($row = mysqli_fetch_array($seleciona_dev)){
                                            //if($row['id_cli'] != $_SESSION['id_cli'] && $row['email'] != $_SESSION['email']){
                                                $nome = $row['nome'];
                                                $usuario = $row['id_dev'];
                                                $foto = $row['foto']; 
                                                
                                                if($row['type_user'] == "dev"){ ?>
                                                    <ul>                                     
                                                        <!--Pega o id do usuario atual-->
                                                        <li><a id="user_select" href="?&type_user=<?php echo$row['type_user']; ?>&user=<?php echo$row['id_dev']; ?>"><b><img src="fotos_dev/<?php echo$foto; ?>" onerror=this.src="style_cli/img_cli/sem-perfil.png"><?php echo $nome; ?></b></a></li>  
                                                    </ul>
                                                <?php } 
                                            //}
                                        } ?>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>