<?php

 abstract class Config {

	 private $DB_HOST = 'localhost';
	 private $DB_NAME = 'shorty';
	 private $DB_USER = 'root';
	 private $DB_PASS = 'hhhssslllaaa';
	 public $conn;

 	public function __construct() {
 		$this->dbhost = $this->DB_HOST;
 		$this->dbname = $this->DB_NAME;
 		$this->dbuser = $this->DB_USER;
 		$this->dbpass = $this->DB_PASS;


 		try {
 			$this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
 			//$this->conn->setAttribute()
 			return $this->conn;
 		} catch (PDOException $e) {
 			echo $e->getMessage();
 		}
 	}

 }