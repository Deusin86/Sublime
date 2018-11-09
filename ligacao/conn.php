<?php

$user="root";
$servername= "localhost";

//Establece ligacao a BD
$conn = mysqli_connect($servername,$user);
//Caso haja erro reportar
if(!$conn){
  die("Erro Ligacao:" .mysqli_connect_error());
}
mysqli_select_db($conn,"loja"); //escolhe a base de dados
mysqli_set_charset($conn, 'utf8');

?>
