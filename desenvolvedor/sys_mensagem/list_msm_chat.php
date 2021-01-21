<?php //SELECIONAR MENSAGENS NO BANCO
include("../../conexao_banco.php");

if(isset($_GET['user'])){   
    $id_dev_enviou = $_GET['id_dev_enviou'];
    
    $id_para = $_GET['user'];
    $type_user = $_GET['type_user'];

    $resultado = $conexao->query("SELECT * FROM(SELECT * FROM chat WHERE (
                                                                            (id_user_enviou = {$id_dev_enviou} AND tipo_user_enviou = 'dev') AND 
                                                                            (id_user_recebeu = {$id_para} AND tipo_user_recebeu = '{$type_user}')
                                                                         ) or ( 
                                                                                (id_user_enviou = {$id_para} AND tipo_user_enviou = '{$type_user}') AND 
                                                                                (id_user_recebeu = {$id_dev_enviou} AND tipo_user_recebeu = 'dev')
                                                                              ) ORDER BY id DESC) sub ORDER BY id ASC ");
    $conta = mysqli_num_rows($resultado);

    if($conta <= 0){
        //echo"<code>{ HELLO! }</code>";
    }else{
        while($row = mysqli_fetch_array($resultado)){
            
            //Enviei mensagem
            if($row['id_user_enviou'] == $id_dev_enviou and $row['tipo_user_enviou'] == 'dev'){ ?>
                <div align="right" id="right"><p><?php echo$row['mensagem']; ?></p></div>
            <?php }
                //Não enviei mensagem esquerda
                else if($row['id_user_enviou'] == $id_para and $row['tipo_user_enviou'] == $type_user){ ?>
                <div id="left"><p><?php echo$row['mensagem']; ?></p></div>
            <?php } ?>                                                               
<?php }}} ?>