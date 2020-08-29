$(document).ready(function(){  
    $('#btn_enviar_msm').click(function(e){

        e.preventDefault();

        var mensagem = $('#mensagem').val();

        var type_cli_enviou = $('#type_cli_enviou').val();
        var id_cli_enviou = $('#id_cli_enviou').val();

        var type_user_recebeu = $('#type_user_recebeu').val();
        var id_user_recebeu = $('#id_user_recebeu').val();
        
        var dataString = 'mensagem=' + mensagem + '&type_cli_enviou=' + type_cli_enviou + '&id_cli_enviou=' + id_cli_enviou + '&type_user_recebeu=' + type_user_recebeu + '&id_user_recebeu=' + id_user_recebeu
        //post para o php
        $.ajax({
            type: 'POST',
            url: 'sys_mensagem/enviar_chat.php',
            data: dataString,
            dataType: 'json',

            success: function(){
                //alert("Enviado com sucesso");
            }
        });
        return false;
    });
});

//CARREGAMENTO AO VIVO DO CHAT
$(document).ready(function(){                          
    comeca();
});

var timerI = null;
var timerR = false;

function para(){
    if(timerR){
        clearTimeout(timerI);
        timerR = false;
    }
}

function comeca(){
    para();
    list();
}


function list(){
    //var type_dev_enviou = $('#type_dev_enviou').val();
    var id_cli_enviou = $('input[name="id_cli_enviou"]').val();

    var type_user_recebeu = $('input[name="type_user_recebeu"]').val();
    var id_user_recebeu = $('input[name="id_user_recebeu"]').val();

    var dataString = 'user=' +id_user_recebeu+ '&type_user=' +type_user_recebeu+ '&id_cli_enviou='+id_cli_enviou;


    $.ajax({  
        type: 'GET',
        url: 'sys_mensagem/list_msm_chat.php',
        data: dataString,

        success: function(data){
            $(".list-mensagens").html(data);
            attScroll();
            console.clear();
        } 
    })    
    TimerI = setTimeout("list()", 2000); // Tempo para atualizar tela
    TimerR = true;
}

var refresh = 0;

function attScroll(){
    console.log(refresh);
    if(refresh == 0){
        $('.list-mensagens').scrollTop($('.list-mensagens')[0].scrollHeight);
        refresh++;
    }
}
    //});






    
        
        













/*function mostrar(){
    var url;
    url = "mostrar.php";
    jQuery.get(url, function(data){
        $('#mensagens').empty().append(data);
    });
}
function enviar(){
    var url, mensagem, enviando;
    url = 'enviar.php';
    mensagem = $('#mensagem').val();
    $('#mensagem').on('keyup', function(e){
        if(e.witch == 13){
            var m = $(this).val();
            m = mensagem.trim();
            if(m.length >=1){
                $(this).val('');
                enviando = $.post(url,{mensagem: mensagem});
                enviando.done(function(){
                    mensagem = '';
                    mostrar();
                })
            }
        }
    })
}*/