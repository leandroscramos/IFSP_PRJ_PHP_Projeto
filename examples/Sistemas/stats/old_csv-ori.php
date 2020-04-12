<?php

include_once "../../includes/functions/functions.php";

// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function cleanData(&$str)
{
  $str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
}

$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];

// Configurações header para forçar o download
//header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: text/csv; charset=UTF-16LE");
header ("Content-Disposition: attachment; filename=Consumo_Materiais_\"{$dataInicio}\"a\"{$dataFim}\".csv");
header ("Content-Description: PHP Generated Data" );

$out = fopen("php://output", 'w');

$flag = false;
$result = getConsumoMateriais($dataInicio,$dataFim);
while(false !== ($row = pg_fetch_assoc($result))) {
  if(!$flag) {
    // display field/column names as first row
    fputcsv($out, array_keys($row), ';', '"');
    $flag = true;
  }
  array_walk($row, __NAMESPACE__ . '\cleanData');
  fputcsv($out, array_values($row), ';', '"');
}

fclose($out);
exit;

?>
