<?php

session_start();

$_SESSION["root"] = realpath('projeto');
$_SESSION["upload_sub"] = '/projeto/upload/submissions/';
$_SESSION["upload_pub"] = '/projeto/upload/published/';

$_SESSION["title"] = "Documentos | SGQ";

// Arquivo de rotas do sistema.
require_once $_SESSION["root"].'routes.php';
