<head>
    <link rel="stylesheet" href="css_store/nav_store.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">

    <script type="text/javascript" src="../lib/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>   
</head>
<nav>
    <img id="logo-store" src="../icones/logo-store.png">
    <div id="user_options">
        <?php 
            include("../conexao_banco.php");
            $type_user = $_SESSION['type_user'];           
            if($type_user == "dev"){
                $query = mysqli_query($conexao, "SELECT * FROM desenvolvedor WHERE type_user = '$type_user' AND id_dev = ".$_SESSION['id_dev']."") or die ("Erro no banco de dados");
                $get = mysqli_fetch_assoc($query);
                echo "<a href='../desenvolvedor/home_dev.php'><label>".$get['nome']."</label></a>";
                echo "<img id='user' src='../desenvolvedor/fotos_dev/".$get['foto']."'>";
            }else{
                $query = mysqli_query($conexao ,"SELECT * FROM cliente WHERE type_user = '$type_user' AND id_cli = ".$_SESSION['id_cli']."") or die ("Erro no banco de dados");
                $get = mysqli_fetch_assoc($query);
                echo "<img id='user' src='../cliente/fotos_cli/".$get['foto']."'>";
            }
        ?>
    </div>
</nav>