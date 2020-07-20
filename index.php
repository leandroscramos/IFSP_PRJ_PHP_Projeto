<?php

session_start();

$_SESSION["root"] = realpath('projeto');
$_SESSION["upload_sub"] = '/projeto/upload/submissions/';
$_SESSION["upload_pub"] = '/projeto/upload/published/';

$_SESSION["title"] = "Documentos | SGQ";
//$_SESSION["root_functions"] = "/var/www/html/intranet/";

// Arquivo de rotas do sistema.
require_once $_SESSION["root"].'routes.php';

// Arquivo de funções do sistema.
//include_once $_SESSION["root_functions"].'includes/functions/functions.php';

