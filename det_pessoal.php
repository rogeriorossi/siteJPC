﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
<table align="center" width="700">
  <tr align="center" bgcolor="#004080">
    <td align="center" bgcolor="#004080">
      <span class="menu">
          <a href="index.html">Principal</a> | 
          <a href="patrulha.htm">Patrulhas</a> | 
          <a href="aviso.htm">Avisos Semanais</a> | 
          <a href="calendario.htm">Calendário</a> | 	
          <a href="documento.htm">Documentos diversos</a> | 
          <font color="#ffcc00">Chefia</font> | 
          <a href="contato.htm">Contato</a>
      </span>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>
    <a name=#topo></a>
    <center>    
	<div class="titulo">
      <h2>Tropa Maat - JPC 173</h2>
      <h2>Area Restrita</h2>
	</div>
    </center>
    <div class=normal>
    <table align="center" width="700">
      <tr align="center" bgcolor="#004080">
        <td align="center" bgcolor="#004080">
          <span class="menu">
            <a href="consultar.php">Consultar</a> | 
            <a href="inserir.php">Inserir</a> | 
            <a href="atualizar.php">Atualizar</a> | 
            <a href="admin.php">Admin</a> | 
            <a href="sair.php">Sair</a>
          </span>
        </td>
      </tr>
      <tr><td>&nbsp;</td></tr>
    </table>
    <br><br>
    <?php
	  foreach($_POST['tx_nome'] as $nome)
//      $nome = isset($_POST["tx_nome"][1]) ? addslashes(trim($_POST["tx_nome[1]"])) : FALSE;
        echo $nome;
//      echo $_POST['tx_nome'][1].'<br />';	   
    ?>
    </div>
    </td>
  </tr>
</table>
</body>
</html> 
 