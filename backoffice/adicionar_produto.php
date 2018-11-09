<?php
//se usarmos o include o carrega o site á mesma, mesmo dando erro no php(funcao etc...)
include '../ligacao/conn.php';
 require_once '../funcoes/funcoes.php'; //chama as funcoes

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
  </head>
  <body>

      <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Categoria</label>
         <input type="text" class="form-control"  name="categoria" placeholder="Categoria">
      </div>
      <div class="form-group">
        <label  for="exampleInputPassword1">Nome</label>
         <input type="text" class="form-control" name="nome" placeholder="Nome">
      </div>
      <div class="form-group">
        <label  for="exampleInputPassword1">Preço</label>
         <input type="number" class="form-control" name="preco" placeholder="€">
      </div>
      <div class="form-group">
        <label  for="exampleInputPassword1">Desconto</label>
         <input type="number" class="form-control" name="desconto" placeholder="%">
      </div>
      <div class="form-group">
        <label  for="exampleInputPassword1">Quantidade</label>
         <input type="number" class="form-control" name="quantidade" placeholder="0">
      </div>
      <div class="form-group">
        <label  for="exampleInputPassword1">Descricao</label>
         <input type="text" class="form-control" name="descricao" placeholder="Descricao">
      </div>

      <button type="submit" name=enviar class="btn btn-primary">Adicionar !</button>


     </form>

  </body>

  <?php
  if(isset($_POST["enviar"])){
    include '../ligacao/conn.php';

        mysqli_query($conn,"INSERT INTO produtos (categoria, nome, preco_mercado, desconto, quantidade, descricao) VALUES ('$_POST[categoria]','$_POST[nome]','$_POST[preco]','$_POST[desconto]','$_POST[quantidade]','$_POST[descricao]')");
        echo '<meta http-equiv="refresh" content"=0;url=funcionarios.php">';

        include '../ligacao/desconn.php';
    }

   ?>

</html>
