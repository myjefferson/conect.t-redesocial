<?php 
//MODAL DE SUCESSO---------------------
function modalSucesso($text_title, $text_body, $text_btn, $action_btn){ ?>
    <div class="modal fade" id="tudocerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">       
        <div class="modal-dialog modal-dialog-centered" role="document">    
            <div class="modal-content">
                <span class="material-icons">check_circle</span>
                <img>
                <div class="modal-header">
                    <h5><?php echo strtoupper($text_title); ?></h5>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo$text_body; ?></p>
                </div>
                <!--Form perfil-->                              
                <div class="modal-footer">
                    <a href="<?php echo$action_btn; ?>" id="continuar" name="entrar_conta" class="btn btn-primary"><?php echo$text_btn; ?></a>
                </div>                            
            </div>                                              
        </div>
    </div> 

    <script>
        $("#tudocerto").ready(function(){
            $("#tudocerto").modal("show");
        }); 

        $(".modal").click(function(){
            $("#continuar").click();
        });
    </script>
<?php }

//MODAL DE ERRO--------------------
function modalErro($text_title, $text_body, $text_btn, $action_btn){ ?>
    <!--Modal de ERRO-->
        <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">       
            <div class="modal-dialog modal-dialog-centered" role="document">   
                <div class="modal-content">
                    <span class="material-icons">cancel</span>
                    <div class="modal-header">
                        <h5 id="title-error"><?php echo$text_title ?></h5>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="msm-error"><?php echo$text_body ?></p>
                    </div>
                    <!--Form perfil-->                              
                    <div class="modal-footer">
                        <p><a href="<?php echo$action_btn ?>" type="submit" id="tentar_novamente" class="btn btn-primary"><?php echo$text_btn ?></a></p>
                    </div>                           
                </div>                                              
            </div>
        </div>

        <!--Chama função modal-->
        <script>
            //Efeito modal alterar perfil
            $("#error").ready(function(){
                $("#error").modal("show");
            });

            $(".modal").click(function(){
                $("#tentar_novamente").click();
            });
        </script>
<?php } ?>

<!--CSS DOS MODAIS-->
<style>
/*Modal*/
/*Modal de ERRO*/
#error span{
    position: absolute;
    margin: -34px 0 0 42%;
    color: #FF241C;
    z-index: 100;
    font-size: 65px;
    background-color: white;
    border-radius: 100%;
    box-shadow: 0px 0px 25px #FF241C;
    animation: pulse_error 2s ease-in-out infinite;
}


@keyframes pulse_error{
 55%{
    box-shadow: 0px 0px 12px #FF241C; 
  }94%{
    box-shadow: 0px 0px 25px #FF241C;
  }
}

#error .modal-content{
    border-radius: 15px;
    border-top: 5px solid #FF241C;
    background-color: #8A0500;
}

#error h5{
    width: 100%;
    margin: 25px 0 0 0;
    text-align: center;
    color: white;
    font-weight: bold;
}

#error p{
  width: 100%;
  font-size: 17px;
  margin: -27px 0 0 0;
  text-align: center;
  color: white;
}

#error .modal-footer .btn-primary{
    box-shadow: 0px 5px 5px rgba(0,0,0,.2);
    background-color: #FF2D26;
    color: white;
    border-radius: 100px;
    font-size: 17px;
    padding: 9px 26px 9px 26px;
    width: max-content;
    margin: 15px 0 10px 0;
    border: none;
}

#error .modal-footer .btn-primary:hover{
    transition: 0.5s;
    color: #FF241C;
    background: white;
}

#error .modal-header{
    border: none;
}

#error .modal-footer{
    border: none;
}

/*Modal*/
/*Modal - confirmado*/
#tudocerto .modal-content{
  text-align: center;
}

#tudocerto .modal-content{
  border-radius: 15px;
}

#tudocerto .modal-content{
  align-items: center;
  border-top: 5px solid #01FAA9;
}

#tudocerto .modal-header{
  border: none;
}

#tudocerto .modal-header h5{
  width: 100%;
  margin: 35px 0 -30px 0;
  font-weight: bold;
}

#tudocerto .modal-footer{
  border: none;
  margin: -25px 0 -3px 0;
}

#tudocerto .modal-footer .btn-primary{
  box-shadow: 0px 2px 6px rgba(0,0,0,.2);
  border-radius: 100px;
  font-size: 17px;
  padding: 9px;
  width: 200px;
  background: #01FAA9;
  color: #232323;
  display: block;
  border: none;
  border-radius: 100px;
  transition:  0.4s;
}

#tudocerto .modal-footer .btn-primary:hover{
  transition:  0.3s;
  background-color: rgba(0,200,100,.9);
  color: #161A3B;
}

#tudocerto span{
  position: absolute;
  margin: -35px 0 0 0%;
  color: #01FAA9;
  z-index: 100;
  font-size: 65px;
  background-color: white;
  border-radius: 100%;
  box-shadow: 0px 0px 25px #01FAA9;
  animation: pulse_tudocerto 2s ease-in-out infinite;
}

@keyframes pulse_tudocerto{
 55%{
    box-shadow: 0px 0px 12px #01FAA9; 
  }94%{
    box-shadow: 0px 0px 25px #01FAA9;
  }
}
</style>