<?php
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelUsuario.php';

class LoginDAO {
	
	function verificaLogin($usuario) {

		// Conexão com banco.
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		// Select usando prepared statement.
        $statement = $conn->prepare("SELECT * FROM tb_user WHERE usuario = :usuario");
		$statement->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$statement->execute();

		// $linha recebe a primeira linha de retorno do banco de dados.
        $linha = $statement->fetch();

		// Se o login não existir o retorno do é nulo.
		if ($linha==null) {
		 	return null;
		}
		// Instancia o model usuário.
		$usuario = new ModelUsuario();	

		// Seto os dados do usuário que veio do banco no model instanciado.
		$usuario->setUsuarioFromDatabase($linha);
        
   		return $usuario;
	}
} 