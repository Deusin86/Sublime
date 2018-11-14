<!DOCTYPE html>
<html>

<?php
    include '../ligacao/conn.php';
    require_once '../funcoes/funcoes.php'; //chama as funcoes

  $idx = $_GET['id'];
  $dados = mysqli_fetch_array(mysqli_query($conn,"SELECT id_registo, nome, apelido, empresa, pais, morada, codigo_postal, cidade, telefone, email, password, tipo, tipo_pagamento FROM registo WHERE id_registo='$idx'"));
  $as=mysqli_fetch_array(mysqli_query($conn, "SELECT nome From pais Where id_pais=$dados[pais]"));

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
        <form class="col s12" method="post">
          <div class="row">
            <div class="input-field col s6">
              <input name="nome" type="text" class="validate" value="<?php echo $dados['nome'] ?>">
              <label>Nome</label>
            </div>
            <div class="input-field col s12">
              <input name="apelido" type="text" class="validate" value="<?php echo $dados['apelido'] ?>">
              <label>Apelido</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="empresa" type="text" class="validate" value="<?php echo $dados['empresa'] ?>">
              <label>Empresa</label>
            </div>
            <div class="input-field col s12">
              <label for="exampleFormControlSelect1">Pais</label>
              <select class="form-control" id="exampleFormControlSelect1" name="pais" >
                <?php
                  include '../ligacao/conn.php';
                  $as=mysqli_fetch_array(mysqli_query($conn, "SELECT nome From pais Where id_pais=$dados[pais]"));
                  $all=mysqli_query($conn, "SELECT id_pais, nome From pais");
                  while($row=mysqli_fetch_assoc($all)){
                    echo '<option value="'.$row["id_pais"].'" selected>'.$row["nome"].'</option>';
              /*  echo '<option value="'.$row['id_pais'].'"'; if($dados['pais']==$all['id_pais']){  echo' selected';} echo '>'.$row["nome"].'</option>';*/
                  }
                  include '../ligacao/desconn.php';
                ?>
              </select>
            </div>
            </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="morada" type="text" class="validate" value="<?php echo $dados['morada'] ?>">
              <label>Morada</label>
            </div>
            <div class="input-field col s6">
              <input name="codigo_postal" type="text" class="validate" value="<?php echo $dados['codigo_postal'] ?>">
              <label>Codigo Postal</label>
            </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input name="cidade" type="text" class="validate" value="<?php echo $dados['cidade'] ?>">
                <label>Cidade</label>
              </div>
              <div class="input-field col s6">
                <input name="telefone" type="text" class="validate" value="<?php echo $dados['telefone'] ?>">
                <label>Telefone</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input name="email" type="text" class="validate" value="<?php echo $dados['email'] ?>">
                <label>Email</label>
              </div>
              <div class="input-field col s6">
                <input name="password" type="text" class="validate" value="<?php echo $dados['password'] ?>">
                <label>Password</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input name="tipo_pagamento" type="text" class="validate" value="<?php echo $dados['tipo_pagamento'] ?>">
                <label>Tipo Pagamneto</label>
              </div>
            </div>

          <button class="btn waves-effect waves-light" type="submit" name="editar">Editar</button>

          <a class="btn btn-primary" href="registos_lista.php" role="button">Voltar</a>
        </form>
      </div>

      <?php
        include '../ligacao/conn.php';
    /*  $idx = $_GET['id'];
        $querys =mysqli_query($conn, "SELECT id_produto, categoria, nome, preco_mercado, desconto, quantidade, descricao, img_frente, img_direita, img_esquerda, img_tras FROM produtos WHERE id_produto='$idx'");
        $colunas = $querys->fetch_assoc();*/

        if (isset($_POST['editar'])) {



          if($dados['email']==$_POST['email']){
            echo' <script type="text/javascript">

                    alert("Ja existe!");

                  </script>';
            echo '<meta http-equiv="refresh" content="0";>';
          }
          else{

                mysqli_query($conn, "UPDATE registo SET nome = '$_POST[nome]', apelido = '$_POST[apelido]', empresa = '$_POST[empresa]', pais = '$_POST[pais]', morada = '$_POST[morada]',
                  codigo_postal = '$_POST[codigo_postal]', cidade = '$_POST[cidade]', telefone = '$_POST[telefone]', email = '$_POST[email]', password ='$_POST[password]',
                  tipo_pagamento='$_POST[tipo_pagamento]' WHERE id_registo='$idx'");

                  echo' <script type="text/javascript">

                      alert("Sucesso!");

                    </script>';
                echo '<meta http-equiv="refresh" content="0";>';
          }
          

        //  echo '<meta http-equiv="refresh" content"=0;url=consulta_produtos.php">';

          include '../ligacao/desconn.php';

          }
      ?>


    </body>

</html>
