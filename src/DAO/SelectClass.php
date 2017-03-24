<?php
	namespace DAO;
		//include('Conexion.php');
		use DAO\Conexion as Conexion;

		class SelectClass extends Conexion{

			function __construct($localServer, $login, $pass, $nameBanc){
				parent::__construct($localServer, $login, $pass, $nameBanc);
			}

			public function selectOneUser($email, $password){
				$query = "SELECT id_user, full_name FROM users WHERE email = '".$email."' AND password = '".$password."' ";
				return $this->executSQL($query, $this->conn);
			}

			public function selectOneItem($idItem){
				$query = "SELECT name_item FROM itens WHERE id_item = '".$idItem."'";
				return $this->executSQL($query, $this->conn);
			}

			public function selectListUser(){
				$query = "SELECT * FROM users";
				return $this->executSQL($query, $this->conn);

			}

			public function selectListItem(){
				$query = "SELECT * FROM itens";
				return $this->executSQL($query, $this->conn);

			}

			public function selectDesireList($idUser){
				$query = "SELECT id_item, id_desire_list FROM desire_list WHERE id_user = ".$idUser;
				return $this->executSQL($query, $this->conn);
			}

		}

?>