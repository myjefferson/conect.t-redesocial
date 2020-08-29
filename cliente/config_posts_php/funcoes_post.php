<?php
//Função apagar postagem
function delete_post($id_post, $id_dev){
    include('../../conexao_banco.php');
    $delete = mysqli_query($conexao, "DELETE FROM postagens WHERE id = '$id_post' AND id_postador = '$id_dev'");
    if($delete){
        return true;
    }else{
        return false;
    }
}

?>