<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/app_select.css">
    <title>CONEC.T Store</title>
</head>
<body>
    <?php session_start(); include("navTop_store.php"); include("functions_store.php"); ?>
    <div class="backgroud-head">
        <div class="container">
            <div class="col">
                <section class="head-app">
                    <?php 
                        $busca_prog = $conexao->query('SELECT * FROM software_store WHERE id = '.$_GET["prog"].'');
                        
                        if(mysqli_num_rows($busca_prog) > 0){
                            $load = $busca_prog->fetch_assoc();

                            echo "<img src='data_imgs_store/".$load['icone']."' id='principalImage'/><label class='info'><p id='title'>".$load['title']."</p><p id='title-dev'>Desenvolvedor: ".$load['nome_dev']."</p><img id='parentalRating' src='assets/img/".$load['parentalRating'].".png'><p id='smallAbout'>".$load['smallAbout']."</p><p>".$load['preco']."</p></label>";               
                            
                    ?>

                            

                    <?php if(isset($_POST['avaliar'])){
                                avaliacao_programa();
                            } ?>
                    
                    <form method="post" id="avaliacao" action="app_select.php?prog='<?php echo $_GET["prog"] ?>'">
                        <div class="estrelas">
                            <input type="radio" id="vazio" name="estrela" value="" checked="checked">
                            
                            <label for="estrela_um"><i class="fa"></i></label>
                            <input type="radio" id="estrela_um" name="estrela" value="1">

                            <label for="estrela_dois"><i class="fa"></i></label>
                            <input type="radio" id="estrela_dois" name="estrela" value="2">

                            <label for="estrela_tres"><i class="fa"></i></label>
                            <input type="radio" id="estrela_tres" name="estrela" value="3">

                            <label for="estrela_quatro"><i class="fa"></i></label>
                            <input type="radio" id="estrela_quatro" name="estrela" value="4">

                            <label for="estrela_cinco"><i class="fa"></i></label>
                            <input type="radio" id="estrela_cinco" name="estrela" value="5">
                        </div>
                        <input type="submit" class="btn btn-primary" name="avaliar" value="Avaliar">
                    </form>
                </section>
            </div>
        </div>
    </div>

    <div class="background-downlaod">
        <div class="container">
            <div class="col">
                <div id="buttons-download">
                    <button id="list-desire" class="btn btn-primary">+ Lista de desejos</button>
                    <button id="download" class="btn btn-primary">Baixar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container cont-2">
        <div class="col">
            <section class="desc">
                <h2>Descrição</h2>
                <?php
                    echo $load['descricao'];
                    }else{
                        echo"Desculpe, o produto não está disponível";
                    }
                ?>
            </section>
        </div>
    </div>
    

    <script>
        $(document).ready(function(){

            var showChar = 250;
            var points = "...";
            var maistext = "Mostrar Mais";
            var menostext = "Mostrar menos";

            $('.desc').each(function(){
                var content = $(this).html();

                if(content.length > showChar){

                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);

                    var html = `${c}<span class="points">${points}&nbsp;</span><span class="moredesc"><span>${h}</span>&nbsp;&nbsp;<a href="" class="morelink">${maistext}</a></span>`;

                    $(this).html(html);
                }
            })

            $(".morelink").click(function(){
                if($(this).hasClass("less")){                   
                    $(this).html(maistext);
                }else{
                    $(this).addClass("less");
                    $(this).html(menostext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            })
        })

    </script>
</body>
</html>