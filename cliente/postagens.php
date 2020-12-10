<?php
    //Redirecionamento de página
    function redirect(){
        $page_name = $_GET['page'];
        header("Location: ".$page_name."");
    }
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js_config/like_unlike.js"></script>  
<link rel="stylesheet" href="style_cli/css_cli/estl_posts.css">
<!--<audio id="song" src="js_config/songs/click.mp3"></audio> som ao clicar-->
<script type="text/javascript">
    //SCRIPT DE COMENTARIOS
    $(document).ready(function(){

        $(".btn-comentar").click(function(){

            //if(event.which == 13){
                var getid = $(this).parent().attr('id').replace('record-','');
                var btn = $("#btn-comentar-"+getid).val();

                var id_cli = $("#id_cli").val();
                var comentario = $("#id_comentario-"+getid).val();
                var nome = $("input#nome_coment").val();
                var foto = $("input#foto_coment").val();
                var id_postagem = getid;
            
                if(comentario == ''){
                    alert("Você precisa escrever um comentário");
                    return false;
                }

                var dataString = 'id_cli=' + id_cli + '&comentario=' + comentario + '&id_postagem=' + id_postagem;

                $.ajax({
                    type: 'POST',
                    url: 'insert_comentario.php',
                    data: dataString,
                    dataType: 'json',

                    success: function(data){
                        $('#novocomentario'+id_postagem).append('<img src="fotos_cli/'+foto+'" id="img_postador_coment" onerror=this.src="../icones/sem-perfil.png"><div id="block-coment"><p id="name">'+nome+'</p><p id="text-coment">'+comentario+'</p></div>');
                        var num_coments = data['num_coments'];
                        
                        if(num_coments == 1){
                            text = " Comentário";
                        }else{
                            text = " Comentários";
                        }

                        $("label#num-coments_"+id_postagem).text(num_coments+text);
                        $("p#text-nenhum-coment_"+id_postagem).hide();
                    }
                });
                return false;
            //}
        });
    });
</script>

