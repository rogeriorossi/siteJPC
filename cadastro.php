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

<script type="text/javascript" charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><br>

</head>

<BODY>
<div id="tudo">
	<nav>
	  <div id="menu">
		      <ul>
			  <?php
			      echo "<li><a href='consulta.php'>Consultar</a></li>";
				  echo $_SESSION['id_tp_usuario'] == 2 ? "<li><a class='esconde' href='cadastro.php'>Inserir</a></li>" : "<li><a  class='ativo' href='cadastro.php'>Inserir</a></li>";
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
	
	<div class="clear"></div>
	
	<div align="center" >
	<h2 class="titulo">Cadastro</h2>

	<div class="clear"></div>
	
	<form id="contactform" name="cadastro" method="post" action="insere_novo.php">
	<fieldset><legend>Dados Pessoais</legend>
		<table align="left" width="0.95em" border="0">
		<tr><td>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td><label for="nome">Nome:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="sexo">Ativo:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="sexo">Correio:</label></td>
		</tr>
		<tr>
			<td><input class="input" name="nome" type="text" id="nome" size="70" /></td>
			<td>&nbsp;</td>
			<td><select class="input" name="id_ativo" id="id_ativo" size="1">
			<option value="1">Sim</option>
			<option value="0">N&atilde;o</option>
			</select>
			</td>
			<td>&nbsp;</td>
			<td><select class="input" name="id_correio" id="id_correio" size="1">
			<option value="1">Sim</option>
			<option value="0">N&atilde;o</option>
			</select>
			</td>		
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
			<td><input class="input" name="dtnasc" type="text" id="nome" /></td>
			<td><select class="input" name="id_sexo" id="id_sexo" size="1">
			<option value="">-- escolha --</option>
			<option value="1">Masculino</option>
			<option value="2">Feminino</option>
			</select>
			</td>
			<td><select class="input" name="tpdoc" id="tpdoc" size="1">
			<option value="1">RG</option>
			<option value="2">Titulo Eleitor</option>
			<option value="3">Passaporte</option>
			</select>
			</td>
			<td><input class="input" name="doc" type="text" id="nome" /></td>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="escola">Escolaridade:</label></td>
			<td><label for="ocupacao">Ocupa&ccedil;&atilde;o:</label></td>
			<td colspan="2"><label for="email">Email:</label></td>
		</tr>
		<tr>
			<td><select class="input" name="id_escola" id="id_escola" size="1">
			<option value="">-- escolha --</option>
			<option value="1">Prim&aacute;rio incompleto</option>
			<option value="2">Prim&aacute;rio completo</option>
			<option value="3">Secund&aacute;rio incompleto</option>
			<option value="4">Secund&aacute;rio completo</option>
			<option value="5">Superior incompleto</option>
			<option value="6">Superior completo</option>
			<option value="99">N&atilde;o Informado</option>
			</select>
			</td>
			<td><input class="input" name="ocupacao" type="text" id="nome" /></td>
			<td colspan="2"><input class="input" name="email" type="text" id="email" size="50" /></td>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="telres">Tel Residencial:</label></td>
			<td><label for="telmov">Tel M&oacute;vel:</label></td>
			<td><label for="telcom">Tel Comercial:</label></td>
		</tr>
		<tr>
			<td><input class="input" name="telres" type="text" id="nome" /></td>
			<td><input class="input" name="telmov" type="text" id="nome" /></td>
			<td><input class="input" name="telcom" type="text" id="nome" /></td>
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
			<td><select class="input" name="tp_logradouro" id="id_user" size="1">
			<option value="">-- escolha --</option>
			<option value="1">Rua</option>
			<option value="2">Avenida</option>
			<option value="3">Travessa</option>
			<option value="4">Pra&ccedil;a</option>
			<option value="5">Alameda</option>
			</select></td>
			<td><input class="input" name="logradouro" type="text" id="email" size="50" /></td>
			<td><input class="input" name="numero" type="text" id="email" size="10" /></td>
			<td><input class="input" name="complemento" type="text" id="email"/></td>
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
			<td><input class="input" name="bairro" type="text" id="email" /></td>
			<td><input class="input" name="cidade" type="text" id="email" size="50" /></td>
			<td><input class="input" name="estado" type="text" id="email" size="5" /></td>
			<td><input class="input" name="cep" type="text" id="email" size="10" /></td>
		</div></tr>
		</table>
		</td></tr>
		</table>
	</fieldset>
	<fieldset><legend>Dados Escoteiros</legend>
		<table align="left" width="0.95em" border="0">
		<tr><td>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">N&uacute;mero UEB:</label></td>
			<td><label for="tpuser">Data In&iacute;cio:</label></td>
			<td><label for="tpuser">Data Promessa:</label></td>
		</tr>
		<tr>
			<td><input class="input" name="ueb" type="text" id="ueb" /></td>
			<td><input class="input" name="dtini" type="text" id="dtini" /></td>
			<td><input class="input" name="promessa" type="text" id="promessa" /></td>
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
			<td valign="top"><select class="input" name="id_categoria" id="id_categoria">
			<option value="">-- escolha --</option>         
			<option value="2">Benefici&aacute;rio</option>         
			<option value="1">Associado</option>
			<option value="3">Escotista</option>
			<option value="4">Dirigente</option>
			<option value="5">Contribuinte</option>
			<option value="6">Colaborador</option>
			<option value="7">Benem&eacute;rito/Honor&iacute;fico</option>
			</select>
			</td>
			<td valign="top"><select class="input" name="id_ramo" id="id_ramo">
			<option value="">-- escolha --</option>         
			<option value="1">Lobinho</option>         
			<option value="2">Escoteiro</option>
			<option value="3">Senior</option>
			<option value="4">Pioneiro</option>
			<option value="5">Administrativo</option>
			<option value="99">N&atilde;o Informado</option>
			</select>
			</td>
			<td valign="top"><select class="input" name="id_secao" id="id_secao">
			<option value="">-- escolha --</option>         
			<option value="1">Alcateia I</option>         
			<option value="2">Alcateia II</option>
			<option value="3">Alcateia III</option>
			<option value="4">Alcateia IV</option>
			<option value="5">Maat</option>
			<option value="6">Kilimanjaro</option>
			<option value="7">Tsavo</option>
			<option value="8">Calipso</option>
			<option value="9">Guerreiros de Terracota</option>
			<option value="10">Cl&atilde; jacques Yves Cousteau</option>
			<option value="99">N&atilde;o Informado</option>
			</select>
			</td>
			<td valign="top"><select class="input" name="id_funcao" id="id_funcao">
			<option value="">-- escolha --</option>         
			<option value="1">Assistente</option>         
			<option value="2">Chefe de Se&ccedil;&atilde;o</option>
			<option value="3">Instrutor</option>
			<option value="4">Dirigente</option>
			<option value="5">Coordenador</option>
			<option value="99">N&atilde;o Informado</option>
			</select>
			</td>
		</div></tr>
		</table>  
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Data Afastamento:</label></td>
			<td><label for="tpuser">Situação UEB:</label></td>
		</tr>
		<tr>
			<td valign="top"><input class="input" name="afastamento" type="text" id="afastamento" /></td>
			<td valign="top"><input class="input" name="status_ueb" type="text" size='50' id="status_ueb" /></td>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="tpuser">Comentarios:</label></td>
		</tr>
		<tr>
		</td></tr>
			<td valign="top"><textarea class="textarea" name="comentarioj" type="textarea" id="comentarioj" cols="80"></textarea></td>
		</div></tr>
		</table>		
		</table>
	</fieldset>
	<fieldset><legend>Ficha M&eacute;dica</legend>
		<table align="left" width="800px" border="0">
		<tr><td>
		<table align="left" border="0">
		<tr><div class="field">
			<td width='150'><label for="nome">Tipo Sanguineo:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width='150'><label for="sexo">Sabe Nadar:</label></td>
			<td width="500">&nbsp;</td>
		</tr>
		<tr>
			<td><select class="input" name="id_sangue" id="id_sangue">
			<option value="">-- escolha --</option>
			<option value="1">A+</option>
			<option value="2">A-</option>
			<option value="3">B+</option>
			<option value="4">B-</option>
			<option value="5">AB+</option>
			<option value="6">AB-</option>
			<option value="7">O+</option>
			<option value="8">O-</option>
			</select>
			</td>
			<td>&nbsp;</td>
			<td><select class="input" name="id_nadar" id="id_escola" size="1">
			<option value="0">N&atilde;o</option>         
			<option value="1">Sim</option>
			</select>
			</td>
			<td width="50">&nbsp;</td>
		</div></tr>
		</table>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td width='150'><label for="nome">Possui alergia:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="500"><label for="sexo">Quais:</label></td>
		</tr>
		<tr>
			<td valign="top"><select class="input" name="id_alergia" id="id_alergia">
			<option value="0">N&atilde;o</option>         
			<option value="1">Sim</option>
			</select>
			</td>
			<td>&nbsp;</td>
			<td><input class="input" name="alergia" type="text" size="60" />
			</td>
		</div></tr>
		</table>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td width='165'><label for="nome">Possui enfermidade:</label></td>
			<td>&nbsp;&nbsp;</td>
			<td width="500"><label for="sexo">Quais:</label></td>
		</tr>
		<tr>
			<td valign="top"><select class="input" name="id_enfermidade" id="id_alergia">
			<option value="0">N&atilde;o</option>         
			<option value="1">Sim</option>
			</select>
			</td>
			<td>&nbsp;</td>
			<td><input class="input" name="enfermidade" type="text" size="60" />
			</td>
		</div></tr>
		</table>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td><label for="nome">Possui conv&ecirc;nio:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="500"><label for="sexo">Qual:</label></td>
		</tr>
		<tr>
			<td valign="top"><select class="input" name="id_convenio" id="id_convenio">
			<option value="0">N&atilde;o</option>         
			<option value="1">Sim</option>
			</select>
			</td>
			<td>&nbsp;</td>
			<td><input class="input" name="convenio" type="text" size="60" />
			</td>
		</div></tr>
		</table>
		<table align="left" border="0">	 
		<tr><div class="field">
			<td><label for="nome">Tel Emergência:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="500"><label for="sexo">Contato Emergência:</label></td>
		</tr>
		<tr>
			<td><input class="input" name="telemerg" type="text" size="20" />
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input class="input" name="contemerg" type="text" size="50" />
		</div></tr>
		</table> 
		<table align="left" border="0">	 
		<tr><div class="field">
			<td><label for="comentario">Coment&aacute;rios:</label></td>
		</tr>
		<tr>
			<td><textarea class="textarea" name="comentariom" type="textarea" cols="80"></textarea></td>
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
			<td size="70" colspan="2"><label for="nome">Nome Respons&aacute;vel:</label></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><label for="sexo">Parentesco:</label></td>
		</tr>
		<tr>
			<td colspan="2"><input class="input" name="nomer" type="text" id="nome" size="70" /></td>
			<td>&nbsp;</td>
			<td><select class="input" name="parentesco" id="id_escola" size="1">
			<option value="">-- escolha --</option>
			<option value="1">Pai</option>
			<option value="2">M&atilde;e</option>
			<option value="3">Tutor</option>
			<option value="99">N&atilde;o Informado</option>
			</select>
			</td>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="dtnasc">CPF:</label></td>
			<td><label for="dtnasc">Tipo Documento:</label></td>
			<td><label for="dtnasc">Documento: (s&oacute; n&uacute;meros)</label></td>
		</tr>
		<tr>
			<td><input class="input" name="cpf" type="text" id="nome" /></td>
			<td><select class="input" name="tpdocr" id="tpdoc" size="1">
			<option value="1">RG</option>
			<option value="2">Titulo Eleitor</option>
			<option value="3">Passaporte</option>
			</select>
			</td>
			<td><input class="input" name="docr" type="text" id="nome" /></td>
		</div></tr>
		</table>
		<table align="left">		
		<tr><div class="field">
			<td><label for="dtnasc">Escolaridade:</label></td>
			<td><label for="dtnasc">Ocupa&ccedil;&atilde;o:</label></td>
			<td><label for="email">Email:</label></td>
        </tr>
		<tr>
			<td><select class="input" name="id_escolar" id="id_escola" size="1">
			<option value="">-- escolha --</option>
			<option value="1">Prim&aacute;rio incompleto</option>
			<option value="2">Prim&aacute;rio completo</option>
			<option value="3">Secund&aacute;rio incompleto</option>
			<option value="4">Secund&aacute;rio completo</option>
			<option value="5">Superior incompleto</option>
			<option value="6">Superior completo</option>
			</select>
			</td>
			<td><input class="input" name="ocupacaor" type="text" id="nome" /></td>
			<td><input class="input" name="emailr" type="text" id="email" size="50" /></td>
		</div></tr>
		</table>
		<table align="left">
		<tr><div class="field">
			<td><label for="dtnasc">Tel Residencial:</label></td>
			<td><label for="dtnasc">Tel M&oacute;vel:</label></td>
			<td><label for="dtnasc">Tel Comercial:</label></td>
		</tr>
		<tr>
			<td><input class="input" name="telresr" type="text" id="nome" /></td>
			<td><input class="input" name="telmovr" type="text" id="nome" /></td>
			<td><input class="input" name="telcomr" type="text" id="nome" /></td>
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
			<td><select class="input" name="tp_logradouror" id="id_user" size="1">
			<option value="">-- escolha --</option>
			<option value="1">Rua</option>
			<option value="2">Avenida</option>
			<option value="3">Travessa</option>
			<option value="4">Pra&ccedil;a</option>
			<option value="5">Alameda</option>
			</select></td>
			<td><input class="input" name="logradouror" type="text" id="email" size="50" /></td>
			<td><input class="input" name="numeror" type="text" id="email" size="10" /></td>
			<td><input class="input" name="complementor" type="text" id="email"/></td>
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
			<td><input class="input" name="bairror" type="text" id="email" /></td>
			<td><input class="input" name="cidader" type="text" id="email" size="50" /></td>
			<td><input class="input" name="estador" type="text" id="email" size="5" /></td>
			<td><input class="input" name="cepr" type="text" id="email" size="10" /></td>
		</div></tr>
		</table>
		</td></tr>
		</table>
	</fieldset>
	<table align="left" width="500px">
	<tr>
		<td colspan=2><input class="button" type="submit" name="Submit" value="Cadastrar" /></td>
	</tr>
	</table>
	</form>
 </div>
 <br>
 
 </body>
 </html>