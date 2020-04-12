	<?php

	include_once $_SESSION["root_func"].'includes/functions/functions.php';	

	function cleanData(&$str){
		$str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
	}

	$lista = $_POST['lista'];
	$dataInicio = $_POST['dataInicio'];
	$dataFim = $_POST['dataFim'];

	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: text/csv; charset=UTF-16LE");
//	header ("Content-Disposition: attachment; filename=export_\"{$dataInicio}\"a\"{$dataFim}\".csv");
	header ("Content-Disposition: attachment; filename=ex_".substr($lista,0,strpos($lista,"."))."-".$dataInicio."_a_".$dataFim.".csv");
	header ("Content-Description: PHP Generated Data" );

	// As 4 primeiras letras do nome do arquivo indicam a fonte de dados
	$database = strtoupper(substr($lista,0,4));
	if ($database != 'AGHU') {
		$database = '';
	}
	
	$filename = $_SESSION["root"]."php/Sistemas/stats/SQL/".$lista; //"sql1.txt";
	$filehandle = fopen($filename,"r") or die("Erro ao tentar abrir arquivo SQL: ".$filename);
	$sql = fread($filehandle, filesize($filename));
	
	$sql = str_replace("#data_ini",$dataInicio, $sql);
	$sql = str_replace("#data_fim",$dataFim, $sql);
	fclose($filehandle);
	
	if(!is_null($sql)) {

		$out = fopen("php://output", 'w');

		$flag = false;
		$result = execSql($database,$sql);
		
		if  (!$result) {
			fwrite($out,"Erro ao executar query: ".$filename);
		} else if (pg_num_rows($result) == 0) {
			fwrite($out,"Nenhuma linha recuperada");
		}
		else {			

			while(false !== ($row = pg_fetch_assoc($result))) {
				
				if(!$flag) {
					// display field/column names as first row
					fputcsv($out, array_keys($row), ';', '"');
					$flag = true;
				}
				array_walk($row, __NAMESPACE__ . '\cleanData');				
				fputcsv($out, array_values($row), ';', '"');
			}
		}

		fclose($out);
	}
	exit;

?>
