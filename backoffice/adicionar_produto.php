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
         <!-- <input type="text" class="form-control"  name="categoria" placeholder="Categoria"> -->
         <select class="form-control" id="exampleFormControlSelect1" name="categoria">
          <option>Tecnologia</option>
          <option>Eletrodomesticos</option>
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

      <!-- PARA PODER VER AS IMAGENS -->
      <script>
        var loadFile = function(event,x) {
          var reader = new FileReader();
          reader.onload = function(){
            if(x == 1){var y ="output";}
            if(x == 2){var y ="output_direita";}
            if(x == 3){var y ="output_esquerda";}
            if(x == 4){var y ="output_tras";}
            var output = document.getElementById(y);
            output.src = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
        };
      </script>


      <!-- //IMAGEM FRENTE -->
      <div class="form-group">
        <label  for="exampleInputPassword1">Imagem Frente</label>
      <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
        <img id="output" src=""style="width:120px; height:120px;"/>
      <input id="file" type="file" name="image_frente" accept="image/*" onchange="loadFile(event,1)">
      </div>

    <!-- //IMAGEM DIREITA -->
      <div class="form-group">
        <label  for="exampleInputPassword1">Imagem Direita</label>
      <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
        <img id="output_direita" src=""style="width:120px; height:120px;"/>
      <input id="file1" type="file" name="image_direita" accept="image/*" onchange="loadFile(event,2)">
      </div>


      <!-- //IMAGEM ESQUERDA -->
        <div class="form-group">
          <label  for="exampleInputPassword1">Imagem Esquerda</label>
        <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
          <img id="output_esquerda" src=""style="width:120px; height:120px;"/>
        <input id="file2" type="file" name="image_esquerda" accept="image/*" onchange="loadFile(event,3)">
        </div>



        <!-- //IMAGEM TRAS -->
          <div class="form-group">
            <label  for="exampleInputPassword1">Imagem Tras</label>
          <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
            <img id="output_tras" src=""style="width:120px; height:120px;"/>
          <input id="file3" type="file" name="image_tras" accept="image/*" onchange="loadFile(event,4)">
          </div>




        <button type="submit" name=enviar class="btn btn-primary">Adicionar !</button>
          <a class="btn btn-primary" href="paineladmin.php" role="button">Voltar</a>
     </form>

  </body>

  <?php
  if(isset($_POST["enviar"])){
    include '../ligacao/conn.php';

    //IMAGEM FRENTE
    $img_path_frente="images/unknown.png";
    if(isset($_FILES['image_frente'])){
      $file_name = $_FILES['image_frente']['name'];
      $file_size = $_FILES['image_frente']['size'];
      $file_tmp =$_FILES['image_frente']['tmp_name'];
      $file_type=$_FILES['image_frente']['type'];
      @$file_ext=strtolower(end(explode('.',$_FILES['image_frente']['name'])));
      // joj.PNG -> .png

      $expensions= array("jpeg","jpg","png");

      echo $file_size;
      echo $file_name;
        if(in_array($file_ext,$expensions)== false){
          echo "Extension not allowed, please choose a JPEG or PNG file.";
        }
        if($_FILES['image_frente']['size'] > 2097152 || $_FILES['image_frente']['size'] == 0 ){
          echo 'ERROR : File size error, it must be excately 2 MB';
        }else{
          $generatedname = generateRandomString(100).'.'.$file_ext;
          $img_path_frente="images/uploads/".$generatedname;
          move_uploaded_file($file_tmp,"../images/uploads/".$generatedname);
        }
      }


      //IMAGEM DIREITA
      $img_path_direita="images/unknown.png";
      if(isset($_FILES['image_direita'])){
        $file_name = $_FILES['image_direita']['name'];
        $file_size = $_FILES['image_direita']['size'];
        $file_tmp =$_FILES['image_direita']['tmp_name'];
        $file_type=$_FILES['image_direita']['type'];
        @$file_ext=strtolower(end(explode('.',$_FILES['image_direita']['name'])));
        // joj.PNG -> .png

        $expensions= array("jpeg","jpg","png");

        echo $file_size;
        echo $file_name;
          if(in_array($file_ext,$expensions)== false){
            echo "Extension not allowed, please choose a JPEG or PNG file.";
          }
          if($_FILES['image_direita']['size'] > 2097152 || $_FILES['image_direita']['size'] == 0 ){
            echo 'ERROR : File size error, it must be excately 2 MB';
          }else{
            $generatedname = generateRandomString(100).'.'.$file_ext;
            $img_path_direita="images/uploads/".$generatedname;
            move_uploaded_file($file_tmp,"../images/uploads/".$generatedname);
          }
        }


        //IMAGEM ESQUERDA
        $img_path_esquerda="images/unknown.png";
        if(isset($_FILES['image_esquerda'])){
          $file_name = $_FILES['image_esquerda']['name'];
          $file_size = $_FILES['image_esquerda']['size'];
          $file_tmp =$_FILES['image_esquerda']['tmp_name'];
          $file_type=$_FILES['image_esquerda']['type'];
          @$file_ext=strtolower(end(explode('.',$_FILES['image_esquerda']['name'])));
          // joj.PNG -> .png

          $expensions= array("jpeg","jpg","png");

          echo $file_size;
          echo $file_name;
            if(in_array($file_ext,$expensions)== false){
              echo "Extension not allowed, please choose a JPEG or PNG file.";
            }
            if($_FILES['image_esquerda']['size'] > 2097152 || $_FILES['image_esquerda']['size'] == 0 ){
              echo 'ERROR : File size error, it must be excately 2 MB';
            }else{
              $generatedname = generateRandomString(100).'.'.$file_ext;
              $img_path_esquerda="images/uploads/".$generatedname;
              move_uploaded_file($file_tmp,"../images/uploads/".$generatedname);
            }
          }


          //IMAGEM TRAS
          $img_path_tras="images/unknown.png";
          if(isset($_FILES['image_tras'])){
            $file_name = $_FILES['image_tras']['name'];
            $file_size = $_FILES['image_tras']['size'];
            $file_tmp =$_FILES['image_tras']['tmp_name'];
            $file_type=$_FILES['image_tras']['type'];
            @$file_ext=strtolower(end(explode('.',$_FILES['image_tras']['name'])));
            // joj.PNG -> .png

            $expensions= array("jpeg","jpg","png");

            echo $file_size;
            echo $file_name;
              if(in_array($file_ext,$expensions)== false){
                echo "Extension not allowed, please choose a JPEG or PNG file.";
              }
              if($_FILES['image_tras']['size'] > 2097152 || $_FILES['image_tras']['size'] == 0 ){
                echo 'ERROR : File size error, it must be excately 2 MB';
              }else{
                $generatedname = generateRandomString(100).'.'.$file_ext;
                $img_path_tras="images/uploads/".$generatedname;
                move_uploaded_file($file_tmp,"../images/uploads/".$generatedname);
              }
            }

              $dados = mysqli_fetch_array(mysqli_query($conn,"SELECT email FROM registo"));

            if($dados['email']==$_POST['email']){
              echo' <script type="text/javascript">

                      alert("Ja existe esse email!");

                  </script>';
                  echo '<meta http-equiv="refresh" content="0";>';
            }
            else{
                  mysqli_query($conn,"INSERT INTO produtos (categoria, nome, preco_mercado, desconto, quantidade, descricao, img_frente, img_direita, img_esquerda, img_tras) VALUES ('$_POST[categoria]','$_POST[nome]','$_POST[preco]','$_POST[desconto]','$_POST[quantidade]','$_POST[descricao]','$img_path_frente','$img_path_direita','$img_path_esquerda','$img_path_tras')");
    //    echo '<meta http-equiv="refresh" content"=0;url=funcionarios.php">';
                  echo' <script type="text/javascript">

                    alert("Ja existe esse email!");

                    </script>';
                    echo '<meta http-equiv="refresh" content="0";>';
            }




        include '../ligacao/desconn.php';
    }

   ?>

</html>
