<!DOCTYPE html>
<html>
  <head>
    <title>CONEC.TSTORE - Loja</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--IMPORTANDO DADOS CSS E JAVASCRIPT-->

    <link rel="icon" href="">

    <link rel="stylesheet" href="css_cli/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css_cli/app.css" />

    <link rel="stylesheet" type="text/css" href="css_cli/color_pickers.css" />

    <link rel="stylesheet" href="css_cli/owl.carousel.min.css"> <!--FUNÇÃO CSS DO CARROSEL-->

    <link rel="stylesheet" href="css_cli/owl.theme.default.min.css">

    <script src="js_cli/jquery-3.3.1.slim.min.js"></script>

    <script src="js_cli/owl.carousel.min.js"></script><!--FUNÇÃO JAVASCRIPT DO CARROSEL-->

    <script type="application/ld+json"></script>

    <style type="text/css">
        body {
            font-family: 'Open Sans' !important;
        }
        
        .page-header,
        h2 {
            font-family: 'Open Sans' !important;
        }
        
        .navbar-brand,
        .text-logo {
            font-family: 'Open Sans' !important;
        }
        
        p,
        .caption h4,
        label,
        table,
        .panel,
        #contactpage > h2.success,
        #contactpage h2.error {
            font-size: 14px !important;
        }
        
        h2 {
            font-size: 30px !important;
        }
        
        .navbar-brand,
        .text-logo {
            font-size: 18px !important;
        }
        
        .navbar-left a {
            font-size: 14px !important;
        }
    </style>
  </head>

  <body>
      <div class="fixed-top">
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-none d-lg-block">
              <div class="container">
                  <div class="collapse navbar-collapse" id="navbarsContainer-2">
                      <div class="collapse navbar-collapse justify-content-end" id="navbarContainer">
                          <form id="procurarProd" class="navbar-form float-right form-inline d-none d-lg-flex" method="POST" action="">
                              <input type="text" name="procurarProd" class="form-control form-control-sm" placeholder="Procurar Produtos" />
                              <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-search"></i></button>
                          </form>
                          <ul class="social list-inline d-lg-none text-center"></ul>
                      </div>
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a href="http://localhost/BOREALCODE/cliente/home_cli.php" class="level-1 trsn nav-link">Inicio</a><!--Chamando o inicio(INDEX)-->
                          </li>
                          <li class="nav-item">
                              <a href="http://localhost/BOREALCODE/cliente/loja_cli.php" class="level-1 trsn nav-link">Loja</a>
                          </li>
                      </ul>
                      <ul class="social navbar-toggler-right list-inline"></ul>
                  </div>
              </div>
          </nav>
      </div>

      <div id="carousel-home"><!--Carrosel principal-->
          <div class="home_slider owl-carousel"> <!--OWL-CAROUSEL, Função chamada a cima-->
              <div class="item" style="background-image:url('fotos_cli/aurora-boreal.jpg');">
                  <a href="">
                      <div class="layer"></div>
                      <div class="carousel-info">
                          <div class="carousel-info-inner">
                              <h2>Bem vindo a CodeStore</h2><!--Foto do carrosel da pagina-->
                          </div>
                      </div>
                  </a>
              </div>
              <div class="item" style="background-image:url('fotos_cli/crud2.jpg')">
                  <a href="">
                      <div class="layer"></div>
                      <div class="carousel-info">
                          <div class="carousel-info-inner"><!--Segunda foto do carrosel da página-->
                              <h2>Melhores app</h2>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
      </div>

      <script> 
          $('#carousel-home .item').addClass('item-background'); //Funções do carrosel da página

          $('.home_slider').owlCarousel({
              items: 1,

              loop: true,
              dots: false,
              margin: 0,
              nav: true, 
              autoplay: true,
              autoplayTimeout: 3000, //Tempo
              autoplayHoverPause: true,
              navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"]
          })
      </script>

      <div class="container" style=""> <!--Container Principal da Página-->
          <div class="row" style="">

            <!--Fazer um for para percorrer todas as ultimas publicações dos PROGRAMAS POPULARES-->
              <div class="col-12">
                  <h2 class="page-header" style="">Programas populares</h2>
              </div>

              <div class="col-md-3 col-6 product-block"> 
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">Jogo</a></h3>
                      <div class="price-mob">
                          $100
                      </div>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          Um jogo top e massa
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">App </a></h3>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          Para o seu trabalho
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">jogo</a></h3>
                      <div class="price-mob">
                          $1.200
                      </div>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          Um jogo topzera
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <!--Fazer um for para percorrer todas as ultimas publicações dos MELHORES DESENVOLVIMENTOS GRATUITOS-->
              <div class="col-12">
                  <h2 class="page-header" style="">Melhores desenvolvimentos gratuitos</h2>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <!--Fazer um for para percorrer todas as ultimas publicações dos MELHORES DESENVOLVIMENTOS PAGOS-->
              <div class="col-12">
                  <h2 class="page-header" style="">Melhores desenvolvimentos pagos</h2>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="price-mob">
                          $20
                      </div>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="price-mob">
                          $20
                      </div>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="price-mob">
                          $20
                      </div>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

              <div class="col-md-3 col-6 product-block">
                  <a href=""><img class="img-fluid img-portfolio img-hover mb-3" src="fotos_cli/crud1.png" /></a>
                  <div class="caption">
                      <h3><a href="">slaa</a></h3>
                      <div class="price-mob">
                          $20
                      </div>
                      <div class="clearfix"></div>
                      <p class="product-block-description d-none d-md-block">
                          nao sei
                      </p>
                  </div>
              </div>

          </div>
      </div>
      <hr>
      <link rel="stylesheet" href="css_cli/all.css">
      <script src="js_cli/popper.min.js"></script><!--IMPORTANDO dados SCRIPT no final para carregamento junto com a página-->
      <script src="js_cli/bootstrap.min.js"></script>
      <script>
          $(function() {
              $('[data-toggle="tooltip"]').tooltip() //Outra função do carrosel
              $('.carousel').carousel() //Nome da DIV la em cima
          })
      </script>
      <script type="text/javascript" src="js_cli/bootstrap-filestyle.min.js"></script>
      <script type="text/javascript" src="js_cli/main.js"></script>
  </body>
</html>