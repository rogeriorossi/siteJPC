<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php // Verificador de sessão
require "verifica.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>.: Portal JPC 173 :.</title>
<meta name="Generator" content="Alleycode HTML Editor">
<meta name="Description" content="Portal do Grupo Escoteiro Jean Phillipe Cousteaus - 173 SP">
<meta name="Keywords" content="JPC 173 escoteiro escotismo">

<link rel="stylesheet" type="text/css" href="css/jpc.css">
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Roboto:300' rel='stylesheet' type='text/css'>

</head>

<BODY>
<?php
//***********************
// Conexão com o banco de dados
  include("../config.php");
  $cone = @mysql_connect($host,$user,$passwd);
  mysql_select_db($base,$cone);
//***********************
?>
<div id="tudo">
	<nav>
	  <div id="menu">
		      <ul>
			  <?php
			      echo "<li><a href='consulta.php'>Consultar</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro.php'>Inserir</a></li>" : "<li><a href='cadastro.php'>Inserir</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='altera.php'>Alterar</a></li>" : "<li><a class='ativo' href='altera.php'>Alterar</a></li>";
				  echo "<li><a href='relatorio.php'>Relat&oacute;rio</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='correio.php'>Correio</a></li>" : "<li><a href='correio.php'>Correio</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro_user.php'>Usu&aacute;rio</a></li>" : "<li><a href='cadastro_user.php'>Usu&aacute;rio</a></li>";
				  echo "<li><a class='sair' href='sair.php'>Sair</a></li>";
			  ?>
			  </ul>
			  <div class="clear"></div> 
	  </div>
	</nav>

<div align="center">

   <h2 class="titulo">Altera&ccedil;&atilde;o</h2>


<div id="nav">
	
	<p> Voce pode executar a consulta por parte do nome.</p>

</div>

 <form id="contactform" name="con_nome" method="post" action="alt_search.php">
    <table align="center" border="0">	 
       <tr><div class="field">
		<td size="70"><label for="nome">Nome:</label></td>
	    <td colspan="2"><input class="input" name="nome" type="text" id="nome" size="50" /></td>
		<td>&nbsp;</td>
		<td><input type="checkbox" name="no_ativo" checked >Ativo</td>
		<td>&nbsp;</td>
		<td><input type="checkbox" name="no_inativo">Inativo</td>
		<td>&nbsp;</td>
		<td><input class="button" type="submit" name="Submit" value="Pesquisar" /></td>
	   </div></tr>
	</table>

 </form>
 
  </div>
 </div>
 </body>
 </html>