<link rel="stylesheet" href="style_dev/css_dev/alterar_conta.css"> 
<!------------------------ ALTERAR FOTO DO PERFIL ------------------------>
<div class="modal fade" id="window-foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Escolha sua foto de perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                
                <!--Form perfil-->
                <p class="align_center_add" id="text_foto" style="display: none"></p><!--Texto que irá aparecer após adicionar foto-->
                <form method="POST" action="perfil_dev.php" enctype="multipart/form-data">
                    <!--nome e da foto do desenvolvedor-->                                
                    <input type="file" name="foto_perfil" accept="image/jpeg, image/png, image/jpg, image/bmp" id="foto-perfil" style="display: none">
                    <p id="add_foto">
                        <a class="" type="button" id="foto" value="Foto" onClick="document.getElementById('foto-perfil').click()">
                            <p class="align_center_add"><span class="material-icons" id="icon-foto-add">add_a_photo</span><label class="align_center_add" id="add_text_foto">Adicionar foto</label></p>
                            <p class="align_center_add"><img id="foto_perfil_prev" src="#" alt=" " style="display: none"></p>                         
                            <p class="align_center_add" id="btn_add"><a id="outra_foto" onClick="document.getElementById('foto-perfil').click()" style="display: none" class="btn btn-primary">Escolher outra foto</a></p>
                        </a>
                    </p>

                    <div class="modal-footer">
                        <button type="button" onClick="clear_foto_perfil()"  id="btncalcel" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="alterar_foto" class="btn btn-default salvar" onclick="refresh();">Salvar alterações</button>
                    </div>
                </form>
            </div>
        </div>                                              
    </div>
</div>    

<script>
    //Efeito modal alterar foto
    $('#modal-foto').click(function() {
        $('#window-foto').modal()})
    }
</script>

<!--Pré-visualizar a foto-->
<script>  
    $("#foto-perfil").change(function(){
        var input = document.querySelector("#foto-perfil")

        if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function(e){
                $("#foto_perfil_prev").attr('src', e.target.result);                        
                HiddenStyle_AddFoto(); //mostra alguns estilos e remove outros (objetos)
            }                  
            reader.readAsDataURL(input.files[0]);
        }
    });

    //limpa a foto de perfil  
    function clear_foto_perfil(){
        //Apagar campos
        var foto = $("#foto-perfil");
        foto.replaceWith(foto.val(''));
        VisibleStyle_AddFoto();
    }

    //remove o molde de "adicinar foto"
    function HiddenStyle_AddFoto(){
        document.querySelector("#foto_perfil_prev").style.display = "block";
        document.querySelector('#outra_foto').style.display = "block";
        document.querySelector("#icon-foto-add").style.display = "none";
        document.querySelector("#add_text_foto").style.display = "none"; 
        var text_foto = document.querySelector("#text_foto");       
        text_foto.style.display = "block";
        text_foto.innerText = "Sua foto ficará assim:";     
    }
    //adiciona o molde de "adicionar foto"
    function VisibleStyle_AddFoto(){
        document.querySelector("#foto_perfil_prev").style.display = "none";
        document.querySelector('#outra_foto').style.display = "none";
        document.querySelector("#icon-foto-add").style.display = "inline-block";
        document.querySelector("#add_text_foto").style.display = "block"; 
        var text_foto = document.querySelector("#text_foto");       
        text_foto.style.display = "none";    
    }
</script>

<!------------------------ ALTERAR FOTO DA CAPA ------------------------>
<div class="modal fade" id="window-capa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Escolha sua foto de capa do perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                
                <!--Form perfil-->
                <p class="align_center_add" id="text_capa" style="display: none"></p><!--Texto que irá aparecer após adicionar foto-->
                <form method="POST" action="perfil_dev.php" enctype="multipart/form-data">
                    <!--nome e da foto do desenvolvedor-->                                
                    <input type="file" name="foto_capa" accept="image/jpeg, image/png, image/jpg, image/bmp" id="foto-capa" style="display: none">
                    <p id="add_capa">
                        <a class="" type="button" id="foto" value="Foto" onClick="document.getElementById('foto-capa').click()">
                            <p class="align_center_add"><span class="material-icons" id="icon-capa-add">add_a_photo</span></p>
                            <p class="align_center_add"><img id="foto_capa_prev" src="#" alt=" " style="display: none"/></p>
                            <p class="align_center_add" id="add_text_capa">Adicionar foto para capa</p>
                            <p class="align_center_add" id="btn_add"><a id="outra_capa" onClick="document.getElementById('foto-capa').click()" style="display: none" class="btn btn-primary">Escolher outra foto</a></p>
                        </a>
                    </p>

                    <div class="modal-footer">
                        <button type="button" onClick="clear_foto_capa()"  id="btncalcel" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="alterar_capa" class="btn btn-default salvar">Salvar alterações</button>
                    </div>
                </form>
            </div>
        </div>                                              
    </div>
