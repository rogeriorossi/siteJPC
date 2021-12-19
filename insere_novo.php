<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!--?php 
ini_set("display_errors",1);
ini_set("display_startup_erros",1);
error_reporting(E_ALL);
?-->
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
  $cone = @mysql_connect($host,$user,$passwd)or die ("Não foi possível estabelecer
 uma conexão com o banco de dados. Favor Contactar o Administrador.");
  mysql_select_db($base,$cone) or die ("Não foi possível estabelecer
 uma conexão com a base de dados. Favor Contactar o Administrador.");
//***********************

//   print_r($_POST);exit;
// Recupera dados do formulario
   $dtnasc = isset($_POST["dtnasc"]) ? addslashes(trim($_POST["dtnasc"])) : FALSE;
   $dtini = isset($_POST["dtini"]) ? addslashes(trim($_POST["dtini"])) : FALSE;
   $dtpromessa = isset($_POST["promessa"]) ? addslashes(trim($_POST["promessa"])) : FALSE;
   $dtafastamento = isset($_POST["afastamento"]) ? addslashes(trim($_POST["afastamento"])) : FALSE;   
   $ueb = isset($_POST["ueb"]) ? addslashes(trim($_POST["ueb"])) : FALSE;
   $id_categoria = isset($_POST["id_categoria"]) ? addslashes(trim($_POST["id_categoria"])) : FALSE;
   $id_ramo = isset($_POST["id_ramo"]) ? addslashes(trim($_POST["id_ramo"])) : FALSE;
   $id_secao = isset($_POST["id_secao"]) ? addslashes(trim($_POST["id_secao"])) : FALSE;
   $id_funcao = isset($_POST["id_funcao"]) ? addslashes(trim($_POST["id_funcao"])) : FALSE;
   $status_ueb = isset($_POST["status_ueb"]) ? addslashes(trim($_POST["status_ueb"])) : FALSE;
   $comentarioj = isset($_POST["comentarioj"]) ? addslashes(trim($_POST["comentarioj"])) : FALSE;
   $nomer = isset($_POST["nomer"]) ? addslashes(trim(strtoupper($_POST["nomer"]))) : FALSE;
   $parentesco = isset($_POST["parentesco"]) ? addslashes(trim($_POST["parentesco"])) : FALSE;
   $cpf = isset($_POST["cpf"]) ? addslashes(trim($_POST["cpf"])) : FALSE;
   $tpdocr = isset($_POST["tpdocr"]) ? addslashes(trim($_POST["tpdocr"])) : FALSE;
   $docr = isset($_POST["docr"]) ? addslashes(trim($_POST["docr"])) : FALSE;
   $emailr = isset($_POST["emailr"]) ? addslashes(trim(strtolower($_POST["emailr"]))) : FALSE;
   $telresr = isset($_POST["telresr"]) ? addslashes(trim($_POST["telresr"])) : FALSE;
   $telmovr = isset($_POST["telmovr"]) ? addslashes(trim($_POST["telmovr"])) : FALSE;
   $telcomr = isset($_POST["telcomr"]) ? addslashes(trim($_POST["telcomr"])) : FALSE;
   $id_escolar = isset($_POST["id_escolar"]) ? addslashes(trim($_POST["id_escolar"])) : FALSE;
   $tp_logradouror = isset($_POST["tp_logradouror"]) ? addslashes(trim($_POST["tp_logradouror"])) : FALSE;
   $logradouror = isset($_POST["logradouror"]) ? addslashes(trim($_POST["logradouror"])) : FALSE;
   $numeror = isset($_POST["numeror"]) ? addslashes(trim($_POST["numeror"])) : FALSE;
   $complementor = isset($_POST["complementor"]) ? addslashes(trim($_POST["complementor"])) : FALSE;
   $bairror = isset($_POST["bairror"]) ? addslashes(trim($_POST["bairror"])) : FALSE;
   $cidader = isset($_POST["cidader"]) ? addslashes(trim($_POST["cidader"])) : FALSE;
   $estador = isset($_POST["estador"]) ? addslashes(trim(strtoupper($_POST["estador"]))) : FALSE;
   $cepr = isset($_POST["cepr"]) ? addslashes(trim($_POST["cepr"])) : FALSE;
   $ocupacaor = isset($_POST["ocupacaor"]) ? addslashes(trim($_POST["ocupacaor"])) : FALSE;
   $id_sangue = isset($_POST["id_sangue"]) ? addslashes(trim($_POST["id_sangue"])) : FALSE;
   $id_nadar = isset($_POST["id_nadar"]) ? addslashes(trim($_POST["id_nadar"])) : FALSE;
   $id_alergia = isset($_POST["id_alergia"]) ? addslashes(trim($_POST["id_alergia"])) : FALSE;
   $alergia = isset($_POST["alergia"]) ? addslashes(trim($_POST["alergia"])) : FALSE;
   $id_convenio = isset($_POST["id_convenio"]) ? addslashes(trim($_POST["id_convenio"])) : FALSE;
   $convenio = isset($_POST["convenio"]) ? addslashes(trim($_POST["convenio"])) : FALSE;
   $id_enfermidade = isset($_POST["id_enfermidade"]) ? addslashes(trim($_POST["id_enfermidade"])) : FALSE;
   $enfermidade = isset($_POST["enfermidade"]) ? addslashes(trim($_POST["enfermidade"])) : FALSE;
   $telemerg = isset($_POST["telemerg"]) ? addslashes(trim($_POST["telemerg"])) : FALSE;
   $contemerg = isset($_POST["contemerg"]) ? addslashes(trim($_POST["contemerg"])) : FALSE;
   $comentariom = isset($_POST["comentariom"]) ? addslashes(trim($_POST["comentariom"])) : FALSE;
   
// Muda o formato da data
	if (!empty($dtnasc)) {
	$dia = substr($dtnasc,0,2);
	$mes = substr($dtnasc,3,2);
	$ano = substr($dtnasc,6,4);
	$data1 = "'".$ano."-".$mes."-".$dia."'";
	}
	else {
	$data1 = "null";
	}

//	print $_POST['data'];

//insere os dados na tb_inf_pessoal
$SQL = "INSERT INTO tb_inf_pessoal
(DS_NOME, DT_NASCIMENTO, DS_EMAIL, DS_LOGRADOURO, NU_ENDERECO, DS_COMPLEMENTO, 
 DS_BAIRRO, DS_CIDADE, DS_UF, NU_CEP, NU_TEL_RESIDENCIAL, NU_TEL_MOVEL, NU_TEL_COMERCIAL, 
 NU_DOCUMENTO, DS_OCUPACAO , IN_ATIVO, IN_CORREIO, 
 ID_SEXO, ID_TP_LOGRADOURO, ID_TP_DOCUMENTO, ID_ESCOLARIDADE ) 
VALUES ('".strtoupper($_POST['nome'])."',".$data1.",'".strtolower($_POST['email'])."','".$_POST['logradouro']."','".$_POST['numero']."','".$_POST['complemento']
."','".$_POST['bairro']."','".$_POST['cidade']."','".strtoupper($_POST['estado'])."','".$_POST['cep']."','".$_POST['telres']."','".$_POST['telmov']."','".$_POST['telcom']
."','".$_POST['doc']."','".$_POST['ocupacao']."','".$_POST['id_ativo']."','".$_POST['id_correio']
."','".$_POST['id_sexo']."','".$_POST['tp_logradouro']."','".$_POST['tpdoc']."','".$_POST['id_escola']."')"; 

 $result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
 //$result_id = @mysql_query($SQL) or die(mysql_error());	

 //recupera o ID_JPC inserido
 $SQL2 = "SELECT MAX(ID_JPC) as ID_JPC FROM tb_inf_pessoal";
 
 $result_id2 = @mysql_query($SQL2) or die("Erro no banco de dados!");
 $dados = mysql_fetch_array($result_id2);
 
 $id = $dados["ID_JPC"];
 
 // Muda o formato da data
	if (!empty($dtini)) {
	$dia1 = substr($dtini,0,2);
	$mes1 = substr($dtini,3,2);
	$ano1 = substr($dtini,6,4);
	$dataini1 = "'".$ano1."-".$mes1."-".$dia1."'";
	}
	else {
	$dataini1 = "null";
	}
	
	if (!empty($dtpromessa)) {
	$dia2 = substr($dtpromessa,0,2);
	$mes2 = substr($dtpromessa,3,2);
	$ano2 = substr($dtpromessa,6,4);
	$dataprom = "'".$ano2."-".$mes2."-".$dia2."'";
	}
	else {
	$dataprom = "null";
	}
	
	if (!empty($dtafastamento)) { 
	$dia3 = substr($dtafastamento,0,2);
	$mes3 = substr($dtafastamento,3,2);
	$ano3 = substr($dtafastamento,6,4);
	$dataafast = "'".$ano3."-".$mes3."-".$dia3."'";
	}
	else {
	$dataafast = "null";
	}	

 //insere os dados na tb_inf_escoteira
 $SQL3 = "INSERT INTO tb_inf_escoteira 
 (ID_JPC, NU_REGISTRO_UEB, DT_PROMESSA, DT_INICIO, ID_CATEGORIA, ID_RAMO, ID_SECAO, ID_FUNCAO, DT_AFASTAMENTO, DS_STATUS_UEB, DS_COMENTARIO) 
 VALUES 
 ('".$id."','".$ueb."',".$dataprom.",".$dataini1.",'".$id_categoria
 ."','".$id_ramo."','".$id_secao."','".$id_funcao."',".$dataafast.",'".."',".$status_ueb.",'".$comentarioj."')";

 
 $result_id3 = @mysql_query($SQL3) or die("Erro no banco de dados!");
 //$result_id3 = @mysql_query($SQL3) or die(mysql_error());	


 //insere os dados na tb_inf_responsavel
 $SQL4 = "INSERT INTO tb_inf_responsavel
 (ID_JPC, NO_RESPONSAVEL, ID_PARENTESCO, NU_CPF, ID_TP_DOCUMENTO, NU_DOCUMENTO, 
  DS_EMAIL, NU_TEL_RESIDENCIAL, NU_TEL_MOVEL, NU_TEL_COMERCIAL, ID_ESCOLARIDADE, 
  DS_TP_LOGRADOURO, DS_LOGRADOURO, NU_ENDERECO, DS_COMPLEMENTO, 
  DS_BAIRRO, DS_CIDADE, DS_UF, NU_CEP, DS_OCUPACAO) 
  VALUES 
 ('".$id."','".$nomer."','".$parentesco."','".$cpf."','".$tpdocr."','".$docr
 ."','".$emailr."','".$telresr."','".$telmovr."','".$telcomr."','".$id_escolar 
 ."','".$tp_logradouror."','".$logradouror."','".$numeror."','".$complementor
 ."','".$bairror."','".$cidader."','".$estador."','".$cepr."','".$ocupacaor."')";
 
 $result_id4 = @mysql_query($SQL4) or die("Erro no banco de dados!");
 //$result_id4 = @mysql_query($SQL4) or die(mysql_error());	

  //insere os dados na tb_ficha_medica
 $SQL5 = "INSERT INTO tb_ficha_medica
 (ID_JPC, ID_TP_SANGUINEO, IN_NADAR, IN_ALERGIA, DS_ALERGIA, IN_CONVENIO, DS_CONVENIO, 
 IN_ENFERMIDADE, DS_ENFERMIDADE, NU_TEL_EMERGENCIA, DS_CONTATO_EMERGENCIA, DS_COMENTARIO) 
 VALUES
 ('".$id."','".$id_sangue."','".$id_nadar."','".$id_alergia."','".$alergia."','".$id_convenio
 ."','".$convenio."','".$id_enfermidade."','".$enfermidade."','".$telemerg."','".$contemerg."','".$comentariom."')";
 
 $result_id5 = @mysql_query($SQL5) or die("Erro no banco de dados!");
// $result_id5 = @mysql_query($SQL5) or die(mysql_error());	 

 // Exibe a mensagem Usuário cadastrado
 echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=novo_ok.php">'; 
?>
</body>
</html>
