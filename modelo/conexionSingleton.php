<?php

class conexionSingleton{
	
	private $_connection;
	private static $intancia;

	// Solo cambiamos los datos de la BD
	// private $_host = "localhost";
	// private $_username = "root";
	// private $_password = "";
	// private $_database = "pruebaads";
	
	private $_host = $_ENV["DB_HOST"];
	private $_username = $_ENV['DB_USERNAME'];
	private $_password = $_ENV['DB_PASSWORD'];
	private $_database = $_ENV['DB_NAME'];
	private $_port = $_ENV['DB_PORT'];

	// Singleton: Retorna la instancia
	public static function getInstance() {
		if(self::$intancia == null) { // Si no hay una instancia creamos una
			self::$intancia = new self(); // Se crea una instancia de la clase y se ejecuta el constructor
		}
		return self::$intancia;
	}

	// Constructor: crea la conexión con la BD cuando se crea una intancia de la clase
	private function __construct() {
		// $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

		$this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database, $this->_port);
	
	}

	// Obtengo la conexión 
	public function getConnection() {
		return $this->_connection;
	}
}
?>