</div>   



<script>
    //Efeito modal alterar foto
    $('#modal-capa').click(function() {
        $('#window-capa').modal()})
    }
</script>

<!--Pré-visualizar a foto da capa-->
<script>    
    $("#foto-capa").change(function(){
        var input = document.querySelector("#foto-capa")

        if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function(e){
                $("#foto_capa_prev").attr('src', e.target.result);                        
                HiddenStyle_AddCapa(); //mostra alguns estilos e remove outros (objetos)
            }                  
            reader.readAsDataURL(input.files[0]);
        }
    });

    //Limpa a foto da capa
    function clear_foto_capa(){
        //Apagar campos
        var capa = $("#foto-capa");
        capa.replaceWith(capa.val(''));
        VisibleStyle_AddCapa();
    }

    //remove o molde de "adicinar foto"
    function HiddenStyle_AddCapa(){
        document.querySelector("#foto_capa_prev").style.display = "initial";
        document.querySelector('#outra_capa').style.display = "initial";
        document.querySelector("#icon-capa-add").style.display = "none";
        document.querySelector("#add_text_capa").style.display = "none"; 
        var text_foto = document.querySelector("#text_capa");       
        text_foto.style.display = "initial";
        text_foto.innerHTML = "<p>" + "Sua capa ficará assim:" + "</p>";     
    }

    function VisibleStyle_AddCapa(){
        document.querySelector("#foto_capa_prev").style.display = "none";
        document.querySelector('#outra_capa').style.display = "none";
        document.querySelector("#icon-capa-add").style.display = "inline-block";
        document.querySelector("#add_text_capa").style.display = "block"; 
        var text_foto = document.querySelector("#text_capa");       
        text_foto.style.display = "none";    
    }
</script>

<!----------------------- ALTERAR INFORMAÇÕES DO PERFIL ---------------------->
<?php if(isset($_POST['alterar_perfil'])){altera_perfil();} ?>
<script>
    function limpar_campos(){
        $("#descricao").val('');
        $("#nome").val('');
        $("#senha").val('');
        $("#senha_nova").val('');
        $("#senha_nova_n").val('');
    }
</script>
<div class="box-config">
    <!-- Modal -->
    <div class="modal fade" id="window-config" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Alterar Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--Form perfil-->
                    <form method="POST" action="perfil_dev.php">
                        <p>Digite sua descrição:</p> <textarea type="text" class="form-control" name="descricao" id="descricao" placeholder="Sou programador de..."></textarea><br>
                        <p>Mudar nome:</p> <input type="text" class="form-control" name="nome" id="nome"><br>
                        <p>Digite sua senha atual:</p> <input type="password" class="form-control" name="senha" id="senha"><br>
                        <hr>
                        <p>Digite sua nova senha:</p> <input type="password" class="form-control" name="senha_nova" id="senha_nova"><br>
                        <p>Digite a nova senha novamente:</p> <input type="password" class="form-control" name="senha_nova_n" id="senha_nova_n"><br>
                        <div class="modal-footer">
                            <button type="button" onClick="limpar_campos()" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="alterar_perfil" class="btn btn-primary salvar" onclick="refresh();">Salvar alterações</button>
                        </div>
                    </form>
                </div>
            </div>                                              
        </div>
    </div>
</div>

<script>
    //Efeito modal alterar descricao
    $('#btn_add_desc').click(function() {
        $('#window-config').modal();})
    }

    //Efeito modal alterar perfil
    $('#modal-config').click(function() {
        $('#window-config').modal()})
    }    
</script>

