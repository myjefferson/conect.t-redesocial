<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGCASH - criar demanda</title>
</head>
<body>
    <?php session_start(); include("functions_dev.php"); if(isset($_POST['pub_demanda'])){ insert_demanda(); } ?>

    <div class="conteudo" >
        <form method="POST" action="../desenvolvedor/criarDemanda_dev.php">
            Título<input type="text" name="titulo"><br>
            Assunto <input type="text" name="assunto">
            <p>Funcionalidades</p>
            <textarea placeholder="O programa deve ter:" name="functions"></textarea>
            <p>Tipo de Recompensa</p> 

            <select id="opcao" onchange="rec()" name="opc_rec">
                <option selected>Selecione uma opção</option>
                <option>A dinheiro</option>
                <option>A pontuação</option>
            </select>

            <br>

            <li data-toggle="opc" id="money" data-target="#money">
                Digite o valor para pagar: <input type="text" id="dinheiro" name="dinheiro">
            </li>    

            <li data-toggle="opc" id="point" data-target="#point">
                Digite o valor da pontuação <input type="text" id="point" name="pontos">
            </li>

            <br><input type="submit" value="Publicar demanda" name="pub_demanda">
        </form>
    </div>

    <script>
        document.getElementById('money').style.display = 'none'
        document.getElementById('point').style.display = 'none'
        function rec(){
            var select = document.getElementById('opcao')
            switch(select.options[select.selectedIndex].text){
                case 'Selecione uma opção':
                    document.getElementById('money').style.display = 'none'
                    document.getElementById('point').style.display = 'none'
                    break
                case 'A dinheiro':
                    document.getElementById('money').style.display = 'initial'
                    document.getElementById('point').style.display = 'none'
                    break
                case 'A pontuação':
                    document.getElementById('money').style.display = 'none'
                    document.getElementById('point').style.display = 'initial'
                    break
            }
        }
    </script>
</body>
</html>