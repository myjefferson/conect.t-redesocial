$(document).ready(function(){
    $(".like").click(function(){
        var id = this.id;
		
		//document.querySelector('#song').play(); //som ao clicar
			
        $.ajax({
            url: './like_unlike_query.php',
            type: 'POST',
            data: {id:id},
            dataType: 'json',

            success:function(data){
                var likes = data['likes'];
                var btn_likes = data['text'];

                if(likes == 0){
                    text = " ";
                    likes = " ";             
                }else if(likes == 1){
                    text = " Curtida";
                    likes = data['likes'];
                }else{
                    text = " Curtidas";
                    likes = data['likes'];
                    
                }

                $("#likes_"+id).text(likes+text);
                $("#"+id).html(btn_likes);
            }
        });
    });
});