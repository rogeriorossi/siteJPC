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
    , I.DS_TP_LOGRADOURO as TP_LOGRADOURO
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
    , J.DS_TP_DOCUMENTO
    , A.NU_DOCUMENTO
    , E.DS_ESCOLARIDADE
    , A.DS_OCUPACAO
    , A.IN_ATIVO
    , A.IN_CORREIO
    , L.DS_SEXO
    , B.NO_RESPONSAVEL
    , P.DS_PARENTESCO
    , B.NU_CPF
    , K.DS_TP_DOCUMENTO AS DS_TP_DOCUMENTO_RESP
    , B.NU_DOCUMENTO AS NU_DOCUMENTO_RESP
    , B.DS_EMAIL AS DS_EMAIL_RESP
    , B.NU_TEL_RESIDENCIAL AS NU_TEL_RESIDENCIAL_RESP
    , B.NU_TEL_MOVEL AS NU_TEL_MOVEL_RESP
    , B.NU_TEL_COMERCIAL AS NU_TEL_COMERCIAL_RESP
    , F.DS_ESCOLARIDADE AS DS_ESCOLARIDADE_RESP
    , Q.DS_TP_LOGRADOURO AS DS_TP_LOGRADOURO_RESP
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
    , D.DS_CATEGORIA
    , M.DS_RAMO
    , N.DS_SECAO
    , O.DS_FUNCAO
    , date_format(C.DT_AFASTAMENTO,'%d/%m/%Y') as DT_AFASTAMENTO
	, C.DS_STATUS_UEB
    , C.DS_COMENTARIO
    , H.DS_TP_SANGUINEO
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
  LEFT JOIN tb_categoria D
    ON C.ID_CATEGORIA = D.ID_CATEGORIA
  LEFT JOIN tb_escolaridade E
    ON A.ID_ESCOLARIDADE = E.ID_ESCOLARIDADE
  LEFT JOIN tb_escolaridade F
    ON B.ID_ESCOLARIDADE = F.ID_ESCOLARIDADE
  LEFT JOIN tb_ficha_medica G
    ON A.ID_JPC = G.ID_JPC
  LEFT JOIN tb_tp_sanguineo H
    ON G.ID_TP_SANGUINEO = H.ID_TP_SANGUINEO
  LEFT JOIN tb_tp_logradouro I
    ON A.ID_TP_LOGRADOURO = I.ID_TP_LOGRADOURO
  LEFT JOIN tb_tp_logradouro Q
    ON B.ID_TP_LOGRADOURO = Q.ID_TP_LOGRADOURO
	LEFT JOIN tb_tp_documento J
    ON A.ID_TP_DOCUMENTO = J.ID_TP_DOCUMENTO
  LEFT JOIN tb_tp_documento K
    ON B.ID_TP_DOCUMENTO = K.ID_TP_DOCUMENTO
  LEFT JOIN tb_sexo L
    ON A.ID_SEXO = L.ID_SEXO
  LEFT JOIN tb_ramo M
    ON C.ID_RAMO = M.ID_RAMO
  LEFT JOIN tb_secao N
    ON C.ID_SECAO = N.ID_SECAO
  LEFT JOIN tb_funcao O
    ON C.ID_FUNCAO = O.ID_FUNCAO
  LEFT JOIN tb_parentesco P
    ON B.ID_PARENTESCO = P.ID_PARENTESCO
WHERE A.ID_JPC ='". $jpc ."'
ORDER BY A.DS_NOME";

