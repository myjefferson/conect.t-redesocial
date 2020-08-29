<?php 

//Função insere a demanda
function insert_demanda(){
    include("../conexao_banco.php");

    $id_dev = $_SESSION['id'];
    $titulo = $_POST['titulo'];
    $assunto = $_POST['assunto'];
    $functions = $_POST['functions'];
    $opc_rec = $_POST['opc_rec'];
    $dinheiro = $_POST['dinheiro'];
    $pontos = $_POST['pontos'];
    
    if(!empty($_POST['dinheiro'])){
        mysqli_query($conexao, "INSERT INTO demandas (id_dev, titulo, assunto, funcoes, recompensa, rec_pagamento) VALUES ('$id_dev', '$titulo', '$assunto', '$functions', '$opc_rec', '$dinheiro')") or die("Erro ao publicar a demanda - dinheiro");
    }else{
        mysqli_query($conexao, "INSERT INTO demandas (id_dev, titulo, assunto, funcoes, recompensa, rec_pontos) VALUES ('$id_dev', '$titulo', '$assunto', '$functions', '$opc_rec', '$pontos')") or die("Erro ao publicar a demanda - pontos");
    }
}