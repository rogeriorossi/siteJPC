﻿<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>.: Portal JPC 173 :.</title>
<meta name="Generator" content="Alleycode HTML Editor">
<meta name="Description" content="Portal do Grupo Escoteiro Jean Phillipe Cousteaus - 173 SP">
<meta name="Keywords" content="JPC 173 escoteiro escotismo">

<link rel="stylesheet" type="text/css" href="css/estilo.css">
<!--<link rel="stylesheet" type="text/css" href="btn.css">-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Roboto:300' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
//***********************
// Conexão com o banco de dados
  include("../config.php");
  $cone = @mysql_connect($host,$user,$passwd) or die (mysql_error()); 
  mysql_select_db($base,$cone) or die (mysql_error()); 
//***********************

// Recupera o login
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

//echo "O login é " .$login;
//echo "A senha é " .$senha;

// Usuário não forneceu a senha ou o login
if(!$login || !$senha)
{
//    echo "<th colspan='2'><font color='#FF0000'><b>Você deve digitar seu usuário e senha!</b></font></th>";
	echo'<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=login_erro1.htm">';
    exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o número de linhas retornadas seja 1 o login é válido,
* caso 0, inválido.
*/
$SQL = "SELECT id_usuario, no_usuario, ds_login, ds_senha, id_tp_usuario
        FROM tb_usuario
        WHERE ds_login = '" . $login . "'";
$result_id = @mysql_query($SQL) or die(mysql_error());
//$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);

//echo "total é " .$total;

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)
{
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
    $dados = @mysql_fetch_array($result_id);

    // Agora verifica a senha
    if(!strcmp($senha, $dados["ds_senha"]))
    {
//	 echo "<th colspan='2'><font color='#FF0000'><b>Usuario e Senha corretos.</b></font></th>";
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
        $_SESSION["id_usuario"]   = $dados["id_usuario"];
        $_SESSION["nome_usuario"] = stripslashes($dados["no_usuario"]);
		$_SESSION["id_tp_usuario"] = $dados["id_tp_usuario"];
		echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=inicio.php">';		
        exit;
    }
    // Senha inválida
    else
    {
//    echo "<th colspan='2'><font color='#FF0000'><b>Senha inválida. Favor preencher os dados novamente.</b></font></th>";
	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=login_erro2.htm">';
      exit;
    }
}
// Login inválido
else
{
//    echo "<th colspan='2'><font color='#FF0000'><b>Usuário não existe. Favor informar um usuário válido.</b></font></th>";
	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=login_erro3.htm">';
    exit;
}
?>
</body>
</html> 
 