<?php
//ALTERA A FOTO DE PERFIL
function altera_foto_perfil(){
    include("../conexao_banco.php");
    $foto_perfil = $_FILES['foto_perfil'];
    $id_dev = $_SESSION['id_dev'];

    if(!empty($foto_perfil)){
        $n = rand(0, 1000000);
        $nome_foto = $n.$_FILES["foto_perfil"]["name"];
        $hoje = date("Y,m,d");

        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], "fotos_dev/".$nome_foto);
        // Pega a extensão
        $extensao = pathinfo($nome_foto, PATHINFO_EXTENSION);
        // Deixa a extensão em minusculo
        $extensao = strtolower($extensao);
        //Aceita apenas estas extensões de imagem
        if(strstr('.jpg;.jpeg;.png;.bmp', $extensao)){
            $query = 'UPDATE desenvolvedor SET foto = "'.$nome_foto.'" WHERE id_dev = "'.$id_dev.'"';     
            if(mysqli_query($conexao, $query))
            {
                header("Location: perfil_dev.php");
                echo"Foto de perfil alterada";          
            }
            else
            {
                header("Location: perfil_dev.php");
                echo"Erro";        
            }
        }else{
            echo"<script>
                alert('Por favor, tente novamente e adicione apenas aquivos de imagem.');
                window.location = 'perfil_dev.php';
            </script>";
        }      
    }else{
        header("Location: perfil_dev.php");
        echo"Erro";        
    }
}

//ALTERA A FOTO DA CAPA
function altera_capa_perfil(){
    include("../conexao_banco.php");
    $foto_capa = $_FILES["foto_capa"];
    $id_dev = $_SESSION['id_dev'];

    if(!empty($foto_capa)){
        $n = rand(0, 1000000);
        $nome_capa = $n.$_FILES["foto_capa"]["name"];
        $hoje = date("Y,m,d");
        
        move_uploaded_file($_FILES["foto_capa"]['tmp_name'], "fotos_dev/".$nome_capa);
        // Pega a extensão
        $extensao = pathinfo($nome_capa, PATHINFO_EXTENSION);
        // Deixa a extensão em minusculo
        $extensao = strtolower($extensao);

        //Aceita apenas estas extensões de imagem
        if(strstr('.jpg;.jpeg;.png;.bmp', $extensao)){
            $query = 'UPDATE desenvolvedor SET ft_capa = "'.$nome_capa.'" WHERE id_dev = "'.$id_dev.'"';     
            if(mysqli_query($conexao, $query))
            {
                header("Location: perfil_dev.php");
                echo"Foto da capa perfil alterada";          
            }
            else
            {
                header("Location: perfil_dev.php");
                echo"Erro";        
            }
        }else{
            echo"<script>
                alert('Por favor, tente novamente e adicione apenas aquivos de imagem.');
                window.location = 'perfil_dev.php';
            </script>";
        }      
    }else{
        header("Location: perfil_dev.php");
        echo"Erro";        
    }
} 

//ALTERA AS INFORMAÇÕES DO PERFIL
function altera_perfil(){
    include("../conexao_banco.php");

    $id_dev = $_SESSION['id_dev'];
    $senha = $_POST['senha'];
    $senha_nova = $_POST['senha_nova'];
    $senha_nova_n = $_POST['senha_nova_n'];
    $descricao = $_POST['descricao'];
    $refresh = header("Location: perfil_dev.php");

    if(!empty($senha)){
        $query_senha = mysqli_query($conexao, 'SELECT senha FROM desenvolvedor');
        $senha_dev = mysqli_fetch_assoc($query_senha);

        if ($senha_dev['senha'] != md5($senha)){
            echo"Sua senha atual está incorreta";
        }else if($senha_nova != $senha_nova_n){
            echo"As senha não estão iguais!";
        }
        else{    
            $query = mysqli_query($conexao, 'UPDATE desenvolvedor SET senha = "'.md5($senha_nova_n).'" WHERE id_dev = "'.$id_dev.'"');   
            echo"Senha alterada com sucesso!"; 
            $refresh;                                                                        
        }      
    }

    if(!empty($descricao)){
        $query = mysqli_query($conexao, 'UPDATE desenvolvedor SET descricao = "'.$descricao.'" WHERE id_dev = "'.$id_dev.'"');   
        echo"Descrição alterada com sucesso!";  
        $refresh;
    }
}

?>