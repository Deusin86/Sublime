<?php
include '../ligacao/conn.php';
require_once '../funcoes/funcoes.php'; //chama as funcoes

if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $query = "SELECT id_produto, categoria, nome, preco_mercado, desconto, quantidade, descricao FROM produtos WHERE nome LIKE '%$searchq%'";
  $search_result = tabelafil($query);

}

else {
  $query = "SELECT * FROM produtos";
  $search_result = tabelafil($query);
}

function tabelafil($query)
{
  include '../ligacao/conn.php';
  $resultados_fil = mysqli_query($conn,$query);
  return $resultados_fil;

}

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="../css/styles.min.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
</head>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #64B5F6;">
  <a class="navbar-brand" href="paineladmin.php"><img class="logoadmin" src="../img/logo1.png" style="width:105px;height:110px;padding:0px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="editing.php" style="font-size:20px">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="consulta_produtos.php" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Procurar Nome" aria-label="Search" name="search" >
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Filter">Procurar</button>
    </form>
  </div>
</nav>

  <body>


    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categoria</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Desconto</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Descrição</th>

    </tr>
  </thead>
  <tbody>
    <?php   while ($emenu = mysqli_fetch_array($search_result)) {
        echo
        '<tr>
          <th scope="row">'.$emenu['id_produto'].'</th>
          <td>'.$emenu["categoria"].'</td>
          <td>'.$emenu["nome"].'</td>
          <td>'.$emenu["preco_mercado"].'</td>
          <td>'.$emenu["desconto"].'</td>
          <td>'.$emenu["quantidade"].'</td>
          <td>'.$emenu["descricao"].'</td>

          <td><a href="editarfuncionarios.php?id='.$emenu['id_produto'].'"> Editar</button> </a> </td>
          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$emenu["id_produto"].'">Apagar</button></td>
        </tr>';
        echo'
          <form method="post">
           <div class="modal fade" id="exampleModal'.$emenu["id_produto"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Têm a certeza que pertende eliminar o seguinte funcionario ?
              </div>
              <div class="modal-footer">

              <input type="hidden" name="idd" value="'.$emenu["id_produto"].'">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="sim" class="btn btn-danger">Eliminar</button>

              </div>
            </div>
          </div>
          </div>
          </form>';


      }?>

  </tbody>
  <?php

    if (isset($_POST['sim'])) {
      include '../ligacao/conn.php';
      $idd = $_POST['idd'];
          mysqli_query($conn,"DELETE FROM produtos where id_produto=$idd");
        //  echo '<meta http-equiv="refresh" content"=0;url=backoffice/consulta_produtos.php">';
          echo'<meta http-equiv="refresh" content="0">';
          include '../ligacao/desconn.php';
    }
   ?>


</table>

</form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



  </body>
</html>
