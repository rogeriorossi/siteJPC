<?php
  include("../config.php"); 
  $conexao = @mysql_connect($host,$user,$passwd) or die ("Não foi possível estabelecer
 uma conexão com o banco de dados. Favor Contactar o Administrador.");
  mysql_select_db($base,$conexao) or die ("Não foi possível estabelecer
 uma conexão com a base de dados. Favor Contactar o Administrador.");
  
$nome  = $_POST['nome']; // Recebe a veriavel nome do metodo POST
$email = $_POST['email'];
$iduser = $_POST['id_user'];
$user = $_POST['user'];
$pass  = md5($_POST['senha']); // // Recebe a veriavel senha do metodo POST e encripta ela
$sql = mysql_query("INSERT INTO tb_usuario(NO_USUARIO, DS_EMAIL, ID_TP_USUARIO, DS_LOGIN, DS_SENHA, IN_TROCA) VALUES ('$nome','$email','$iduser','$user','$pass',0)")
 or die("ERRO no comando SQL : ".mysql_error()); //insere os dados na MySQL
echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=user_ok.php">'; // Exibe a mensagem Usuário cadastrado
?>