<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php // Verificador de sessão
require "verifica.php";
ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL); 
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
			      echo "<li><a href='consulta.php'>Consultar</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro.php'>Inserir</a></li>" : "<li><a  href='cadastro.php'>Inserir</a></li>";
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

<?php
// Recupera dados do formulario

//    print_r($_POST);exit;
//    $jpc = isset($_GET["id"]) ? addslashes(trim($_GET["id"])) : FALSE;
    $jpc = isset($_POST["tx_jpc"]) ? addslashes(trim($_POST["tx_jpc"])) : FALSE;

//***********************
//CONSULTA NO BANCO DE DADOS
    $SQL = "SELECT
      A.ID_JPC
    , A.DS_NOME
    , date_format(A.DT_NASCIMENTO,'%d/%m/%Y') as DT_NASCIMENTO
    , A.DS_EMAIL
    , A.ID_TP_LOGRADOURO
	, A.DS_LOGRADOURO
    , A.NU_ENDERECO
    , A.DS_COMPLEMENTO
    , A.DS_BAIRRO
    , A.DS_CIDADE
    , A.DS_UF
    , A.NU_CEP
    , A.NU_TEL_RESIDENCIAL
    , A.NU_TEL_MOVEL
    , A.NU_TEL_COMERCIAL
    , A.ID_TP_DOCUMENTO
    , A.NU_DOCUMENTO
    , A.ID_ESCOLARIDADE
    , A.DS_OCUPACAO
    , A.IN_ATIVO
    , A.IN_CORREIO
    , A.ID_SEXO
    , B.NO_RESPONSAVEL
    , B.ID_PARENTESCO
    , B.NU_CPF
    , B.ID_TP_DOCUMENTO AS ID_TP_DOCUMENTO_RESP
    , B.NU_DOCUMENTO AS NU_DOCUMENTO_RESP
    , B.DS_EMAIL AS DS_EMAIL_RESP
    , B.NU_TEL_RESIDENCIAL AS NU_TEL_RESIDENCIAL_RESP
    , B.NU_TEL_MOVEL AS NU_TEL_MOVEL_RESP
    , B.NU_TEL_COMERCIAL AS NU_TEL_COMERCIAL_RESP
    , B.ID_ESCOLARIDADE AS ID_ESCOLARIDADE_RESP
    , B.ID_TP_LOGRADOURO AS ID_TP_LOGRADOURO_RESP
    , B.DS_LOGRADOURO AS DS_LOGRADOURO_RESP
    , B.NU_ENDERECO AS NU_ENDERECO_RESP
    , B.DS_COMPLEMENTO AS DS_COMPLEMENTO_RESP
    , B.DS_BAIRRO AS DS_BAIRRO_RESP
    , B.DS_CIDADE AS DS_CIDADE_RESP
    , B.DS_UF AS DS_UF_RESP
    , B.NU_CEP AS NU_CEP_RESP
    , B.DS_OCUPACAO AS DS_OCUPACAO_RESP
    , C.NU_REGISTRO_UEB
    , date_format(C.DT_PROMESSA,'%d/%m/%Y') as DT_PROMESSA
    , date_format(C.DT_INICIO,'%d/%m/%Y') as DT_INICIO
    , C.ID_CATEGORIA
    , C.ID_RAMO
    , C.ID_SECAO
    , C.ID_FUNCAO
    , date_format(C.DT_AFASTAMENTO,'%d/%m/%Y') as DT_AFASTAMENTO
	, C.DS_STATUS_UEB
    , C.DS_COMENTARIO
    , G.ID_TP_SANGUINEO
    , G.IN_NADAR
    , G.IN_ALERGIA
    , G.DS_ALERGIA
    , G.IN_CONVENIO
    , G.DS_CONVENIO
    , G.IN_ENFERMIDADE
    , G.DS_ENFERMIDADE
    , G.NU_TEL_EMERGENCIA
	, G.DS_CONTATO_EMERGENCIA
    , G.DS_COMENTARIO AS DS_COMENTARIO_MED
FROM tb_inf_pessoal A
  LEFT JOIN tb_inf_responsavel B
    ON A.ID_JPC = B.ID_JPC
  LEFT JOIN tb_inf_escoteira C
    ON A.ID_JPC = C.ID_JPC
  LEFT JOIN tb_ficha_medica G
    ON A.ID_JPC = G.ID_JPC
WHERE A.ID_JPC ='". $jpc ."'
ORDER BY A.DS_NOME";

