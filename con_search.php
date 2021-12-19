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
			      echo "<li><a  class='ativo' href='consulta.php'>Consultar</a></li>\n";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro.php'>Inserir</a></li>\n" : "<li><a href='cadastro.php'>Inserir</a></li>\n";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='altera.php'>Alterar</a></li>\n" : "<li><a href='altera.php'>Alterar</a></li>\n";
				  echo "<li><a href='relatorio.php'>Relat&oacute;rio</a></li>\n";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='correio.php'>Correio</a></li>\n" : "<li><a href='correio.php'>Correio</a></li>\n";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro_user.php'>Usu&aacute;rio</a></li>\n" : "<li><a href='cadastro_user.php'>Usu&aacute;rio</a></li>\n";
				  echo "<li><a class='sair' href='sair.php'>Sair</a></li>\n";
			  ?>
			  </ul>
			  <div class="clear"></div> 
	  </div>
	</nav>

<div align="center">

   <h2 class="titulo">Consulta</h2>

<?php
// Recupera o nome do formulario
    $nome = isset($_POST["nome"]) ? addslashes(trim($_POST["nome"])) : FALSE;
    $id_ativo = isset($_POST["no_ativo"]) ? addslashes(trim($_POST["no_ativo"])) : FALSE;
    $id_inativo = isset($_POST["no_inativo"]) ? addslashes(trim($_POST["no_inativo"])) : FALSE;
   	if($id_ativo)
   	{if($id_inativo)
   		{$sql_ativo = "";}
   		else
   		{$sql_ativo = "AND IN_ATIVO = '1'";}
   	}
   	else
   	{if($id_inativo)
   	  {$sql_ativo = "AND IN_ATIVO = '0'";}
   	 else
   	 {$sql_ativo = "";}
   	}

//***********************
//CONSULTA NO BANCO DE DADOS
    $SQL = "SELECT 
      A.ID_JPC
    , A.DS_NOME
    , A.IN_ATIVO
    , A.ID_RESPONSAVEL
    , C.NU_REGISTRO_UEB
    , N.DS_SECAO
    , O.DS_FUNCAO
FROM tb_inf_pessoal A
  LEFT JOIN tb_inf_escoteira C
    ON A.ID_JPC = C.ID_JPC
  LEFT JOIN tb_secao N
    ON C.ID_SECAO = N.ID_SECAO
  LEFT JOIN tb_funcao O
    ON C.ID_FUNCAO = O.ID_FUNCAO
WHERE A.DS_NOME LIKE '%". $nome ."%'
". $sql_ativo ."
ORDER BY DS_NOME";
//***********************
//    $result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
	$result_id = @mysql_query($SQL) or die(mysql_error());	
    $total = @mysql_num_rows($result_id);
    if($total)
    {
//***********************
//FALTA COLOCAR O LINK PARA CADA REGISTRO ENCONTRADO
//***********************
      

       // Abre tabela HTML
       echo "<table border=0 cellpadding=3 cellspacing=0 align='center'>\n";
       echo "<tr><th align='left'>UEB</th><th align='left'>Nome</th><th align='left'>Função</th><th align='left'>Seção</th><th align='left'>Detalhes</th></tr>\n";
		
	   $linha = 0;
	   
       // Efetua o loop no banco de dados
       while($dados = mysql_fetch_array($result_id))
       {  	
			$linha++;

			if($linha%2==0)
			{ $class='impar';	}
			else
			{	$class='par'; }


          echo "<tr class='". $class ."'>\n";
		  echo "<td width='100'>" . $dados["NU_REGISTRO_UEB"] . "</td>\n";
          echo "<td width='300'>" . $dados["DS_NOME"] . "</td>\n";
          echo "<td width='150'>" . $dados["DS_FUNCAO"] . "</td>\n";
          echo "<td width='150'>" . $dados["DS_SECAO"] . "</td>\n";
          echo "<form id='contactform' name='consulta' method='post' action='det_pessoa.php'>\n";
 	      echo "<input name='tx_jpc' type='hidden' value='". $dados["ID_JPC"] ."'>\n";
		  echo "<td><input class='button' name='bt_in". $linha ."' type='submit' value='Detalhe'</td>\n</tr>\n";
		  echo "</form>";
       }
       // Fecha tabela
       echo "</table>\n";
    }
    else
    {
       echo "<B>Nenhum usuario encontrado!</B>\n";
    }
    ?>

</div>
</div>
</body>
</html>

 
 