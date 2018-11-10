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
      <!-- enctype="multipart/form-data" serve para poder intrepertar diferentes dados em php  -->

      <form method="post" enctype="multipart/form-data">
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
      <div class="form-group">
        <label  for="exampleInputPassword1">Foto</label>
      <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
        <img id="output" src=""style="width:120px; height:120px;"/>
                      <script>
                        var loadFile = function(event) {
                          var reader = new FileReader();
                          reader.onload = function(){
                            var output = document.getElementById("output");
                            output.src = reader.result;
                          };
                          reader.readAsDataURL(event.target.files[0]);
                        };
                      </script>
      <input id="file" type="file" name="image" accept="image/*" onchange="loadFile(event)">
      </div>
      <button type="submit" name=enviar class="btn btn-primary">Adicionar !</button>

     </form>

  </body>

  <?php
  if(isset($_POST["enviar"])){
    include '../ligacao/conn.php';
    $img_path="images/unknown.png";
    if(isset($_FILES['image'])){
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      @$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      // joj.PNG -> .png

      $expensions= array("jpeg","jpg","png");

      echo $file_size;
      echo $file_name;
        if(in_array($file_ext,$expensions)== false){
          echo "Extension not allowed, please choose a JPEG or PNG file.";
        }
        if($_FILES['image']['size'] > 2097152 || $_FILES['image']['size'] == 0 ){
          echo 'ERROR : File size error, it must be excately 2 MB';
        }else{
          $generatedname = generateRandomString(100).'.'.$file_ext;
          $img_path="images/uploads/".$generatedname;
          move_uploaded_file($file_tmp,"../images/uploads/".$generatedname);
        }
      }

        mysqli_query($conn,"INSERT INTO produtos (categoria, nome, preco_mercado, desconto, quantidade, descricao, imagem) VALUES ('$_POST[categoria]','$_POST[nome]','$_POST[preco]','$_POST[desconto]','$_POST[quantidade]','$_POST[descricao]','$img_path')");
    //    echo '<meta http-equiv="refresh" content"=0;url=funcionarios.php">';

        include '../ligacao/desconn.php';
    }

   ?>

</html>
