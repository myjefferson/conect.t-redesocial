<!--Conectando o PHP no banco-->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CONEC.T - Cadastro Cliente</title>
        <link rel="stylesheet" href="style_cli/css_cli/cad_cli.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="style_cli/css_cli/bootstrap-datetimepicker.min.css" type="text/css">
    </head>
    <body>
        <div class="container-fluid"><h1><img class="float-md-right" src="style_cli/img_cli/logo.png" alt="CONECT.T"></h1></div>
        <div class="container">
            <div class="row">
                <div class="offset-md-8 col-md-4">
                    <?php            
                        include("../conexao_banco.php");
                        session_start();
                        if(isset($_POST['submit']))
                        {
                            $nome = trim($_POST['nome']);
                            $dataNasc = trim($_POST['dataNasc']);
                            $email = trim($_POST['email']);
                            $senha = trim($_POST['senha']);

                            if(!empty($nome) && !empty($dataNasc) && !empty($senha) && !empty($email))
                            {
                                if($_POST['senha'] == $_POST['senha-novamente'])
                                {              
                                    $nome = $_POST['nome'];
                                    $data = $_POST['dataNasc'];
                                    $email = $_POST['email'];
                                    $senha = md5($_POST['senha']); //criptografia de senha

                                    $insercao = "INSERT INTO cliente (type_user, nome, dataNascimento, email ,senha) VALUES ('cli', '$nome', '$data','$email','$senha')";
                                    
                                    if(mysqli_query($conexao, $insercao))
                                    {
                                        echo"Cadastrado com sucesso";
                                        header("Location: login_cli.php");
                                        exit();
                                    }
                                    else
                                    {
                                        echo"<p>Erro no cadastro</p>";
                                    }
                                }
                                else
                                {
                                    echo"<p>As senhas não estão iguais!</p>";
                                }             
                            }
                            else
                            {
                                echo"<p>Por favor, preencha todos os campos</p>";
                            }
                        }
                    ?>
                    <p id="title">Cadastro de Cliente</p>
                    
                    <?php {?>
                    <form name="cadastro" action="cadastro_cli.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nome e Sobrenome" name="nome" onfocus="input_click(this)" required="">
                            <input class="form-control" id="data" type="date" name="dataNasc" value="2023-01-10" onfocus="input_click(this)" required="">
                            <input class="form-control" type="email" placeholder="Email" name="email" onfocus="input_click(this)" required="">
                            <input class="form-control" type="password" placeholder="Nova Senha" name="senha" onfocus="input_click(this)" required="">  
                            <input class="form-control" type="password" placeholder="Digite sua senha novamente" name="senha-novamente" onfocus="input_click(this)" required="">
                            <script>
                                function input_click(colorText){
                                    colorText.style.backgroundColor=''
                                    colorText.style.color='#7D26CD'
                                }
                            </script>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Cadastrar</button>
                        <a href="login_cli.php"><p>Já tenho uma conta</p></a>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="style_cli/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="style_cli/js/bootstrap.min.js"></script>
</html>