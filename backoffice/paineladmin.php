<?php
 require_once '../funcoes/funcoes.php'; //chama as funcoes
 session_start();
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="../styles/styles.min.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
</head>

<body>
  <div>
      <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
          <div class="container"><a class="navbar-brand" href="paineladmin.php" style="height:101px;"><img class="logoadmin" src="../img/logo1.png" style="width:115px;padding:0px;"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="navbar-toggler-icon"></span></button>
              <div
                  class="collapse navbar-collapse" id="navcol-1" style="height:57px;width:721px;margin:16px;">
                  <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation" style="font-size:26px;"><a class="nav-link active" style="height:56px;margin:211px;">Painel Admistrador</a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link" href="#"></a></li>
                </ul> Bem-Vindo <?php echo $_SESSION["nome"];?> &nbsp <span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" <?php echo 'href="terminarsessao.php">Sair'; ?> </a></span></div>

  </div>
  </nav>
  </div>


    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(&quot;../img/mudancabom.png&quot;); background-size: cover;"></div>
                <div class="swiper-slide" style="background-image:url(&quot;../img/fixe.gif&quot;); background-size: cover;"></div>
                <div class="swiper-slide" style="background-image:url(&quot;../img/happy-woman-sunshine-Recovered.png&quot;); background-size: cover;"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <p class="text-center"></p>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                       <a href="adicionar_produto.php" class="fa fa-user-plus icon"></a>
                        <h3 class="name">Adicionar Produtos</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a href="adicionar_produto.php" class="learn-more">Adicionar »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><a href="consulta_produtos.php" class="fa fa-address-card-o icon"></a>
                        <h3 class="name">Consultar Produtos</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a href="consulta_produtos.php" class="learn-more">Consultar Produtos »</a></div>
                </div>
            </div>

            <div class="col-sm-6 col-md-5 col-lg-4 item">
              <div class="box"><a href="registos_lista.php" class="fa fa-money icon"></a>
                <h3 class="name">Lista registos</h3>
                <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p><a href="registos_lista.php" class="learn-more">Lista registos »</a></div>
              </div>


        </div>
    </div>
    <main></main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="js/script.min.js"></script>

</body>

</html>
