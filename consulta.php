<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php // Verificador de sessão
require "verifica.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>.: Portal JPC 173 :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
			      echo "<li><a  class='ativo' href='consulta.php'>Consultar</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro.php'>Inserir</a></li>" : "<li><a href='cadastro.php'>Inserir</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='altera.php'>Alterar</a></li>" : "<li><a href='altera.php'>Alterar</a></li>";
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

   <h2 class="titulo">Consulta</h2>

<div id="nav">
	
	<p> Voce pode executar a consulta por parte do nome ou pela seção cadastrada.</p>
<!--	
	<ul>
    <li><a href="link1.htm">Informa&ccedil;&otilde;es Pessoais</a></li>
    <li><a href="link2.htm">Informa&ccedil;&otilde;es Escoteiras</a></li>
    <li><a href="link3.htm">Informa&ccedil;&otilde;es do Respons&aacute;vel</a></li>
	</ul>
-->	
</div>

 <form id="contactform" name="con_nome" method="post" action="con_search.php">
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

 <form id="contactform" name="con_secao" method="post" action="con_secao.php">
    <table align="center" border="0">	 
       <tr><div class="field">
		<td size="70"><label for="nome">Seção:</label></td>
    	<td colspan="2"><select class="input" name="id_secao" id="id_secao" size="1">
    		<option value="">-- escolha --</option>
    <?php
//***********************
//CONSULTA NO BANCO DE DADOS
    $SQL = "SELECT ID_SECAO, DS_SECAO FROM tb_secao";
//***********************
    $result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
    $total = @mysql_num_rows($result_id);
    if($total)
    {		
       // Efetua o loop no banco de dados
       while($dados = mysql_fetch_array($result_id))
       {			echo "<option value='" . $dados["ID_SECAO"] . "'>" . $dados["DS_SECAO"] . "</option>";
       }
    }
    ?>
			</select></td>
		<td>&nbsp;</td>
		<td><input type="checkbox" name="ativo" checked >Ativo</td>
		<td>&nbsp;</td>
		<td><input type="checkbox" name="inativo">Inativo</td>
		<td>&nbsp;</td>
		<td><input class="button" type="submit" name="sub_secao" value="Pesquisar" /></td>
	   </div></tr>
	</table>

 </form>

 </div>
 </div>
 </body>
 </html>