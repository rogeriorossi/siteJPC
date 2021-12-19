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
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro_user.php'>Usu&aacute;rio</a></li>" : "<li><a href='cadastro_user.php'>Usu&aacute;rio</a></li>";
				  echo "<li><a class='sair' href='sair.php'>Sair</a></li>";
			  ?>
			  </ul>
			  <div class="clear"></div> 
	  </div>
	</nav>

    <?php
      // Imprime mensagem de boas vindas
      echo "<h3>Bem-Vindo " . $_SESSION["nome_usuario"] . "!</h3>\n";
	  //echo "<h3>O tipo de usuário é " . $_SESSION["id_tp_usuario"] . "!</h3>\n";
    ?>
	<p> Aqui voce pode gerenciar/consultar dados do cadastro do JPC.</p>
	<p> Abaixo voce encontra uma explicação rápida sobre os menus que voce vê acima.</p>
	<ul>
	<li>Consultar - Aqui voce consulta os dados dos jovens e escotistas que se encontram no cadastro do JPC</li>
	<li>Inserir - Menu destinado ao cadastro de novos membros do JPC. Somente usuários administrativos podem acessar este menu</li>
	<li>Alterar - Alterações no cadastro devem ser realizadas neste menu somente por usuários pré definidos.</li>
	<li>Relatório - Voce poderá acessar relatórios como a listagem completa dos jovens de sua seção. Além disto voce poderá imprimir
	    a ficha e carteirinha de pagamaento (restrito à usuários pré definidos).</li>
	<li>Correios - Impressão de etiquetas para mala direta</li>
	<li>Usuário - Serve para cadastrar novos usuários para acessar a base de dados</li>
	<li>Sair - Para fazer logoff da página e garantir a segurança do cadastro o usuário deve clicar aqui após terminar a utilização do site</li>
	</ul>
</div>
</body>
</html>