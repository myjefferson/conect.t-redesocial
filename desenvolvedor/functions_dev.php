<?php 

//Carrega as ultimas demandas
function carregar_demandas_atuais(){
    include("../conexao_banco.php");
    $consulta = mysqli_query($conexao, "SELECT C.nome, D.id_dmds, D.titulo, D.objetivo, D.observs, D.prazo, D.rec_dinheiro FROM demandas D, cliente C WHERE D.id_cli = C.id_cli ORDER BY id_dmds DESC");   
    $contagem = 0;
    while($demanda = mysqli_fetch_assoc($consulta) and $contagem < 5){
        echo "<a href='dmds_client_selected.php?demds=".$demanda['id_dmds']."' id='demds_link'>";
        echo"<div id='dmds-atual'>";         
        echo"<p class='name'>".$demanda['nome_cliente']."</p>";      
        echo "<p class='project'>".mb_strimwidth($demanda['titulo'], 0, 23, "...")."<br></p>";
        //echo "<label>Recompensa: ".$demanda['tipo_rec']."<br></label>";      
        echo"</div>";
        echo "</a>";
        $contagem++;
    }
}
?>