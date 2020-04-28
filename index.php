<?php

session_start();

$_SESSION["root"] = realpath('projeto');

$_SESSION["title"] = "Documentos | SGQ";
//$_SESSION["root_functions"] = "/var/www/html/intranet/";

// Arquivo de rotas do sistema.
require_once $_SESSION["root"].'routes.php';

// Arquivo de funções do sistema.
//include_once $_SESSION["root_functions"].'includes/functions/functions.php';

