﻿<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<?php
// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]))
{
    // Usuário não logado! Redireciona para a página de login
    //echo 'USUARIO NAO LOGADO';
    echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=login2.htm">';
    exit;
}
?>
</body>
</html> 