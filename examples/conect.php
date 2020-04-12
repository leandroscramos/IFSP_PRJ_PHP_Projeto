<?php

include_once 'C:/xampp/htdocs/projeto/php/Util/Util.php';
include_once 'C:/xampp/htdocs/projeto/php/DAO/DatabaseConnection.php';

$instance = DatabaseConnection::getInstance();

$conn = $instance->getConnection();

$usuario = 'admin';

$statement = $conn->prepare("SELECT * FROM 	public.usuario where usuario = :usuario");
$statement->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();
        
		foreach ($result as $value) {
			$usuarios[] = $value;
        }

        //var_dump($sumarios);

		Util::debug($usuarios);
		

$pwd = password_hash("user", PASSWORD_DEFAULT);

echo $pwd;