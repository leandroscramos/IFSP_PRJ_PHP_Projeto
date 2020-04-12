<?php 

	function execSQL($database, $sql) {

		$conexao = conecta($database);
		$result = pg_query($conexao, $sql);
		pg_close($conexao);
		return $result;	
	}

?>
