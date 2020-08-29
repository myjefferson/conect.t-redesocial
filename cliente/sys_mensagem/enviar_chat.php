<?php
    include("../../conexao_banco.php");
    //Mensagem
    $mensagem = $_POST['mensagem'];
    //informações do dev
    $id_cli_enviou = $_POST['id_cli_enviou'];
    //informações de quem vai receber
    $type_user_recebeu = $_POST['type_user_recebeu'];
    $id_user_recebeu = $_POST['id_user_recebeu'];

    if(empty($mensagem)){
        echo"<script>alert(Você precisa escrever uma mensagem)</script>";
    }else{
        if(mysqli_query($conexao, "INSERT INTO chat (id_user_enviou, tipo_user_enviou, id_user_recebeu, tipo_user_recebeu, mensagem, hour) VALUES ('$id_cli_enviou', 'cli', '$id_user_recebeu', '$type_user_recebeu', '$mensagem', NOW())")){
            echo"<script>alert('Mensagem enviada');</script>";
        }else{
            echo"<script>alert('Mensagem não enviada');</script>";
        }
        
    }
?>