﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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

$SQL = "SELECT a.DS_NOME, a.DT_NASCIMENTO, a.DS_EMAIL, b.nu_registro_ueb, d.ds_tp_sanguineo
        FROM tb_inf_pessoal a
		INNER JOIN tb_inf_escoteira b on a.id_jpc = b.id_jpc 
		INNER JOIN tb_ficha_medica c on a.id_jpc = c.id_jpc
		inner join tb_tp_sanguineo d on c.id_tp_sanguineo = d.id_tp_sanguineo
		where in_ativo = 1
		order by a.ds_nome";
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);
if($total)
{
    // Abre tabela HTML
    echo "<table border=1 cellpadding=3 cellspacing=0>\n";
    echo "<tr><th>Nome</th><th>Data nascimento</th><th>E-mail</th><th>Registro UEB</th><th>Tipo Sanguineo</th></tr>\n";

    // Efetua o loop no banco de dados
    while($dados = mysql_fetch_array($result_id))
    {
		echo "<td>" . $dados["DS_NOME"] . "</td>";
		echo "<td>" . $dados["DT_NASCIMENTO"] . "</td>";
		echo "<td>" . $dados["DS_EMAIL"] . "</td></tr>";
		echo "<td>" . $dados["nu_registro_ueb"] . "</td></tr>";
		echo "<td>" . $dados["ds_tp_sanguineo"] . "</td></tr>";
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
</html> 
 