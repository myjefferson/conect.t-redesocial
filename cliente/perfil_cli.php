<?php ob_start(); session_start(); $id_cli = $_SESSION['id_cli']; include("../conexao_banco.php"); include("functions_cli.php");  
    $query_user = mysqli_query($conexao, 'SELECT * FROM cliente WHERE id_cli = "'.$id_cli.'"');
    $cli_select = mysqli_fetch_assoc($query_user);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CONEC.T - Meu Perfil</title>
        <?php include("lib/itens_head.php") ?>
        <link rel="stylesheet" href="style_cli/css_cli/perfil_cli.css"> 
        <link rel="stylesheet" href="style_cli/css_cli/normalize_css.css"> 
    </head>
    <body name="perfil">
        <div id="body-mobile" name="perfil-mobile">
            <div class="container">
                <div class="row">
                    <!--Bloco-esquerdo nav-->
                    <?php include("nav_principal.php"); ?>    

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <!--FOTO DA CAPA DO PERFIL-->
                        <div class="capa-perfil">
                            <?php echo "<img class='img-fluid' src='fotos_cli/".$cli_select['ft_capa']."' onerror=this.src='style_cli/img_cli/sem-capa.png'>"; ?>
                            <a type="button" id="modal-capa" data-toggle="modal" data-target="#window-capa"><i class="material-icons capa-icon">camera_enhance</i><p>Alterar foto da capa</p></a>
                        </div>

                        <!--Informações do cliente-->
                        <div class="box-posts">
                            <div class="card info-user">                        
                                <div class='user-top'>
                                    
                                    <p><?php echo "<img src='fotos_cli/".$cli_select['foto']."' onerror=this.src='style_cli/img_cli/sem-perfil.png'>"; ?>
                                        <a type="button" id="modal-foto" data-toggle="modal" data-target="#window-foto"><i class="material-icons foto-icon">camera_enhance</i></a>
                                    </p>
                                </div>
                                                                                                    
                                <div class="name-user">
                                    <!--Sair do perfil-->
                                    <a href="../cliente/sair.php" class="btn-sair" id="sair"><i class="large material-icons">exit_to_app</i> Sair</a>
                                    <!--Alterar foto e perfil-->
                                    <!-- Botão para acionar modal -->
                                    <button type="button" id="modal-config" class="btn btn-primary" data-toggle="modal" data-target="#window-config">
                                            <!--<span class="material-icons">settings</span>--> Editar perfil
                                    </button>
                                    <?php include("alterar_conta.php");
                                        
                                        //Chama funcao alterar foto perfil
                                        if(isset($_POST['alterar_capa'])){altera_capa_perfil();}
                                        if(isset($_POST['alterar_foto'])){altera_foto_perfil();}
                                        if(isset($_POST['alterar_perfil'])){altera_perfil();}
                                        ?>
                                    <!--Nome user-->
                                    <p id="name"><?php echo $cli_select['nome'];?></p>         
                                </div>

                                <hr/>
                                <p id="descricao"><?php 
                                    if(trim($cli_select['descricao']) == ""){?>
                                        <div id="box-add-desc">
                                            <span class="material-icons info">error</span><p id="principal-text"><a type="button" id="btn_add_desc" data-toggle="modal" data-target="#window-config">Adicione uma descrição</a> e se destaque entre os clientees!</p>
                                            <p id="text-dics">Dicas importantes:</p>
                                            <p><span class="material-icons">build</span>Descreva as tecnologias que você domina;</p>
                                            <p><span class="material-icons">work</span>Conte sobre os projetos que já desenvolveu;</p>
                                            <p><span class="material-icons">visibility</span>Cuidado com os erros de escrita.</p>
                                        </div>
                                    <?php
                                    }else{
                                        echo"<p id='title_descricao'>Descrição</p>";
                                        echo"<label id='text-descricao'>".$cli_select['descricao']."</label>";
                                    } ?>
                                </p>
                            </div>
                            
                            <!--Postagens-->
                            <div id="posts">                         
                                <?php 
                                    //Chamada das postagens
                                    $id_page = basename(__FILE__);
                                    include("postagens.php");  
                                ?>
                            </div>
                        </div>
                    </div>           
                </div>
            </div>
        </div>          
    </body>
</html>
<?php
    ob_end_flush();
?>