//***********************
//    $result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
	$result_id = @mysql_query($SQL) or die(mysql_error());	
    $total = @mysql_num_rows($result_id);
    if($total)
    {  		
?>
			<div class='clear'></div>
	  		<form id='contactform' name='cadastro' method='post' action=''>

<?php
       while($dados = mysql_fetch_array($result_id))
       {
?>
	  		<fieldset><legend>Dados Pessoais</legend>
	  			<table align='left' width='800px' border='0'>
	  			<tr><td>
				<table align='left' border='0'>
					<tr><div class='field'>
					<td width='500'><label for='nome'>Nome:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='75'><label for='ativo'>Ativo:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='75'><label for='correio'>Correio:</label></td>
					</tr>
					<tr>
<?php
					echo "<td bgcolor='#FFFFFF' width='500'>". $dados["DS_NOME"] . "</td>\n";
					echo "<td>&nbsp;</td>\n";
					if ($dados["IN_ATIVO"]) {$ativo="SIM";} else {$ativo="NAO";}
					echo "<td bgcolor='#FFFFFF' width='75'>" . $ativo . "</td>\n";
					echo "<td>&nbsp;</td>\n";
					if ($dados["IN_CORREIO"]) {$correio="SIM";} else {$correio="NAO";}
					echo "<td bgcolor='#FFFFFF' width='75'>" . $correio . "</td>\n";
?>
					</div></tr>
				</table>
				</td></tr>
				<tr><td>
				<table align='left' border='0'>
					<tr><div class='field'>
					<td width='150'><label for='dtnasc'>Data Nascimento:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='200'><label for='sexo'>Sexo:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='200'><label for='tp_doc'>Tipo Documento:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			    	<td width='200'><label for='doc'>Documento:</label></td>
					</tr>
					<tr>
<?php
			    echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["DT_NASCIMENTO"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_SEXO"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_TP_DOCUMENTO"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["NU_DOCUMENTO"] . "</td>\n";
?>
			    	</div></tr>
				</table>
				</td></tr>
				<tr><td>
				<table align='left' border='0'>
					<tr><div class='field'>
					<td width='300'><label for='escola'>Escolaridade:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='400'><label for='ocupacao'>Ocupa&ccedil;&atilde;o:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='200'><label for='email'>Email:</label></td>
					</tr>
					<tr>
<?php
		      echo "<td bgcolor='#FFFFFF' width='300'>" . $dados["DS_ESCOLARIDADE"] . "</td>\n";
		      echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
		      echo "<td bgcolor='#FFFFFF' width='400'>" . $dados["DS_OCUPACAO"] . "</td>\n";
		      echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
		      echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_EMAIL"] . "</td>\n";
?>
		      		</div></tr>
				</table>
				</td></tr>
				<tr><td>
				<table align='left'>
					<tr><div class='field'>
					<td width='150'><label for='telres'>Tel Residencial:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='150'><label for='telmov'>Tel M&oacute;vel:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='150'><label for='telcom'>Tel Comercial:</label></td>
					</tr>
					<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["NU_TEL_RESIDENCIAL"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["NU_TEL_MOVEL"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["NU_TEL_COMERCIAL"] . "</td>\n";
?>
					</div></tr>
				</table>
				</td></tr>
				<tr><td>
				<table align='left' border='0'>
					<tr><div class='field'>
					<td width='150'><label for='tpuser'>Tp Lograd.:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='300'><label for='tpuser'>Logradouro:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='100'><label for='tpuser'>N&uacute;mero:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='200'><label for='tpuser'>Complemento:</label></td>
					</tr>
					<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["TP_LOGRADOURO"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='300'>" . $dados["DS_LOGRADOURO"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='100'>" . $dados["NU_ENDERECO"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_COMPLEMENTO"] . "</td>\n";
?>
					</div></tr>
				</table>
				</td></tr>
				<tr><td>
				<table align='left'>
					<tr><div class='field'>
					<td width='150'><label for='tpuser'>Bairro:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='300'><label for='tpuser'>Cidade:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='50'><label for='tpuser'>Estado:</label></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='100'><label for='tpuser'>CEP:</label></td>
					</tr>
					<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["DS_BAIRRO"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='300'>" . $dados["DS_CIDADE"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='50'>" . $dados["DS_UF"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='100'>" . $dados["NU_CEP"] . "</td>\n";
?>
					</div></tr>
				</table>
			</td></tr>
		</table>
	</fieldset>
	<fieldset><legend>Dados Escoteiros</legend>
		<table align='left'width='800px'>
		<tr><div class='field'>
			<td><label for='tpuser'>N&uacute;mero UEB:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for='tpuser'>Data In&iacute;cio:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for='tpuser'>Data Promessa:</label></td>
		</tr>
		<tr>
<?php
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["NU_REGISTRO_UEB"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["DT_INICIO"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["DT_PROMESSA"] . "</td>\n";
?>
		</div></tr>
		</table>  
		<table align='left'>
		<tr><div class='field'>
			<td><label for='tpuser'>Categoria:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for='tpuser'>Ramo:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for='tpuser'>Se&ccedil;&atilde;o:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for='tpuser'>Fun&ccedil;&atilde;o:</label></td>
		</tr>
		<tr>
<?php
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_CATEGORIA"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_RAMO"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_SECAO"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_FUNCAO"] . "</td>\n";				
?>
		</div></tr>
		</table>  
		<table align='left'>
		<tr><div class='field'>
			<td><label for='tpuser'>Data Afastamento:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="tpuser">Situação UEB:</label></td>
		</tr>
		<tr>
<?php
			    echo "			<td bgcolor='#FFFFFF' width='200'>" . $dados["DT_AFASTAMENTO"] . "</td>\n";
			    echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
				echo "			<td bgcolor='#FFFFFF' width='400'>" . $dados["DS_STATUS_UEB"] . "</td>\n";
?>
		</div></tr>
		</table> 
		<table align='left'>
		<tr><div class='field'>
			<td><label for='tpuser'>Comentarios:</label></td>	
		</tr>
		<tr>
<?php		
		echo "<td bgcolor='#FFFFFF' width='500'>" . $dados["DS_COMENTARIO"] . "</td>\n";	
?>
		</div></tr>
		</table> 
	</fieldset>
	<fieldset><legend>Ficha M&eacute;dica</legend>
		<table align='left' width='800px' border='0'>
		<tr><td>
		<table align='left' border='0'>
		<tr><div class='field'>
			<td width='150'><label for='tp_sangue'>Tipo Sanguineo:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='150'><label for='in_nadar'>Sabe Nadar:</label></td>
		</tr>
		<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='150'>". $dados["DS_TP_SANGUINEO"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			if ($dados["IN_NADAR"]) {$nadar="SIM";} else {$nadar="NAO";}
			echo "<td bgcolor='#FFFFFF' width='150'>" . $nadar . "</td>\n";
?>
		</div></tr>
		</table>
		<table align='left' border='0'>	 
		<tr><div class='field'>
			<td width='150'><label for='nome'>Possui alergia:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='500'><label for='sexo'>Quais:</label></td>
		</tr>
		<tr>
<?php
			if ($dados["IN_ALERGIA"]) {$alergia="SIM";} else {$alergia="NAO";}
			echo "<td bgcolor='#FFFFFF' width='150'>" . $alergia . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='500'>". $dados["DS_ALERGIA"] . "</td>\n";			
?>
		</div></tr>
		</table>
		<table align='left' border='0'>	 
		<tr><div class='field'>
			<td width='165'><label for='nome'>Possui enfermidade:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='500'><label for='sexo'>Quais:</label></td>
		</tr>
		<tr>
<?php
			if ($dados["IN_ENFERMIDADE"]) {$enfermidade="SIM";} else {$enfermidade="NAO";}
			echo "<td bgcolor='#FFFFFF' width='150'>" . $enfermidade . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='500'>". $dados["DS_ENFERMIDADE"] . "</td>\n";			
?>
		</div></tr>
		</table>		
		<table align='left' border='0'>	 
		<tr><div class='field'>
			<td width='150'><label for='nome'>Possui conv&ecirc;nio:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='500'><label for='sexo'>Qual:</label></td>
		</tr>
		<tr>
<?php
			if ($dados["IN_CONVENIO"]) {$convenio="SIM";} else {$convenio="NAO";}
			echo "<td bgcolor='#FFFFFF' width='150'>" . $convenio . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='500'>". $dados["DS_CONVENIO"] . "</td>\n";			
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
			echo "<td bgcolor='#FFFFFF' width='150'>". $dados["NU_TEL_EMERGENCIA"] . "</td>\n";	
            echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";			
			echo "<td bgcolor='#FFFFFF' width='500'>". $dados["DS_CONTATO_EMERGENCIA"] . "</td>\n";			
?>
		</div></tr>
		</table> 
		<table align='left' border='0'>	 
		<tr><div class='field'>
			<td width='500'><label for='comentario'>Coment&aacute;rios:</label></td>
		</tr>
		<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='500'>&nbsp;". $dados["DS_COMENTARIO_MED"] . "</td>\n";			
?>
		</div></tr>
		</table> 
		</td></tr>
		</table>
	</fieldset>
	<fieldset><legend>Dados do Respons&aacute;vel</legend>
		<table align='left' width='800px' border='0'>
		<tr><td>
		<table align='left' border='0'>	 
		<tr><div class='field'>
			<td width='500'><label for='nome'>Nome Respons&aacute;vel:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='300'><label for='sexo'>Parentesco:</label></td>
		</tr>
		<tr>
<?php

			echo "<td bgcolor='#FFFFFF' width='500'>". $dados["NO_RESPONSAVEL"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='300'>" . $dados["DS_PARENTESCO"] . "</td>\n";
?>
		</div></tr>
		</table>
		<table align='left'>
		<tr><div class='field'>
			<td width='200'><label for='dtnasc'>CPF:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='200'><label for='dtnasc'>Tipo Documento:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='200'><label for='dtnasc'>Documento:</label></td>
		</tr>
		<tr>
<?php

			echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["NU_CPF"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_TP_DOCUMENTO_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["NU_DOCUMENTO_RESP"] . "</td>\n";
?>
		</div></tr>
		</table>
		<table align='left'>		
		<tr><div class='field'>
			<td width='300'><label for='dtnasc'>Escolaridade:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='400'><label for='dtnasc'>Ocupa&ccedil;&atilde;o:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='200'><label for='email'>Email:</label></td>
        </tr>
		<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='300'>" . $dados["DS_ESCOLARIDADE_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='400'>" . $dados["DS_OCUPACAO_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='200'>" . $dados["DS_EMAIL_RESP"] . "</td>\n";
?>
		</div></tr>
		</table>
		<table align='left'>
		<tr><div class='field'>
			<td width='150'><label for='dtnasc'>Tel Residencial:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='150'><label for='dtnasc'>Tel M&oacute;vel:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='150'><label for='dtnasc'>Tel Comercial:</label></td>
		</tr>
		<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["NU_TEL_RESIDENCIAL_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["NU_TEL_MOVEL_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["NU_TEL_COMERCIAL_RESP"] . "</td>\n";
?>
		</div></tr>
		</table>
		<table align='left'>
		<tr><div class='field'>
			<td width='100'><label for='tpuser'>Tp Lograd.:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='300'><label for='tpuser'>Logradouro:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='100'><label for='tpuser'>N&uacute;mero:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='150'><label for='tpuser'>Complemento:</label></td>
		</tr>
		<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='100'>" . $dados["DS_TP_LOGRADOURO_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='300'>" . $dados["DS_LOGRADOURO_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='100'>" . $dados["NU_ENDERECO_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["DS_COMPLEMENTO_RESP"] . "</td>\n";
?>
		</div></tr>
		</table>
		<table align='left'>
		<tr><div class='field'>
			<td width='150'><label for='tpuser'>Bairro:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='300'><label for='tpuser'>Cidade:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='50'><label for='tpuser'>Estado:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='150'><label for='tpuser'>CEP:</label></td>
		</tr>
		<tr>
<?php
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["DS_BAIRRO_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='300'>" . $dados["DS_CIDADE_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='50'>" . $dados["DS_UF_RESP"] . "</td>\n";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
			echo "<td bgcolor='#FFFFFF' width='150'>" . $dados["NU_CEP_RESP"] . "</td>\n";
?>
		</div></tr>
		</table>
		</td></tr>
		</table>
	</fieldset>
	</form>
<?php
		}
	}
?>
 </div>
 <br>
 
 </body>
 </html>
</body>
</html>
