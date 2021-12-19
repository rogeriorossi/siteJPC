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
// Conexão com o banco de dados
  include("../config.php"); 
  $conexao = @mysql_connect($host,$user,$passwd) or die (mysql_error()); 
  mysql_select_db($base,$conexao) or die (mysql_error()); 

$SQL = "SELECT * FROM tb_usuario a INNER JOIN tb_tp_usuario b on a.id_tp_usuario = b.id_tp_usuario order by a.NO_USUARIO";
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);
if($total)
{
    // Abre tabela HTML
    echo "<table border=1 cellpadding=3 cellspacing=0>\n";
    echo "<tr><th>Nome</th><th>Tipo de Usuario</th><th>Usuario</th></tr>\n";

    // Efetua o loop no banco de dados
    while($dados = mysql_fetch_array($result_id))
    {
		echo "<td>" . $dados["NO_USUARIO"] . "</td>";
		echo "<td>" . $dados["DS_TP_USUARIO"] . "</td>";
		echo "<td>" . $dados["DS_LOGIN"] . "</td></tr>";
    }
    // Fecha tabela
    echo "</table>\n";
}
else
{
    echo "<B>Nenhum usuario cadastrado!</B>\n";
}
?>
</body>
</html>
