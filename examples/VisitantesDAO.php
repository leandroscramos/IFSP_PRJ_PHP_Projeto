<?php 
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';

class VisitantesDAO {
	
	function getVisitantes(){

		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM hu.vw_velti_visitantes_leito	ORDER BY cd_leito");
		$statement->execute();

		$result = $statement->fetchAll();

		foreach ($result as $value) {
			$visitantes[] = $value;
		}

		return $visitantes;
		
	}
}