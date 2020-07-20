<?php

// Classe Singleton
class DatabaseConnection {
	private static $instance;
	private $config;
	private $conn;

	private function __construct() {
		$this->config = parse_ini_file($_SESSION["root"].'php/Configuration/dataBaseConfig.ini.php');
		$host = $this->config['pgsql_host'];
		$port = $this->config['pgsql_port'];
		$dbname = $this->config['pgsql_dbname'];
		$user = $this->config['pgsql_user'];
		$password = $this->config['pgsql_password'];

		$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";		
		try {			
			$this->conn = new PDO($dsn);
		} catch (Exception $e) {
			die('Unable to connect: '.$e->getMessage());
		}
	}
	// Singleton
 	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new DatabaseConnection();
		}
		return self::$instance;
	}
	public function getConnection() {
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $this->conn;
	}
}
