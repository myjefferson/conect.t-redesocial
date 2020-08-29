<?php
    include_once "../../conexao_banco.php";
    include_once "funcoes_like.php";
    $id_post = (int)$_POST['post_id'];
    $dev_id = (int)$_POST['dev_id'];

    if(un_like($id_post, $dev_id)){
        echo 'sucesso';
    }else{
        echo 'erro';
    }
?>