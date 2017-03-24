<?php

	namespace DAO;
	
	//include('Conexion.php');
	use DAO\Conexion as Conexion;

	class DeleteClass extends Conexion{

		function __construct($localServer, $login, $pass, $nameBanc){
			parent::__construct($localServer, $login, $pass, $nameBanc);
		}

		public function deleteUser($idUser){
			$query = "DELETE FROM users WHERE id_user = ".$idUser;
			return $this->executSQL($query, $this->conn);
		}

		public function deleteItem($idItem){
			$query = "DELETE FROM itens WHERE id_item = ".$idItem;
			return $this->executSQL($query, $this->conn);
		}

		public function deleteDesireListofUser($idUser){
			$query = "DELETE FROM desire_list WHERE id_user = ".$idUser;
			return $this->executSQL($query, $this->conn);
		}

		public function deleteItemOfDesireList($idItem){
			$query = "DELETE FROM desire_list WHERE id_item = ".$idItem;
			return $this->executSQL($query, $this->conn);
		}

		public function deleteItemOfDesireListUser($idItem, $idUser){
			$query = "DELETE FROM desire_list WHERE id_item = ".$idItem. " AND id_user = ".$idUser;
			return $this->executSQL($query, $this->conn);
		}

	}

?>