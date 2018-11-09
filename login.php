<?php
//se usarmos o include o carrega o site á mesma, mesmo dando erro no php(funcao etc...)
 require_once 'funcoes/funcoes.php'; //chama as funcoes

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
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
  </head>
  <body>
      <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
         <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Email">
      </div>
      <div class="form-group">
        <label  for="exampleInputPassword1">Password</label>
         <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <button type="submit" name=entrar class="btn btn-primary">Submit</button>
      <a class="btn btn-primary" href="registo.php" role="button">Registo</a>


      <?php
      if(isset($_POST["entrar"])){ //se for pressionado vindo do post com o NOME entrar
        //echo 'XPTO';

        login($_POST["email"], $_POST["password"]); //login -> funcao(functions.php) //o output da função irá aparecer dentro do form
      }

       ?>

     </form>

  </body>
</html>
