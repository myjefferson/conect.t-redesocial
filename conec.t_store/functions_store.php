<?php

//Insere um programa no banco de dados
function postar_programa(){
    include("../conexao_banco.php");

    $id_dev = $_SESSION['id_dev'];
    $nome_dev = $_SESSION['nome'];
    $titulo = $_POST['title'];
    $site = $_POST['site'];
    $email = $_POST['email'];
    $descricao = $_POST['description'];
    $preco = $_POST['preco'];
    $smallAbout = $_POST['smallAbout'];
    $parentalRating = $_POST['parentalRating'];

    if(!empty($_POST['plataforma'] && count($_POST['plataforma']))){

        //icone
        $n = strtolower(substr($_FILES['imagePrincipal']['name'], -4));
        $icone = md5(time()).$n;
        move_uploaded_file($_FILES['imagePrincipal']['tmp_name'], "data_imgs_store/".$icone);

        //programa
        $ext = strtolower(substr($_FILES["software"]["name"], -4));
        $software_name = md5(time()).$ext;
        move_uploaded_file($_FILES['software']['tmp_name'], "posts_software_store/".$software_name);

        $plataforma = implode(',',$_POST['plataforma']);

        $sql = "INSERT INTO software_store(id_dev, title, site, email, plataforma, descricao, preco, icone, rating, nome_dev, parentalRating, smallAbout) VALUES ('$id_dev','$titulo','$site','$email', '$plataforma','$descricao','$preco','$icone', '0', '$nome_dev', '$parentalRating','$smallAbout')" or die ("Erro ao inserir no banco de dados");
        
        if($conexao->query($sql)){
            echo"Sucesso";
            //header("Location: my_publishs.php");
        }else{
            echo"Erro";
        }

    }else{
        echo"Por favor escolha o tipo de plataforma";
    }
}

//Apaga o programa -- manutenção
function apagar_programa(){
    include("../conexao_banco.php");
    mysqli_query($conexao, "DELETE FROM software_store WHERE id = ".$_GET['prog']." and id_dev = ".$_SESSION['id_dev']." ") or die("Erro ao excluir, por favor tente novamente mais tarde!");
    header("Location: my_publishs.php");
}

//Funcao de avaliar programa (em testes)
function avaliacao_programa() {
    include("../conexao_banco.php");
    $qtde_estrela = $_POST['estrela'];

    if($_SESSION['type_user'] == 'dev'){
        $sql =mysqli_query($conexao, 'SELECT * FROM programas_aval WHERE id_prog = '.$_GET['prog'].' and id_dev = '.$_SESSION['id_dev'].'') or die('Erro na seleção');
    }else{
        $sql =mysqli_query($conexao, 'SELECT * FROM programas_aval WHERE id_prog = '.$_GET['prog'].' and id_cli = '.$_SESSION['id_cli'].'') or die('Erro na seleção');
    }

    if(empty($sql)){
        mysqli_query($conexao, "UPDATE programas_aval SET qtde_estrela = ".$qtde_estrela.", data = NOW() where id_prog = ".$_GET['prog']."") or die('erro ao atualizar');
        //header('Location: app_select.php?prog='.$_GET['prog'].'');
    }/*else{
            
            $insert_aval = mysqli_query($conexao, "INSERT INTO programas_aval (id_prog, id_dev, qtde_estrela, data) VALUES (".$_GET['prog'].", ".$_SESSION['id'].", ".$qtde_estrela.", NOW())");
            
            if(mysqli_insert_id($conexao)){
                $_SESSION['msg'] = "Avaliação cadastrada com sucesso";
                //header('Location: app_select.php?prog='.$_GET['prog'].'');
            }else{
                $_SESSION['msg'] = "Erro ao avaliar";
                //header('Location: app_select.php?prog='.$_GET['prog'].'');
        }
    }*/
    
}

?>