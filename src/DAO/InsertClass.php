<?php
	namespace DAO;
	include('Conexion.php');
	use DAO\Conexion as Conexion;

	class InsertClass extends Conexion{

		function __construct($localServer, $login, $pass, $nameBanc){
			parent::__construct($localServer, $login, $pass, $nameBanc);
		}

		public function insertUser($nameUser, $email, $password){
			$query = "INSERT INTO users (full_name, email, password) VALUES ('".$nameUser."', '".$email."', '".$password."');";
			return $this->executSQL($query, $this->conn);
		}

		public function insertItem($nameItem){
			$query = "INSERT INTO itens (name_item) VALUES ('".$nameItem."');";
			return $this->executSQL($query, $this->conn);

		}

	}
?>