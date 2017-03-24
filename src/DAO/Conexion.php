<?php
	namespace DAO;
	
	class Conexion{
		protected $conn;

		function __construct($localServer, $login, $pass, $nameBanc){
			$this->conn = mysqli_connect($localServer, $login, $pass, $nameBanc);
		}

		public function executSQL($query, $conn){
			return mysqli_query($conn, $query);
		}

		public function searchUserBanc($email, $password){
			$query = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."' ";
			
			return mysqli_query($this->conn, $query);
		}

		public function searchItensInDesireListBanc($idUser){
			$query = "SELECT id_item FROM desire_list WHERE id_user = ".$idUser;
			return mysqli_query($this->conn, $query);
		}

		public function searchItensBanc($idItem){
			var_dump($idItem);
			$query = "SELECT name_item FROM itens WHERE id_item = ".$idItem;
			return mysqli_query($this->conn, $query);
		}

		public function insertUserBanc($nameUser, $email, $password){
			$query = "INSERT INTO users (full_name, email, password) VALUES ('".$nameUser."', '".$email."', '".$password."');";
			return mysqli_query($this->conn, $query);
		}

		public function deleteUser($idUser){
			$query = "DELETE FROM users WHERE id_user = ".$idUser;
			return mysqli_query($this->conn, $query);
		}



	}
?>
