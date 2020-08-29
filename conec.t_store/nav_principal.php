<?php
?>
<!--Menu do topo-->
<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css_store/nav_principal.css">
        
    </head>
    <body>
        <div class="col-3 nav-principal">
            <div class="news">      
                <div id="usuario" class="position-fixed">
            
                    <nav class="options">
                        <!--Imagem para substituir erro de imagem-->
                        <ul class="nav flex-column nav-tabs" id="nav-tab">
                            <li class="nav-item"><a href="home_cli.php" ><div class="logo"><i><img class="float-md-left" src="imgs_store/logo-black.png" alt="CONECT.T"></i></div></a></li>
                            <li class="nav-item"><?php echo "<img src='imgs_store/".$foto_cli['foto']."' onerror=this.src='imgs_store/sem-perfil.png'>"; ?> Meu Perfil</a></li>
                            <li class="nav-item"><a name="home" href="../cliente/home_cli.php" class="nav-link"> <i class="large material-icons">home</i> Página inicial</a></li>
                            <li class="nav-item"><a name="mensagens" href="../cliente/chat_cli.php" class="nav-link"> <i class="large material-icons">forum</i> Mensagens</a></li>
                            <li class="nav-item"><a name="loja" href="../conec.t_store/store_initial.php" class="nav-link"> <i class="large material-icons">shop</i> Loja</a></li>                         
                            <li class="nav-item"><a name="sair" href="../cliente/sair.php" class="nav-link" id="sair"><i class="large material-icons">exit_to_app</i> Sair</a></li>                         
                        </ul>
                    </nav>

                </div>
            </div>
        </div>  

        <div class="top-logo-mobile">
            <p><li class="logo-mobile"><a href="home_cli.php" ><i><img class="logo" src="style_cli/img_cli/logo-black.png" alt="CONECT.T"></i></a></li></p>
        </div>
        <div class="nav-principal-mobile">                
            <nav class="options-mobile">
                <!--Imagem para substituir erro de imagem-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="buttons-mobile nav-tabs">
                        <li><a href='perfil_cli.php' class='nav-link perfil' name='perfil-mobile' id="perfil"><?php echo "<img src='fotos_cli/".$foto_cli['foto']."' onerror=this.src='imgs_store/sem-perfil.png'>"; ?></a> <p>Meu perfil</p></li>                      
                        <li><a href="../cliente/mensagens_cli.php"><i name="mensagens-mobile" class="large material-icons nav-link">forum</i></a><p>Mensagens</p></li>
                        <li><a href="../cliente/home_cli.php"><i name="home-mobile" class="large material-icons nav-link">home</i></a><p>Página inicial</p></li>
                        <li><a href="../cliente/dmds_main.php"><i name="cli-mobile" class="large material-icons nav-link">view_list</i></a><p>Desenvolver</p></li>
                        <li><a href="../conec.t_store/store_initial.php"><i name="loja-mobile" class="large material-icons nav-link">shop</i></a><p>Loja</p></li>                        
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