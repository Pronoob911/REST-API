<?php

class Database{
	private $host="localhost";
	private $db_name='myblog';
	private $username='root';
	private $password="";
	private $conn;


	//db connect
	public function connect(){
		$this->conn=null;

		try{
			$this->conn=new PDO('mysql:host=' .$this->host. ';dbname=' . $this->db_name, $this->username, $this->password);
			//$this->conn->setAttribute(PDO::ATTR_ERROMODE, PDO::ERRMODE_EXCEPTION);

		}

		catch(PDOException $e){
			echo 'connection error:' . $e->getMessage();;
		}

		return $this->conn;
	}
}


?>