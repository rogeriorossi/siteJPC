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
<body>
<div id="tudo">
	<nav>
	  <div id="menu">
		      <ul>
			  <?php
			      echo "<li><a href='consulta.php'>Consultar</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro.php'>Inserir</a></li>" : "<li><a href='cadastro.php'>Inserir</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='altera.php'>Alterar</a></li>" : "<li><a href='altera.php'>Alterar</a></li>";
				  echo "<li><a href='relatorio.php'>Relat&oacute;rio</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='correio.php'>Correio</a></li>" : "<li><a href='correio.php'>Correio</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro_user.php'>Usu&aacute;rio</a></li>" : "<li><a class='ativo' href='cadastro_user.php'>Usu&aacute;rio</a></li>";
				  echo "<li><a class='sair' href='sair.php'>Sair</a></li>";
			  ?>
			  </ul>
			  <div class="clear"></div> 
	  </div>
	</nav>

	<div align="center" class="container">
   <h2>Cadastro de Usu&aacute;rios</h2>
 <form id="loginform" class="rounded" name="cadastro" method="post" action="cripto.php">
   <div align="center" class="fieldlogin">
       <label for="nome">Nome:</label>
       <input class="input" name="nome" type="text" id="nome" />
   </div>
   <div align="center" class="fieldlogin">
       <label for="email">Email:</label>
       <input class="input" name="email" type="text" id="email" />
   </div>
   <div align="center" class="fieldlogin">
       <label for="tpuser">Tipo Usu&aacute;rio:</label>
	   <select class="input" name="id_user" id="id_user" size="1">
         <option value="">-- escolha --</option>
         <option value="1">Administrador</option>
		 <option value="2">Usuario</option>
       </select>
   </div>
   <div align="center" class="fieldlogin">
       <label for="user">Usu&aacute;rio:</label>
       <input class="input" name="user" type="text" id="user" />
   </div>
   <div align="center" class="fieldlogin">
       <label for="senha">Senha:</label>
       <input class="input" name="senha" type="text" id="senha" />
   </div>
       <input class="button" type="submit" name="Submit" value="Cadastrar" />
 </form>
 </div>
 <p>&nbsp;</p>
 </body>
 </html>