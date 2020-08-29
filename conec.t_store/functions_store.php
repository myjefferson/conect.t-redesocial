<?php

//Insere um programa no banco de dados
function postar_programa(){
    include("../conexao_banco.php");

    $id_dev = $_SESSION['id'];
    $nome_dev = $_SESSION['nome'];
    $img_icone = $_FILES['img_icone'];
    $titulo = $_POST['titulo'];
    $site = $_POST['site'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if(!empty($_POST['plataforma'] && count($_POST['plataforma']))){

        //icone
        $n = strtolower(substr($_FILES['img_icone']['name'], -4));
        $icone = md5(time()).$n;
        move_uploaded_file($_FILES['img_icone']['tmp_name'], "icons_store/".$icone);

        //programa
        $ext = strtolower(substr($_FILES["prog"]["name"], -4));
        $prog_name = md5(time()).$ext;
        move_uploaded_file($_FILES['prog']['tmp_name'], "progs_store/".$prog_name);

        $plataforma = implode(',',$_POST['plataforma']);

        $sql = "INSERT INTO programas_loja (id_dev, titulo, `site`, email, telefone, plataforma, descricao, preco, icone, arc_windows, nome_dev) VALUES ('$id_dev','$titulo','$site','$email','$telefone','$plataforma','$descricao','$preco', '$icone', '$prog_name', '$nome_dev')";
        
        if(mysqli_query($conexao, $sql)){
            echo"Sucesso";
            header("Location: store_initial.php");
        }else{
            echo"Erro";
        }
    }else{
        echo"Por favor escolha o tipo de platao";
    }
}

//Apaga o programa -- manutenção
function apagar_programa(){
    include("../conexao_banco.php");
    mysqli_query($conexao, "DELETE FROM programas_loja WHERE id = ".$_GET['prog']." and id_dev = ".$_SESSION['id']." ") or die("Erro ao excluir, por favor tente novamente mais tarde!");
    header("Location: store_mypublics.php");
}

//Funcao de avaliar programa (em testes)
function avaliacao_programa() {
    include("../conexao_banco.php");
    $qtde_estrela = $_POST['estrela'];

    $sql =mysqli_query($conexao, 'SELECT * FROM programas_aval WHERE id_prog = '.$_GET['prog'].' and id_dev = '.$_SESSION['id'].'') or die('Erro na seleção');
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
