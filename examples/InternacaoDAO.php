<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';

class InternacaoDAO {
	
	public function getSumariosAlta($dataInicio,$dataFim){
        
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM 	hu.vw_aghu_sumario_alta 
                                    WHERE ts_alta_medica BETWEEN '$dataInicio' AND '$dataFim'
                                    ORDER BY nm_unid_residencia, nm_paciente ASC, ts_internacao ASC");
		$statement->execute();

		$result = $statement->fetchAll();
        
		foreach ($result as $value) {
			$sumarios[] = $value;
        }
        return $sumarios;
		
	}

	public function getPacienteInternadoByProntuario($prontuario){

		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();	

		$statement = $conn->prepare("SELECT * FROM 	hu.vw_intranet_internados WHERE prontuario = $prontuario");
		$statement->execute();

		$result = $statement->fetchAll();

		foreach ($result as $value) {
			$paciente = $value;
		}
		return $paciente;
	}

}