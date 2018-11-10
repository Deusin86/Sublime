<!DOCTYPE html>
<html>

<?php
    include '../ligacao/conn.php';
    require_once '../funcoes/funcoes.php'; //chama as funcoes

  $idx = $_GET['id'];
  $dados = mysqli_fetch_array(mysqli_query($conn,"SELECT id_produto, categoria, nome, preco_mercado, desconto, quantidade, descricao, img_frente, img_direita, img_esquerda, img_tras FROM produtos WHERE id_produto='$idx'"));
  if(!$dados)
    include '../ligacao/desconn.php';
   ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.min.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
  <!--  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">-->
    <style>
    body{
      font-family:
      'Montserrat',
       sans-serif;
    }
    </style>

</head>




    <body>
    <center><h3>Editar Produto</h3></center>
      <div class="row">
        <form class="col s12" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s6">
              <input name="nome" type="text" class="validate" value="<?php echo $dados['nome'] ?>">
              <label>Nome</label>
            </div>
            <div class="input-field col s6">
              <div class="form-group">
            <label for="exampleFormControlSelect1">Categoria</label>
            <select name="categoria" id="select" class="form-control">
                          <?php
                            if ($dados["categoria"] == "Tecnologia"){
                              echo '
                              <option value="Tecnologia">Tecnologia</option>
                              <option value="Eletrodomesticos">Eletrodomesticos</option>
                              <option value="Telemovel" >Telemovel</option>
                              <option value="I.T" >I.T</option>';
                            }
                            elseif ($dados["categoria"] == "Eletrodomesticos") {
                              echo '
                              <option value="Eletrodomesticos">Eletrodomesticos</option>
                              <option value="Tecnologia">Tecnologia</option>
                              <option value="Telemovel" >Telemovel</option>
                              <option value="Eletrodomesticos" >Eletrodomesticos</option>';
                            }
                            elseif ($dados["categoria"] == "Gaming") {
                              echo '
                              <option value="Gaming" >Gaming</option>
                              <option value="Tecnologia">Tecnologia</option>
                              <option value="Telemovel" >Telemovel</option>
                              <option value="Eletrodomesticos">Eletrodomesticos</option>';
                            }
                            elseif ($dados["categoria"] == "Telemovel") {
                              echo '
                              <option value="Telemovel" >Telemovel</option>
                              <option value="Tecnologia">Tecnologia</option>
                              <option value="Eletrodomesticos">Eletrodomesticos</option>
                              <option value="Gaming" >Gaming</option>';
                            }
                          ?>
                        </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="preco_mercado" type="number" class="validate" value="<?php echo $dados['preco_mercado'] ?>">
              <label>Preço Mercado</label>
            </div>
            <div class="input-field col s12">
              <input name="desconto" type="number" class="validate" value="<?php echo $dados['desconto']; ?>">
              <label>Desconto</label>
            </div>
            </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="quantidade" type="number" class="validate" value="<?php echo $dados['quantidade'] ?>">
              <label>Quantidade</label>
            </div>
            <div class="input-field col s6">
              <input name="descricao" type="text" class="validate" value="<?php echo $dados['descricao'] ?>">
              <label>Descrição</label>
            </div>
            </div>


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
              <img id="output" src="<?php echo '../'.$dados['img_frente'] ?>" style="width:120px; height:120px;"/>
            <input id="file" type="file" name="image_frente" accept="image/*" onchange="loadFile(event,1)">
            </div>

          <!-- //IMAGEM DIREITA -->
            <div class="form-group">
              <label  for="exampleInputPassword1">Imagem Direita</label>
            <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
              <img id="output_direita" src="<?php echo '../'.$dados['img_direita'] ?>" style="width:120px; height:120px;"/>
            <input id="file1" type="file" name="image_direita" accept="image/*" onchange="loadFile(event,2)">
            </div>


            <!-- //IMAGEM ESQUERDA -->
              <div class="form-group">
                <label  for="exampleInputPassword1">Imagem Esquerda</label>
              <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
                <img id="output_esquerda" src="<?php echo '../'.$dados['img_esquerda'] ?>" style="width:120px; height:120px;"/>
              <input id="file2" type="file" name="image_esquerda" accept="image/*" onchange="loadFile(event,3)">
              </div>


              <!-- //IMAGEM TRAS -->
                <div class="form-group">
                  <label  for="exampleInputPassword1">Imagem Tras</label>
                <!--  <input type="file" class="form-control" placeholder="Foto" name="foto" /><br /><br />-->
                  <img id="output_tras" src="<?php echo '../'.$dados['img_tras'] ?> "style="width:120px; height:120px;"/>
                <input id="file3" type="file" name="image_tras" accept="image/*" onchange="loadFile(event,4)">
                </div>

          <button class="btn waves-effect waves-light" type="submit" name="editar">Editar</button>

          <a class="btn btn-primary" href="consulta_produtos.php" role="button">Voltar</a>
        </form>
      </div>

      <?php
        include '../ligacao/conn.php';
    /*    $idx = $_GET['id'];
        $querys =mysqli_query($conn, "SELECT id_produto, categoria, nome, preco_mercado, desconto, quantidade, descricao, img_frente, img_direita, img_esquerda, img_tras FROM produtos WHERE id_produto='$idx'");
        $colunas = $querys->fetch_assoc();*/
        if (isset($_POST['editar'])) {


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



                  $as=mysqli_query($conn, "UPDATE produtos SET categoria = '$_POST[categoria]', nome = '$_POST[nome]', preco_mercado = '$_POST[preco_mercado]', desconto = '$_POST[desconto]', quantidade = '$_POST[quantidade]', descricao = '$_POST[descricao]', img_frente = '$img_path_frente', img_direita = '$img_path_direita', img_esquerda = '$img_path_esquerda', img_tras ='$img_path_tras' WHERE id_produto='$idx'");
        //  echo '<meta http-equiv="refresh" content"=0;url=consulta_produtos.php">';


          if($as==true){
            echo 'UPDATE SUCESSO';
          }
          include '../ligacao/desconn.php';

          }
      ?>


    </body>

</html>
