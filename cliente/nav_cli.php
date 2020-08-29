<?php $id_cli = $_SESSION['id_cli'];
    $query_user = mysqli_query($conexao, 'SELECT nome, foto, descricao FROM cliente WHERE id = "'.$id_cli.'"');
    $foto_cli = mysqli_fetch_assoc($query_user);?>
<!--Menu do topo-->
<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_cli/css_cli/nav_cli.css">
    </head>
    <body>
        <div class="col-3">
            <div class="news">      
                <div id="usuario" class="position-fixed">
                    <nav class="options">
                        <!--Imagem para substituir erro de imagem-->
                        <ul class="nav flex-column">
                            <li class="nav-item"><div class="logo"><i><img class="float-md-left" src="style_cli/img_cli/logo-black.png" alt="CONECT.T"></i></div></li>
                            <li class="nav-item"><a href='perfil_cli.php' class='nav-link'><?php echo "<img src='fotos_cli/".$foto_cli['foto']."' onerror=this.src='../icones/sem-perfil.png'>"; ?> Meu Perfil</a></li>
                            <li class="nav-item"><a href="../cliente/home_cli.php" class="nav-link"> Página inicial</a></li>
                            <li class="nav-item"><a href="../cliente/home_cli.php" class="nav-link"> Procurar Profissional</a></li>
                            <li class="nav-item"><a href="../cliente/chat_cli.php" class="nav-link"> Mensagens</a></li>
                            <li class="nav-item"><a href="../conec.t_store/store_initial.php" class="nav-link"> Loja</a></li>
                            <li class="nav-item"><a href="../cliente/sair.php" class="nav-link"> Sair</a></li>                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>  
    </body>
</html>