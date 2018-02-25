<?php
 require 'classes/DBnamespace.class.php';
 class DB extends Config implements DBnamespace{

 	private $db_insert,
 			$db_update,
 			$db_delete,
 			$db_Gquery,
 			$dbh;


 	public function G_query($stmt){
		$dbh = $this->conn;
		$stmt = $dbh->prepare($stmt);
		$stmt->execute();
		$this->fetch = $stmt->fetchAll();
		$this->row = $stmt->rowCount();
		return $this;
 	}

	public function Insert($table, $cols = []){
		$this->db_insert = $this->conn;

		//Column Of Records
		$col = implode(',', array_keys($cols));
		//Set ?, ?, ? ...etc Depend Of Count Of Array
		$val = implode(',', array_fill(0, count($cols), '?'));

		$this->stmt = $this->db_insert->prepare("INSERT INTO `$table` ({$col}) VALUES ({$val})");
		$this->result = $this->stmt->execute(array_values($cols));

		if($this->result) {
			return true;
		}

		return false;
	}

	public function Get($table, $where = null) {
		$sql 	= $this->conn;
		$query  = $sql->prepare("SELECT * FROM `$table` {$where}");
		$query->execute();
		$obj = $query->fetch(PDO::FETCH_OBJ);
		return $obj;
	}

 	public function Update($table, $fields, $where) {
 		$sql = $this->conn;
 		$stmt = $sql->prepare("UPDATE `$table` SET {$fields} WHERE {$where}");
 		$stmt->execute();
 		return $stmt->rowCount();

 	}
 	public function Delete($table, $id){
 		$this->db_delete = $this->conn;
 		$stmt = $this->db_delete->prepare("DELETE FROM `$table` WHERE id = '". $id ."'");
 		$stmt->execute();
 		return $stmt->rowCount();
 	}

 }