//***********************
//    $result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
	$result_id = @mysql_query($SQL) or die(mysql_error());	
    $total = @mysql_num_rows($result_id);
    if($total)
    {  		
?>
	<div class="clear"></div>
	
	<div align="center" >
	<h2 class="titulo">Alteração</h2>

	<div class="clear"></div>
	
	<form id="contactform" name="altera" method="post" action="con_altera.php">

<?php
       while($dados = mysql_fetch_array($result_id))
       {
	   echo "<input name='tx_jpc' type='hidden' value='". $jpc ."'>\n";
?>	
	<fieldset><legend>Dados Pessoais</legend>
		<table align="left" width="0.95em" border="0">
		<tr><td>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td colspan="2"><label for="nome">Nome:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="sexo">Ativo:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="sexo">Correio:</label></td>
		</tr>
		<tr>
<?php
			echo "<td colspan='2'><input class='input' name='nome' type='text' id='nome' size='70' value='". $dados["DS_NOME"] . "' /></td>\n";
			echo "<td>&nbsp;</td>\n";
			echo "<td><select class='input' name='id_ativo' id='id_ativo' size='1'>\n";
			if ($dados["IN_ATIVO"]) 
			  {echo "<option value='1' selected>Sim</option>\n";
			   echo "<option value='0'>N&atilde;o</option>\n";
			  } else 
			  {echo "<option value='1'>Sim</option>\n";
			   echo "<option value='0' selected>N&atilde;o</option>\n";
			  }
			echo "</select>\n";
			echo "</td>\n";
			echo "<td>&nbsp;</td>\n";
			echo "<td><select class='input' name='id_correio' id='id_correio' size='1'>\n";
			if ($dados["IN_CORREIO"]) 
			  {echo "<option value='1'>Sim</option>\n";
			   echo "<option value='0'>N&atilde;o</option>\n";
			  } else 
			  {echo "<option value='0'>N&atilde;o</option>\n";
			   echo "<option value='1'>Sim</option>\n";
			  }
			echo "</select>\n";
			echo "</td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="dtnasc">Data Nascimento:</label></td>
			<td><label for="sexo">Sexo:</label></td>
			<td><label for="tpdoc">Tipo Documento:</label></td>
			<td><label for="doc">Documento: (s&oacute; n&uacute;meros)</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='dtnasc' type='text' id='dtnasc' value='". $dados["DT_NASCIMENTO"] . "' /></td>\n";
			echo "<td><select class='input' name='id_sexo' id='id_sexo' size='1'>\n";
			$SQL2="SELECT ID_SEXO, DS_SEXO FROM tb_sexo";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_SEXO']==$dados2['ID_SEXO'] ?  "<option value='".$dados2['ID_SEXO']."' selected>".$dados2['DS_SEXO']."</option>\n" : "<option value='".$dados2['ID_SEXO']."'>".$dados2['DS_SEXO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";

			echo "<td><select class='input' name='tpdoc' id='tpdoc' size='1'>\n";
			$SQL2="SELECT ID_TP_DOCUMENTO, DS_TP_DOCUMENTO FROM tb_tp_documento";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_TP_DOCUMENTO']==$dados2['ID_TP_DOCUMENTO'] ?  "<option value='".$dados2['ID_TP_DOCUMENTO']."' selected>".$dados2['DS_TP_DOCUMENTO']."</option>\n" : "<option value='".$dados2['ID_TP_DOCUMENTO']."'>".$dados2['DS_TP_DOCUMENTO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
?>
			<td><input class="input" name="doc" type="text" id="nome" /></td>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="escola">Escolaridade:</label></td>
			<td><label for="ocupacao">Ocupa&ccedil;&atilde;o:</label></td>
			<td><label for="email">Email:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><select class='input' name='id_escola' id='id_escola' size='1'>\n";
			$SQL2="SELECT ID_ESCOLARIDADE, DS_ESCOLARIDADE FROM tb_escolaridade";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_ESCOLARIDADE']==$dados2['ID_ESCOLARIDADE'] ?  "<option value='".$dados2['ID_ESCOLARIDADE']."' selected>".$dados2['DS_ESCOLARIDADE']."</option>\n" : "<option value='".$dados2['ID_ESCOLARIDADE']."'>".$dados2['DS_ESCOLARIDADE']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
			echo "<td><input class='input' name='ocupacao' type='text' id='ocupacao' value='". $dados["DS_OCUPACAO"] . "' /></td>\n";
			echo "<td><input class='input' name='email' type='text' id='email' size='50' value='". $dados["DS_EMAIL"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="telres">Tel Residencial:</label></td>
			<td><label for="telmov">Tel M&oacute;vel:</label></td>
			<td><label for="telcom">Tel Comercial:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='telres' type='text' id='telres' value='". $dados["NU_TEL_RESIDENCIAL"] . "' /></td>\n";
			echo "<td><input class='input' name='telmov' type='text' id='telmov' value='". $dados["NU_TEL_MOVEL"] . "' /></td>\n";
			echo "<td><input class='input' name='telcom' type='text' id='telcom' value='". $dados["NU_TEL_COMERCIAL"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Tp Lograd.:</label></td>
			<td><label for="tpuser">Logradouro:</label></td>
			<td><label for="tpuser">N&uacute;mero:</label></td>
			<td><label for="tpuser">Complemento:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><select class='input' name='tp_logradouro' id='tp_logradouro' size='1'>\n";
			$SQL2="SELECT ID_TP_LOGRADOURO, DS_TP_LOGRADOURO, DS_ABREVIACAO FROM tb_tp_logradouro";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_TP_LOGRADOURO']==$dados2['ID_TP_LOGRADOURO'] ?  "<option value='".$dados2['ID_TP_LOGRADOURO']."' selected>".$dados2['DS_TP_LOGRADOURO']."</option>\n" : "<option value='".$dados2['ID_TP_LOGRADOURO']."'>".$dados2['DS_TP_LOGRADOURO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
			echo "<td><input class='input' name='logradouro' type='text' id='logradouro' size='50' value='". $dados["DS_LOGRADOURO"] . "' /></td>\n";
			echo "<td><input class='input' name='numero' type='text' id='numero' size='10' value='". $dados["NU_ENDERECO"] . "' /></td>\n";
			echo "<td><input class='input' name='complemento' type='text' id='complemento' value='". $dados["DS_COMPLEMENTO"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Bairro:</label></td>
			<td><label for="tpuser">Cidade:</label></td>
			<td><label for="tpuser">Estado:</label></td>
			<td><label for="tpuser">CEP:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='bairro' type='text' id='bairro' value='". $dados["DS_BAIRRO"] . "' /></td>\n";
			echo "<td><input class='input' name='cidade' type='text' id='cidade' size='50' value='". $dados["DS_CIDADE"] . "' /></td>\n";
			echo "<td><input class='input' name='estado' type='text' id='estado' size='5' value='". $dados["DS_UF"] . "' /></td>\n";
			echo "<td><input class='input' name='cep' type='text' id='cep' size='10' value='". $dados["NU_CEP"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		</td></tr>
		</table>
	</fieldset>
	<fieldset><legend>Dados Escoteiros</legend>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">N&uacute;mero UEB:</label></td>
			<td><label for="tpuser">Data In&iacute;cio:</label></td>
			<td><label for="tpuser">Data Promessa:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='ueb' type='text' id='ueb' value='". $dados["NU_REGISTRO_UEB"] . "' /></td>\n";
			echo "<td><input class='input' name='dtini' type='text' id='dtini' value='". $dados["DT_INICIO"] . "' /></td>\n";
			echo "<td><input class='input' name='promessa' type='text' id='promessa' value='". $dados["DT_PROMESSA"] . "' /></td>\n";
?>
		</div></tr>
		</table>  
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Categoria:</label></td>
			<td><label for="tpuser">Ramo:</label></td>
			<td><label for="tpuser">Se&ccedil;&atilde;o:</label></td>
			<td><label for="tpuser">Fun&ccedil;&atilde;o:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><select class='input' name='id_categoria' id='id_categoria' size='1'>\n";
			$SQL2="SELECT ID_CATEGORIA, DS_CATEGORIA FROM tb_categoria";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_CATEGORIA']==$dados2['ID_CATEGORIA'] ?  "<option value='".$dados2['ID_CATEGORIA']."' selected>".$dados2['DS_CATEGORIA']."</option>\n" : "<option value='".$dados2['ID_CATEGORIA']."'>".$dados2['DS_CATEGORIA']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
			
			echo "<td><select class='input' name='id_ramo' id='id_ramo' size='1'>\n";
			$SQL2="SELECT ID_RAMO, DS_RAMO FROM tb_ramo";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_RAMO']==$dados2['ID_RAMO'] ?  "<option value='".$dados2['ID_RAMO']."' selected>".$dados2['DS_RAMO']."</option>\n" : "<option value='".$dados2['ID_RAMO']."'>".$dados2['DS_RAMO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";

			echo "<td><select class='input' name='id_secao' id='id_secao' size='1'>\n";
			$SQL2="SELECT ID_SECAO, DS_SECAO FROM tb_secao";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_SECAO']==$dados2['ID_SECAO'] ?  "<option value='".$dados2['ID_SECAO']."' selected>".$dados2['DS_SECAO']."</option>\n" : "<option value='".$dados2['ID_SECAO']."'>".$dados2['DS_SECAO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";

			echo "<td><select class='input' name='id_funcao' id='id_funcao' size='1'>\n";
			$SQL2="SELECT ID_FUNCAO, DS_FUNCAO FROM tb_funcao";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_FUNCAO']==$dados2['ID_FUNCAO'] ?  "<option value='".$dados2['ID_FUNCAO']."' selected>".$dados2['DS_FUNCAO']."</option>\n" : "<option value='".$dados2['ID_FUNCAO']."'>".$dados2['DS_FUNCAO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
?>
		</div></tr>
		</table>  
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Data Afastamento:</label></td>
			<td><label for="tpuser">Situação UEB:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='afastamento' type='text' id='afastamento' value='". $dados["DT_AFASTAMENTO"] . "' /></td>\n";
			echo "<td><input class='input' name='status_ueb' type='text' id='status_ueb' size='50' value='". $dados["DS_STATUS_UEB"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Comentários:</label></td>
		</tr>
		<tr>
<?php
			$comentario = wordwrap($dados["DS_COMENTARIO"], 80, "<br />\n");
			echo "<td><textarea class='textarea' name='comentarioj' id='comentarioj' cols='80'>". $dados["DS_COMENTARIO"] . "</textarea></td>\n";
?>
		</div></tr>
		</table>
	</fieldset>
	<fieldset><legend>Ficha M&eacute;dica</legend>
		<table align="left" width="800px" border="0">
		<tr><td>
		<table align="left" border="0">
		<tr><div class="field">
			<td><label for="nome">Tipo Sanguineo:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="sexo">Sabe Nadar:</label></td>
			<td width="500">&nbsp;</td>
		</tr>
		<tr>
<?php
			echo "<td><select class='input' name='id_sangue' id='id_sangue' size='1'>\n";
			$SQL2="SELECT ID_TP_SANGUINEO, DS_TP_SANGUINEO FROM tb_tp_sanguineo";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_TP_SANGUINEO']==$dados2['ID_TP_SANGUINEO'] ?  "<option value='".$dados2['ID_TP_SANGUINEO']."' selected>".$dados2['DS_TP_SANGUINEO']."</option>\n" : "<option value='".$dados2['ID_TP_SANGUINEO']."'>".$dados2['DS_TP_SANGUINEO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
			echo "<td>&nbsp;</td>\n";
			echo "<td><select class='input' name='id_nadar' id='id_nadar' size='1'>\n";
			if ($dados["IN_NADAR"]) 
			  {echo "<option value='1' selected>Sim</option>\n";
			   echo "<option value='0'>N&atilde;o</option>\n";
			  } else 
			  {echo "<option value='1'>Sim</option>\n";
			   echo "<option value='0' selected>N&atilde;o</option>\n";
			  }
			echo "</select>\n";
			echo "</td>\n";

?>
			<td width="50">&nbsp;</td>
		</div></tr>
		</table>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td><label for="nome">Possui alergia:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="500"><label for="sexo">Quais:</label></td>
		</tr>
		<tr>
<?php
		    echo "<td><select class='input' name='id_alergia' id='id_alergia' size='1'>\n";
			if ($dados["IN_ALERGIA"]) 
			  {echo "<option value='1' selected>Sim</option>\n";
			   echo "<option value='0'>N&atilde;o</option>\n";
			  } else 
			  {echo "<option value='1'>Sim</option>\n";
			   echo "<option value='0' selected>N&atilde;o</option>\n";
			  }
			echo "</select>\n";
			echo "</td>\n";
			echo "<td>&nbsp;</td>\n";
			echo "<td><input class='input' name='alergia' type='text' id='alergia' size='60' value='". $dados["DS_ALERGIA"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td><label for="nome">Possui enfermidade:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="500"><label for="sexo">Quais:</label></td>
		</tr>
		<tr>
<?php
		    echo "<td><select class='input' name='id_enfermidade' id='id_enfermidade' size='1'>\n";
			if ($dados["IN_ENFERMIDADE"]) 
			  {echo "<option value='1' selected>Sim</option>\n";
			   echo "<option value='0'>N&atilde;o</option>\n";
			  } else 
			  {echo "<option value='1'>Sim</option>\n";
			   echo "<option value='0' selected>N&atilde;o</option>\n";
			  }
			echo "</select>\n";
			echo "</td>\n";
			echo "<td>&nbsp;</td>\n";
			echo "<td><input class='input' name='enfermidade' type='text' id='enfermidade' size='60' value='". $dados["DS_ENFERMIDADE"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td><label for="nome">Possui conv&ecirc;nio:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="500"><label for="sexo">Qual:</label></td>
		</tr>
		<tr>
<?php
		    echo "<td><select class='input' name='id_convenio' id='id_convenio' size='1'>\n";
			if ($dados["IN_CONVENIO"]) 
			  {echo "<option value='1' selected>Sim</option>\n";
			   echo "<option value='0'>N&atilde;o</option>\n";
			  } else 
			  {echo "<option value='1'>Sim</option>\n";
			   echo "<option value='0' selected>N&atilde;o</option>\n";
			  }
			echo "</select>\n";
			echo "</td>\n";
			echo "<td>&nbsp;</td>\n";
			echo "<td><input class='input' name='convenio' type='text' id='convenio' size='60' value='". $dados["DS_CONVENIO"] . "' /></td>\n";
?>		
		</div></tr>
		</table>
		<table align='left' border='0'>	 
		<tr><div class='field'>
			<td width='150'><label for='comentario'>Tel Emergência:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='500'><label for='comentario'>Contato Emergência:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='telemerg' type='text' id='telemerg' size='20' value='". $dados["NU_TEL_EMERGENCIA"] . "' /></td>\n";
            echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";			
			echo "<td><input class='input' name='contemerg' type='text' id='contemerg' size='50' value='". $dados["DS_CONTATO_EMERGENCIA"] . "' /></td>\n";
?>
		</div></tr>
		</table> 
		<table align='left' border='0'>	 
		<tr><div class='field'>
			<td width='500'><label for='comentario'>Coment&aacute;rios:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><textarea class='textarea' name='comentariom' id='comentariom' cols='80'>". $dados["DS_COMENTARIO_MED"] . "</textarea></td>\n";
?>
		</div></tr>
		</table> 
		</td></tr>
		</table>
	</fieldset>
	<fieldset><legend>Dados do Respons&aacute;vel</legend>
		<table align="left" width="0.95em" border="0">
		<tr><td>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td size="70"><label for="nome">Nome Respons&aacute;vel:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="sexo">Parentesco:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='nomer' type='text' id='nomer' size='70' value='". $dados["NO_RESPONSAVEL"] . "' /></td>\n";
			echo "<td>&nbsp;</td>\n";
			echo "<td><select class='input' name='parentesco' id='parentesco' size='1'>\n";
			$SQL2="SELECT ID_PARENTESCO, DS_PARENTESCO FROM tb_parentesco";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_PARENTESCO']==$dados2['ID_PARENTESCO'] ?  "<option value='".$dados2['ID_PARENTESCO']."' selected>".$dados2['DS_PARENTESCO']."</option>\n" : "<option value='".$dados2['ID_PARENTESCO']."'>".$dados2['DS_PARENTESCO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
?>			
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="dtnasc">CPF:</label></td>
			<td><label for="dtnasc">Tipo Documento:</label></td>
			<td><label for="dtnasc">Documento: (s&oacute; n&uacute;meros)</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='cpf' type='text' id='cpf' value='". $dados["NU_CPF"] . "' /></td>\n";
			echo "<td><select class='input' name='tpdocr' id='tpdocr' size='1'>\n";
			$SQL2="SELECT ID_TP_DOCUMENTO, DS_TP_DOCUMENTO FROM tb_tp_documento";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_TP_DOCUMENTO_RESP']==$dados2['ID_TP_DOCUMENTO'] ?  "<option value='".$dados2['ID_TP_DOCUMENTO']."' selected>".$dados2['DS_TP_DOCUMENTO']."</option>\n" : "<option value='".$dados2['ID_TP_DOCUMENTO']."'>".$dados2['DS_TP_DOCUMENTO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
			echo "<td><input class='input' name='docr' type='text' id='docr' value='". $dados["NU_DOCUMENTO_RESP"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">		
		<tr><div class="field">
			<td><label for="dtnasc">Escolaridade:</label></td>
			<td><label for="dtnasc">Ocupa&ccedil;&atilde;o:</label></td>
			<td><label for="email">Email:</label></td>
        </tr>
		<tr>
<?php
			echo "<td><select class='input' name='id_escolar' id='id_escolar' size='1'>\n";
			$SQL2="SELECT ID_ESCOLARIDADE, DS_ESCOLARIDADE FROM tb_escolaridade";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_ESCOLARIDADE_RESP']==$dados2['ID_ESCOLARIDADE'] ?  "<option value='".$dados2['ID_ESCOLARIDADE']."' selected>".$dados2['DS_ESCOLARIDADE']."</option>\n" : "<option value='".$dados2['ID_ESCOLARIDADE']."'>".$dados2['DS_ESCOLARIDADE']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
			echo "<td><input class='input' name='ocupacaor' type='text' id='ocupacaoR'rvalue='". $dados["DS_OCUPACAO_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='emailr' type='text' id='emailr' size='50' value='". $dados["DS_EMAIL_RESP"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="dtnasc">Tel Residencial:</label></td>
			<td><label for="dtnasc">Tel M&oacute;vel:</label></td>
			<td><label for="dtnasc">Tel Comercial:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='telresr' type='text' id='telresr' value='". $dados["NU_TEL_RESIDENCIAL_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='telmovr' type='text' id='telmovr' value='". $dados["NU_TEL_MOVEL_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='telcomr' type='text' id='telcomr' value='". $dados["NU_TEL_COMERCIAL_RESP"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Tp Lograd.:</label></td>
			<td><label for="tpuser">Logradouro:</label></td>
			<td><label for="tpuser">N&uacute;mero:</label></td>
			<td><label for="tpuser">Complemento:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><select class='input' name='tp_logradouror' id='tp_logradouror' size='1'>\n";
			$SQL2="SELECT ID_TP_LOGRADOURO, DS_TP_LOGRADOURO, DS_ABREVIACAO FROM tb_tp_logradouro";
			$result_id2 = @mysql_query($SQL2) or die(mysql_error());	
			$total2 = @mysql_num_rows($result_id2);
			if($total2)
			{while($dados2 = mysql_fetch_array($result_id2))
			
			{echo $dados['ID_TP_LOGRADOURO_RESP']==$dados2['ID_TP_LOGRADOURO'] ?  "<option value='".$dados2['ID_TP_LOGRADOURO']."' selected>".$dados2['DS_TP_LOGRADOURO']."</option>\n" : "<option value='".$dados2['ID_TP_LOGRADOURO']."'>".$dados2['DS_TP_LOGRADOURO']."</option>\n";
			}
			}
			echo "</select>\n";
			echo "</td>\n";
			echo "<td><input class='input' name='logradouror' type='text' id='logradouror' size='50' value='". $dados["DS_LOGRADOURO_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='numeror' type='text' id='numeror' size='10' value='". $dados["NU_ENDERECO_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='complementor' type='text' id='complementor' value='". $dados["DS_COMPLEMENTO_RESP"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Bairro:</label></td>
			<td><label for="tpuser">Cidade:</label></td>
			<td><label for="tpuser">Estado:</label></td>
			<td><label for="tpuser">CEP:</label></td>
		</tr>
		<tr>
<?php
			echo "<td><input class='input' name='bairror' type='text' id='bairror' value='". $dados["DS_BAIRRO_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='cidader' type='text' id='cidader' size='50' value='". $dados["DS_CIDADE_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='estador' type='text' id='estador' size='5' value='". $dados["DS_UF_RESP"] . "' /></td>\n";
			echo "<td><input class='input' name='cepr' type='text' id='cepr' size='10' value='". $dados["NU_CEP_RESP"] . "' /></td>\n";
?>
		</div></tr>
		</table>
		</td></tr>
		</table>
	</fieldset>
	<table align="left" width="500px">
	<tr>
		<td colspan=2><input class="button" type="submit" name="Submit" value="Alterar" /></td>
	</tr>
	</table>
	</form>
 <?php
		}
	}
	else
    {
       echo "<B>Nenhum usuario encontrado!</B>\n";
    }
?>
  </div>
 <br>
 
 </body>
 </html>