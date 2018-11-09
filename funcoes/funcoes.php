<?php
//Construcao de funcao
function login($email,$password){
//echo 'funcao funciona';

if(empty($email) || empty($password)){
  echo '<center> <span class="erro"> Preencha os dados por favor ! </span> </center>';
}else{
  include 'ligacao/conn.php'; //ligacao a base de dados

  //Query aos logins existentes: //ATENÇÃO ALTERADO AQUI
  $q = mysqli_query($conn,"SELECT id_registo, email, password, tipo
  FROM registo where email = '$email' AND password = '$password'");

  $a = mysqli_fetch_array($q); //array com os valores da variavel $q

  //Se resposta negativa entao erro
  if(!$a){
    echo '<center> <span class="erro"> Erro: Dados Incorretos </span> </center>';
  }
  else{
  //  echo 'Olá' . $a["username"]; //tipo o '+' o ponto
  //Arranca sessão e cria variavei de sessao com o dados retonados da query
  session_start();
  $_SESSION["id_registo"] = $a["id_registo"];

  $_SESSION["tipo"] = $a["tipo"];

  $_SESSION["email"] = $a["email"];

  if($_SESSION["tipo"]=="1") {
    echo '<meta http-equiv="refresh" content="0;url=backoffice/paineladmin.php">';
  }else{

    //Encaminhar utilizador para painel utilizador
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
  }
}

include 'ligacao/desconn.php'; //desconectar (fechar)

}

}


 ?>
