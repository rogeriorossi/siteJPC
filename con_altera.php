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
   $jpc = isset($_POST["tx_jpc"]) ? addslashes(trim($_POST["tx_jpc"])) : FALSE;
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

//	print $_POST['tx_jpc'];

//altera os dados na tb_inf_pessoal
$SQL = "UPDATE tb_inf_pessoal SET
  DS_NOME = '".strtoupper($_POST['nome'])."'
, DT_NASCIMENTO = ".$data1."
, DS_EMAIL = '".strtolower($_POST['email'])."'
, ID_TP_LOGRADOURO = ".$_POST['tp_logradouro']."
, DS_LOGRADOURO = '".$_POST['logradouro']."'
, NU_ENDERECO = '".$_POST['numero']."'
, DS_COMPLEMENTO = '".$_POST['complemento']."'
, DS_BAIRRO = '".$_POST['bairro']."'
, DS_CIDADE = '".$_POST['cidade']."'
, DS_UF = '".strtoupper($_POST['estado'])."'
, NU_CEP = '".$_POST['cep']."'
, NU_TEL_RESIDENCIAL = '".$_POST['telres']."'
, NU_TEL_MOVEL = '".$_POST['telmov']."'
, NU_TEL_COMERCIAL = '".$_POST['telcom']."'
, ID_TP_DOCUMENTO = ".$_POST['tpdoc']."
, NU_DOCUMENTO = '".$_POST['doc']."'
, DS_OCUPACAO = '".$_POST['ocupacao']."'
, IN_ATIVO = ".$_POST['id_ativo']."
, IN_CORREIO = ".$_POST['id_correio']."
, ID_SEXO = ".$_POST['id_sexo']."
, ID_ESCOLARIDADE = ".$_POST['id_escola']."
WHERE ID_JPC = ". $jpc;

 //$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
 $result_id = @mysql_query($SQL) or die(mysql_error());	

 
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

 //altera os dados na tb_inf_escoteira
 $SQL3 = "UPDATE tb_inf_escoteira SET 
    NU_REGISTRO_UEB = '".$ueb."'
  , DT_PROMESSA = ".$dataprom."
  , DT_INICIO = ".$dataini1."
  , ID_CATEGORIA = ".$id_categoria."
  , ID_RAMO = ".$id_ramo."
  , ID_SECAO = ".$id_secao."
  , ID_FUNCAO = ".$id_funcao."
  , DT_AFASTAMENTO = ".$dataafast."
  , DS_STATUS_UEB = '".$status_ueb."'
  , DS_COMENTARIO = '".$comentarioj."'
WHERE ID_JPC = '". $jpc ."'";
 
 //$result_id3 = @mysql_query($SQL3) or die("Erro no banco de dados!");
 $result_id3 = @mysql_query($SQL3) or die(mysql_error());	


 //altera os dados na tb_inf_responsavel
 $SQL4 = "UPDATE tb_inf_responsavel SET
    NO_RESPONSAVEL = '".$nomer."'
  , ID_PARENTESCO = '".$parentesco."'
  , NU_CPF = '".$cpf."'
  , ID_TP_DOCUMENTO = '".$tpdocr."'
  , NU_DOCUMENTO = '".$docr."'
  , DS_EMAIL = '".$emailr."'
  , NU_TEL_RESIDENCIAL = '".$telresr."'
  , NU_TEL_MOVEL = '".$telmovr."'
  , NU_TEL_COMERCIAL = '".$telcomr."'
  , ID_ESCOLARIDADE = '".$id_escolar."'
  , ID_TP_LOGRADOURO = '".$tp_logradouror."'
  , DS_LOGRADOURO = '".$logradouror."'
  , NU_ENDERECO = '".$numeror."'
  , DS_COMPLEMENTO = '".$complementor."'
  , DS_BAIRRO = '".$bairror."'
  , DS_CIDADE = '".$cidader."'
  , DS_UF = '".$estador."'
  , NU_CEP = '".$cepr."'
  , DS_OCUPACAO = '".$ocupacaor."'
WHERE ID_JPC = '". $jpc ."'";
 
 //$result_id4 = @mysql_query($SQL4) or die("Erro no banco de dados!");
 $result_id4 = @mysql_query($SQL4) or die(mysql_error());	

  //altera os dados na tb_ficha_medica
 $SQL5 = "UPDATE tb_ficha_medica SET
    ID_TP_SANGUINEO = '".$id_sangue."'
  , IN_NADAR = '".$id_nadar."'
  , IN_ALERGIA = '".$id_alergia."'
  , DS_ALERGIA = '".$alergia."'
  , IN_CONVENIO = '".$id_convenio."'
  , DS_CONVENIO = '".$convenio."'
  , IN_ENFERMIDADE = '".$id_enfermidade."'
  , DS_ENFERMIDADE = '".$enfermidade."'
  , NU_TEL_EMERGENCIA = '".$telemerg."'
  , DS_CONTATO_EMERGENCIA = '".$contemerg."'
  , DS_COMENTARIO = '".$comentariom."'
WHERE ID_JPC = '". $jpc ."'";
 
// $result_id5 = @mysql_query($SQL5) or die("Erro no banco de dados!");
 $result_id5 = @mysql_query($SQL5) or die(mysql_error());	 

 // Exibe a mensagem Usuário cadastrado
 echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=alt_ok.php">'; 
?>
</body>
</html>