<?php 
    //Carregar postagens
    if($id_page == "perfil_cli.php"){
        $resultados = mysqli_query($conexao, 'SELECT * FROM postagens WHERE id_cli = '.$id_cli.' ORDER BY id_post DESC'); 
    }else{
        $resultados = mysqli_query($conexao, 'SELECT * FROM postagens ORDER BY id_post DESC ');
    }   
        
    if($todos_posts = mysqli_num_rows($resultados) > 0){         
        
        //Carregamento das postagens
        while($post = mysqli_fetch_array($resultados)){ 
            $id_post = $post['id_post']; ?>
            
            <!--HEAD - cabeçalho da postagem-->
            <div class='card' id='feed_posts'>
                <div class='card-header'>    
                    <?php 
                        $time = strtotime($post['data']); 
                        $newformat = date("d-m-Y", $time);
                    ?>
                    <div class='block'> 
                        <?php //VERIFICA FOTO DOS POSTS
                        $check_query_cli = mysqli_query($conexao, 'SELECT * FROM postagens P, cliente C WHERE C.id_cli = '.$post['id_cli'].'');
                        $user_cli = mysqli_fetch_assoc($check_query_cli);

                        $check_query_dev = mysqli_query($conexao, 'SELECT * FROM postagens P, desenvolvedor D WHERE D.id_dev = '.$post['id_dev'].'');
                        $user_dev = mysqli_fetch_assoc($check_query_dev);

                        if($id_cli == $post['id_cli']){
                            //APAGAR POSTAGEM
                            if($id_cli == $user_cli['id_cli']){                      
                                echo'<a class="btn btn-primary btn-del-post" href="'.$id_page.'?delete_post='.$id_post.'&page='.$id_page.'" id="id" class="delete_post"><i class="large material-icons">delete</i></a>'; 
                            }

                            if($user_cli['id_cli']){
                                //FOTO DO POSTADOR CLI ?>
                                <img src="fotos_cli/<?php echo$user_cli["foto"]; ?>" id="img_postador" onerror="this.src='style_cli/img_cli/sem-perfil.png'">
                                <p class="name_post"><?php echo$user_cli['nome']; ?></p></br>
    
                            <?php } 
                        }else{ //FOTO DO POSTADOR DEV ?>
                            <img src="../desenvolvedor/fotos_dev/<?php echo$user_dev["foto"]; ?>" id="img_postador" onerror="this.src='style_cli/img_cli/sem-perfil.png'">
                            <p class="name_post"><?php echo$user_dev['nome']; ?></p></br>
                            <p id="dev_text">Desenvolvedor</p>

                     <?php } ?>    

                        <p class='data_post'>Data da postagem: <?php echo$newformat; ?> </p>
                    </div>
                </div>

                <!--BODY - Conteudo da postagem-->
                <div class='cont-post'>
                    <?php echo$post["texto"]; ?><br/><!--Textos-->
                    <img class="img-post" src="postagens_cli/<?php echo$post['imagem']; ?>" onerror=this.style.display="none"><br>
                    <img class="img-post" src="../desenvolvedor/postagens_dev/<?php echo$post['imagem']; ?>" onerror=this.style.display="none"><br>
                </div>
                
                <!--FOOTER - Likes e Comentarios-->
                <div class="card-footer" id="footer-post<?php echo$id_post ?>">
                    <?php //BOTOES DE LIKE, DESLIKE E TOTAL
                        $query = mysqli_query($conexao, 'SELECT * FROM likes WHERE post = '.$post['id_post'].' AND id_cli = '.$id_cli.'');

                        if($post['num_likes'] == 0){
                            $text_like = " ";
                            $post['num_likes'] = " ";                                            
                        }else if($post['num_likes'] == 1){
                            $text_like = " Curtida";                                                             
                        }else{
                            $text_like = " Curtidas";    
                        }?>

                        <label class="text_likes" id="likes_<?php echo $post['id_post']; ?>"> <?php echo $post['num_likes'].$text_like; ?></label>
                        <?php if(mysqli_num_rows($query) == 0) { ?>                             
                            <li><div class="btn btn-default btn-xs like" id="<?php echo $post['id_post']; ?>"><i class="material-icons n_gostei">thumb_up_alt</i></div></li>  
                        <?php } else { ?>             
                            <li><div class="btn btn-default btn-xs like" id="<?php echo $post['id_post']; ?>"><i class='material-icons gostei'>thumb_up</i></div></li>
                <?php } ?>
                
                <!--COMENTARIOS--------------------------------------->
                <div id="block-btns-coments">
                    <?php $query_coment = mysqli_query($conexao, "SELECT count(id) as qtde FROM comentarioscli WHERE post = ".$post['id_post']."");
                            $coment_load = mysqli_fetch_assoc($query_coment); 

                            if($coment_load['qtde'] == 0){
                                $text = " Nenhum comentário";
                                $coment_load['qtde'] = " ";
                            }else if($coment_load['qtde'] == 1){
                                $text = " Comentário";
                            }else{
                                $text = " Comentários";
                            }

                            echo "<label class='num-coments'  id='num-coments_".$id_post."' onClick='mostrar_comentarios".$id_post."();'>".$coment_load['qtde'].$text."</label>"; ?>
                    
                    <a id="btn_coments_show<?php echo$id_post ?>" class="btn btn-primary btn-mostrar-coments" onClick="mostrar_comentarios<?php echo$id_post ?>();"> <span class="material-icons">chat_bubble_outline</span></a>
                    <a id="btn_coments_hidden<?php echo$id_post ?>" class="btn btn-primary btn-ocultar-coments" onClick="ocultar_comentarios<?php echo$id_post ?>();"><span class="material-icons">chat_bubble</span></a>
                </div>
                            

                <div id="area_comentario">
                    <form method="post" action="">
                        <label id="record-<?php echo$id_post; ?>">

                        <input type="text" class="comentario form-control text-coment" name="comentario" placeholder="Escreva um comentario" id="id_comentario-<?php echo$id_post ?>">           
                        <a class="btn btn-primary btn-comentar" id="btn-comentar-<?php echo$id_post; ?>"><span class='material-icons'>send</span></a>

                        <input type="hidden" id="id_cli" name="cli" value="<?php echo$id_cli; ?>">
                        <input type="hidden" id="id_post" name="id_post" value="<?php echo$post['id_post']; ?>">
                        <input type="hidden" id="nome_coment" name="nome" value="<?php echo$_SESSION['nome']; ?>">
                        <input type="hidden" id="foto_coment" name="foto" value="<?php echo$check_user['imagem']; ?>">
                    </from>
                </div>
                <!--Corpo dos comentarios-->
                <div id='body-coments<?php echo$id_post ?>' class="body-coments">
                    <div id="all-coments">
                        <div id="novocomentario<?php echo$post['id_post'] ?>"></div>
                        
                        <?php
                        $query_coments = mysqli_query($conexao, "SELECT * FROM comentarioscli WHERE post = ".$id_post." ORDER BY id DESC ");

                        if(mysqli_num_rows($query_coments) > 0){
                            while($com = mysqli_fetch_array($query_coments)){
                                $cli_com_query = mysqli_query($conexao, "SELECT * FROM cliente WHERE id_cli = ".$com['id_cli']."");
                                $cli_com = mysqli_fetch_array($cli_com_query);

                                echo"<img src='fotos_cli/".$cli_com["foto"]."' id='img_postador_coment' onerror=this.src='style_cli/img_cli/sem-perfil.png'>";
                                ?>
                                <div id="block-coment">
                                    <?php
                                        echo"<p id='name'>".$cli_com['nome']."</p>";
                                        echo"<p id='text-coment'>".$com['comentario']."</p>";
                                    ?>
                                </div>
                    <?php   } 
                        } else{echo"<p class='text-nenhum-coment' id='text-nenhum-coment_".$post['id_post']."'><span class='material-icons icon-sem-coment'>announcement</span>Nenhum comentário</p>";} ?>
                    </div>
                </div>
                <!--FIM COMENTARIOS------------------------------------->
            </div>
        </div>

<!--Controles mostrar comentarios-->
<script>  
    var body_coments = document.getElementById("body-coments<?php echo$id_post ?>").style.display = "none";
    var btn_ocultar = document.getElementById("btn_coments_hidden<?php echo$id_post ?>").style.display = "none";

    function mostrar_comentarios<?php echo$id_post ?>(){
        var btn_ocultar = document.getElementById("btn_coments_hidden<?php echo$id_post ?>").style.display = "inline-block";
        var btn_coments_show = document.getElementById("btn_coments_show<?php echo$id_post ?>").style.display = "none";
        var body_coments = document.getElementById("body-coments<?php echo$id_post ?>").style.display = "block";
    }

    function ocultar_comentarios<?php echo$id_post ?>(){        
        var btn_ocultar = document.getElementById("btn_coments_hidden<?php echo$id_post ?>").style.display = "none";
        var btn_coments_show = document.getElementById("btn_coments_show<?php echo$id_post ?>").style.display="inline-block";
        var body_coments = document.getElementById("body-coments<?php echo$id_post ?>").style.display = "none"; 
    }
</script>      

<?php   } 
}else{
    //Caso não houver postagens
    include("style_cli/boas_vindas/bem_vindo.html");
} 

//Deletar a postagem
if(!function_exists("deletar_postagem")){
    function deletar_postagem(){
        include("../conexao_banco.php");
        $post_id = $_GET['delete_post'];
        $id_cli = $_SESSION['id_cli'];

        $delete_post = mysqli_query($conexao, "DELETE FROM postagens WHERE id_post = '$post_id' AND id_cli = '$id_cli'");
        $delete_likes = mysqli_query($conexao, "DELETE FROM likes WHERE post = '$post_id'");
        $delete_coments = mysqli_query($conexao, "DELETE FROM comentarioscli WHERE post = '$post_id'");
        if($delete_post && $delete_likes && $delete_coments){   
            redirect();
        }else{
            redirect();
        }
    }

    if(isset($_GET['delete_post'])){
        deletar_postagem();
    }
}  
?>  