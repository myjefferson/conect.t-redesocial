<?php
    $id_dev = $_SESSION['id_dev'];
    //Se o user não tiver logado - ir para login
    if($id_dev == ""){header("Location: Login_dev.php");} 
    $query_user = mysqli_query($conexao, 'SELECT nome, foto, descricao FROM desenvolvedor WHERE id_dev = "'.$id_dev.'"');
    $foto_dev = mysqli_fetch_assoc($query_user);?>
<!--Menu do topo-->
<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_dev/css_dev/nav_principal.css">
        
    </head>
    <body>
        <div class="col-3 nav-principal">
            <div class="news">      
                <div id="usuario" class="position-fixed">
            
                    <nav class="options">
                        <!--Imagem para substituir erro de imagem-->
                        <ul class="nav flex-column nav-tabs" id="nav-tab">
                            <li class="nav-item"><a href="home_dev.php" ><div class="logo"><i><img class="float-md-left" src="style_dev/img_dev/logo.png" alt="CONECT.T"></i></div></a></li>
                            <li class="nav-item"><a name="perfil" href='perfil_dev.php' class='nav-link' id="perfil"><?php echo "<img src='fotos_dev/".$foto_dev['foto']."' onerror=this.src='style_dev/img_dev/sem-perfil.png'>"; ?> Meu Perfil</a></li>
                            <li class="nav-item"><a name="home" href="../desenvolvedor/home_dev.php" class="nav-link"> <i class="large material-icons">home</i> Página inicial</a></li>
                            <li class="nav-item"><a name="mensagens" href="../desenvolvedor/mensagens_dev.php" class="nav-link"> <i class="large material-icons">forum</i> Mensagens</a></li>
                            <li class="nav-item"><a name="desenvolver" href="../desenvolvedor/dmds_main.php" class="nav-link"> <i class="large material-icons">view_list</i> Desenvolver</a></li>
                            <li class="nav-item"><a name="loja" href="../conec.t_store/index_store.php" class="nav-link"> <i class="large material-icons">shop</i> Loja</a></li>                         
                            <li class="nav-item"><a name="sair" href="../desenvolvedor/sair.php" class="nav-link" id="sair"><i class="large material-icons">exit_to_app</i> Sair</a></li>                         
                        </ul>
                    </nav>

                </div>
            </div>
        </div>  

        <div class="top-logo-mobile">
            <p><li class="logo-mobile"><a href="home_dev.php" ><i><img class="logo" src="style_dev/img_dev/logo.png" alt="CONECT.T"></i></a></li></p>
        </div>
        <div class="nav-principal-mobile">                
            <nav class="options-mobile">
                <!--Imagem para substituir erro de imagem-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="buttons-mobile nav-tabs">
                        <li><a href='perfil_dev.php' class='nav-link perfil' name='perfil-mobile' id="perfil"><?php echo "<img src='fotos_dev/".$foto_dev['foto']."' onerror=this.src='style_dev/img_dev/sem-perfil.png'>"; ?></a> <p>Meu perfil</p></li>                      
                        <li><a href="../desenvolvedor/mensagens_dev.php"><i name="mensagens-mobile" class="large material-icons nav-link">forum</i></a><p>Mensagens</p></li>
                        <li><a href="../desenvolvedor/home_dev.php"><i name="home-mobile" class="large material-icons nav-link">home</i></a><p>Página inicial</p></li>
                        <li><a href="../desenvolvedor/dmds_main.php"><i name="dev-mobile" class="large material-icons nav-link">view_list</i></a><p>Desenvolver</p></li>
                        <li><a href="../desenvolvedor/conec.t_store/loja_cli.php"><i name="loja-mobile" class="large material-icons nav-link">shop</i></a><p>Loja</p></li>                        
                    </ul>
                </div> 
            </nav>
        </div>         
    </body>
</html>
<script>
    //Controles Desktop
    $('.nav-link').each(function(){
        var nome_pagina = $("body").attr("name");
        var nome_menu = $(this).attr("name");
        if(nome_pagina == nome_menu){
            $(this).addClass("active");
            return false;
        }
    });
    //Controles Mobile
    $('.nav-link').each(function(){
        var nome_pagina = $("#body-mobile").attr("name");
        var nome_menu = $(this).attr("name");
        if(nome_pagina == nome_menu){
            $(this).addClass("active");
            return false;
        }
    });
</script>