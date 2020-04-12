<?php 

include_once $_SESSION["root"].'php/Util/Util.php';
require_once $_SESSION["root"].'php/Controller/ControllerInternacao.php';

//Util::debug($_SESSION);
	
$prontuario = '484766';

$obj = new ControllerInternacao();
$paciente = $obj->getPacienteInternadoByProntuario($prontuario);
//return $paciente;

print_r($paciente);
//Util::debug($data);