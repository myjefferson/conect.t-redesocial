<meta name="viewport" content="width=cliice-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" type="imagem/png" href="../../icones/conec.t-icon-head-web.png">
<link rel="stylesheet" href="css/sysPassword.css" type="text/css">
<?php include("header.html"); ?>
<body>
    <div id="recuperar">
        <img src="../style_cli/img_cli/logo.png" id="logo"><label id="support">SUPPORT</label>
        <?php
            require '../../conexao_banco.php';
            require '../lib/modais_info.php';
            require '../../lib/PHPMailer/PHPMailerAutoload.php';
            
            //ATENÇÃO: CONFIGURE O php.ini PARA O FUNCIONAMENTO DO SMTP DA SEGUINTE FORMA:
            //SMTP= smtp.gmail.com
            //smtp_port= 587
            
            if(isset($_POST['btnEnviarEmail'])){ 
                if(isset($_POST['email_cli'])){         
                    $emailcli = $_POST['email_cli'];
                    $queryEmail = mysqli_query($conexao, "SELECT * FROM cliente WHERE email = '$emailcli'");
                    
                    if(mysqli_num_rows($queryEmail) > 0){
                        $user = mysqli_fetch_assoc($queryEmail); 
                        $senha_user = $user['senha'];
                        $id_cli = $user['id_cli'];
                        $type_user = $user['type_user'];

                        $mail = new PHPMailer();
                        //Será usado SMTP
                        $mail->isSMTP();
                        //$mail->SMTPDebug = 1; //Debug para mostrar erros
                        $mail->CharSet = "UTF-8";
                
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = 'tls';
                
                        $mail->Host = "smtp.gmail.com";  
                        //$mail->isHTML(true);
                        
                        $mail->Port = 587;
                
                        $mail->Username = 'conec.tspprt@gmail.com';
                        $mail->Password = 'conLJR20';
                
                        $mail->setFrom('conec.tspprt@gmail.com', 'CONEC.T SUPPORT');
                        
                        $mail->addReplyTo('no-reply@email.com.br');
                        //Conteudo a ser eviado
                        //Titulo
                        $mail->Subject = "Recuperação de conta CONEC.T - Cliente";            
                        
                        //Inserção de Rash Pass
                        $docKey = sha1(uniqid(mt_rand(), true)); //rash pass
                        $conexao->query("INSERT INTO cod_recpassword (codRandom, id_user, type_user) VALUES ('$docKey', '$id_cli', '$type_user')");
                        $captureCod =  $conexao->query("SELECT * FROM cod_recpassword WHERE codRandom = '$docKey' and id_user = '$id_cli' and type_user = '$type_user' ");
                        $cod = mysqli_fetch_assoc($captureCod);
                        $codigo = $cod['codRandom'];  
                        $id = $cod['id'];
                                     
                        //Corpo
                        //Enviar imagem
                        $mail->AddEmbeddedImage('../style_cli/img_cli/logo-connectsupport.png', 'logo');

                        //PEGA O IP DO SERVIDOR LOCAL
                        $iplocal = "localhost";
                        //Conteudo
                        $mail->Body = 
                        "<body style='margin: 0;font-family: -apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,&quot;Noto Sans&quot;,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;,&quot;Noto Color Emoji&quot;;font-size: 1rem;line-height: 1.5;color: #303030;text-align: left;background-color: #fff;'>
                            <p style='box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;text-align: center;'><img src='cid:logo' style='box-sizing: border-box;vertical-align: middle;border-style: none;page-break-inside: avoid;width: 280px;margin-top: -20px;padding: 0;'></p><link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' style='box-sizing: border-box;'>
                            <p id='title' style='box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;text-align: center;font-size: 17px;font-weight: bold;margin: 0;'>Olá Cliente!</p><p id='info' style='box-sizing: border-box;margin-top: 0;margin-bottom: 20px;orphans: 3;widows: 3;text-align: center;font-size: 17px;'>Recupere sua conta clicando no botão abaixo</p><p style='text-decoration: none;box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;text-align: center'><a style='font-weight: bold; font-size: 20px; color: #404040; text-decoration: none; padding: 10px; border-radius: 100px; background: #14CE91; margin-bottom: 30px;' href='{$iplocal}/CONEC.T-RedeSocial/cliente/sys_recuperarSenha/verify_user_cli.php?pass={$codigo}&id={$id}'>Recuperar Conta</a></p>
                        </body>";
                        
                        $mail->isHTML(true);
                        //Destinatário
                        $mail->addAddress($emailcli);
                
                        if($mail->Send()){ 
                                //Redireciona o usuario para o site do seu email
                                $type_email = $_POST['email_cli'];
                                if(preg_match("/@GMAIL/", strtoupper($type_email), $conta)){
                                    $name_email = "https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&osid=1&service=mail&ss=1&ltmpl=default&rm=false&flowName=GlifWebSignIn&flowEntry=ServiceLogin";
                                }else if(preg_match("/@HOTMAIL/", strtoupper($type_email), $conta)){
                                    $name_email = "https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1591755428&rver=7.0.6737.0&wp=MBI_SSL&wreply=https%3a%2f%2foutlook.live.com%2fowa%2f%3fnlp%3d1%26RpsCsrfState%3de4c7172d-d963-14c9-6886-90ab63842cb9&id=292841&aadredir=1&CBCXT=out&lw=1&fl=dob%2cflname%2cwld&cobrandid=90015";
                                }else if(preg_match("/@OUTLOOK/", strtoupper($type_email), $conta)){
                                    $name_email = "https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1591755428&rver=7.0.6737.0&wp=MBI_SSL&wreply=https%3a%2f%2foutlook.live.com%2fowa%2f%3fnlp%3d1%26RpsCsrfState%3de4c7172d-d963-14c9-6886-90ab63842cb9&id=292841&aadredir=1&CBCXT=out&lw=1&fl=dob%2cflname%2cwld&cobrandid=90015";
                                }else{
                                    $name_email = "../login_cli.php";
                                }
                                        
                                //Chamada do modal sucesso  
                                $text_title = "TUDO CERTO!";                                   
                                $text_body = "Agora, verifique o seu email e siga as instruções para recuperar a sua senha!";
                                $text_btn = "Entendido";
                                $action_btn = $name_email;
                                modalSucesso($text_title, $text_body, $text_btn, $action_btn);    

                        }else{
                            echo"Erro no envio do email".$mail->ErrorInfo;
                        }
                    }else{ 
                        //Chamada de erro
                        $text_title = "EMAIL NÃO ENCOTRADO!";                                   
                        $text_body = "O Email que você digitou, não é uma conta cliente <b>CONEC.T</b>. Se desejar, <a href='../cadastro_cli.php'>crie uma conta cliente</a>.";
                        $text_btn = "Tentar novamente";
                        $action_btn = "index_rec.php";
                        modalErro($text_title, $text_body, $text_btn, $action_btn); 
                    }
            
                }else{ 
                    //Chamada de erro
                    $text_title = "DIGITE SEU EMAIL!";                                   
                    $text_body = "É preciso preencher o campo <b>Email</b> para que possamos ajudar.";
                    $text_btn = "Tentar novamente";
                    $action_btn = "index_rec.php";
                    modalErro($text_title, $text_body, $text_btn, $action_btn);     
                } 
            } ?>
    </div>
</body>