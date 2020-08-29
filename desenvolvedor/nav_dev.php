<?php $id_dev = $_SESSION['id_dev'];
    $query_user = mysqli_query($conexao, 'SELECT * FROM desenvolvedor WHERE id_dev = "'.$id_dev.'"');
    $foto_dev = mysqli_fetch_assoc($query_user);?>
<!--Menu do topo-->
<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_dev/css_dev/nav_dev.css">
    </head>
    <body>
        <div class="col-3">
            <div class="news">      
                <div id="usuario" class="position-fixed">
            
                    <nav class="options">
                        <!--Imagem para substituir erro de imagem-->
                        <ul class="nav flex-column">
                            <li class="nav-item"><div class="logo"><i><img class="float-md-left" src="style_dev/img_dev/logo.png" alt="CONECT.T"></i></div></li>
                            <li class="nav-item"><a href='perfil_dev.php' class='nav-link'><?php echo "<img src='fotos_dev/".$foto_dev['foto']."' onerror=this.src='../icones/sem-perfil.png'>"; ?> Meu Perfil</a></li>
                            <li class="nav-item"><a href="../desenvolvedor/home_dev.php" class="nav-link"><i class="large material-icons">home</i> Página inicial</a></li>
                            <li class="nav-item"><a href="../desenvolvedor/home_dev.php" class="nav-link"><i class="large material-icons">forum</i> Mensagens</a></li>
                            <li class="nav-item"><a href="../desenvolvedor/my_dmds_dev.php" class="nav-link"><i class="large material-icons">view_list</i> Minhas demandas</a></li>
                            <li class="nav-item"><a href="../borealcode_store/store_initial.php" class="nav-link"><i class="large material-icons">shop</i> Loja</a></li>
                            <li class="nav-item"><a href="../desenvolvedor/sair.php" class="nav-link"><i class="large material-icons">exit_to_app</i> Sair</a></li>                           
                        </ul>
                    </nav>

                </div>
            </div>
        </div>  
    </body>
</html>