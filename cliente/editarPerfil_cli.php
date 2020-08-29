<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_cli/css_cli/editarPerfil_cli.css">
    </head>
    <body>
        <?php include("header_cli.php");?>
        <div>
            <?php
                session_start(); 
                include("functions_cli.php");

                if(isset($_POST['alterar'])){
                    altera_perfil();
                }
            ?>
        
            <form method="POST" action="editarPerfil_cli.php">
                Digite sua descrição:<br> <textarea type="text" name="descricao" id="descricao" placeholder="Quem sou eu..."></textarea><br>
                Mudar nome:<br> <input type="text" name="nome" id="nome"><br>
                Alterar foto:<br> <input type="file" name="foto" id="foto"><br>
                Digite sua senha atual:<br> <input type="text" name="senha" id="senha"><br>
                <hr>
                Digite sua nova senha:<br> <input type="text" name="senha_nova" id="senha_nova"><br>
                Digite a nova senha novamente:<br> <input type="text" name="senha_nova_n" id="senha_nova_n"><br>
                <button type="submit" name="alterar">Salvar Alterações</button>
            </form>
        </div>
    </body>
</html>