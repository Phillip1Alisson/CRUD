<?php
	class UserSQL extends CommandSQL implements iUpdate{

		function __construct(){
			parent::__construct();
		}

		public function insert($obj, $otherObj = NULL){
			$query = "INSERT INTO users (full_name, email, password) VALUES ('".$obj->getFUll_name()."', '".$obj->getEmail()."', '".$obj->getPassword()."');";
			return $this->executSQL($query, $this->conn);
		}
	
		public function delete($obj){
			$query = "DELETE FROM users WHERE id_user = ".$obj->getId_user();
			return $this->executSQL($query, $this->conn);			
		}

		public function select($obj, $otherObjt = False){
			if(!$otherObjt)
				$query = "SELECT id_user, full_name FROM users WHERE email = '".$obj->getEmail()."' AND password = '".$obj->getPassword()."' ";
			else
				$query = "SELECT * FROM users";
			return $this->executSQL($query, $this->conn);
		}

		public function update($obj){
			$query = "UPDATE users SET full_name = '".$obj->getName()."', email = '".$obj->getEmail()."' password = '".$obj->getPassword()."'' WHERE id_user = ".$obj->getIdUser();
			return $this->executSQL($query, $this->conn);
		}

	}
?>