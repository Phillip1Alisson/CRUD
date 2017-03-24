<?php
	namespace DAO;
	include('UpdateInterface.php');
	use DAO\CommandSQL as CommandSQL;
	use DAO\iUpdate as iUpdate;
	use Model\User as User;
	
	class UserSQL extends CommandSQL implements iUpdate{

		function __construct($localServer, $login, $pass, $nameBanc){
			parent::__construct($localServer, $login, $pass, $nameBanc);
		}

		public function insert($obj, $otherObj = NULL){
			$query = "INSERT INTO users (full_name, email, password) VALUES ('".$obj->getName()."', '".$obj->getEmail()."', '".$obj->getPassword()."');";
			return $this->executSQL($query, $this->conn);
		}
	
		public function delete($obj){
			$query = "DELETE FROM users WHERE id_user = ".$obj->getId();
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



		private function callUser($email, $password){
			$hasUser = $this->select(new User(NULL, NULL, $email, NULL, $password));
			if(!is_null($hasUser))
				return $hasUser->fetch_array(MYSQLI_ASSOC);
			echo 'Usuario inexistente';
			return NULL;

		}
		public function loginUser($email, $password){
			$datasUser =$this->callUser($email, $password);
			if(!is_null($datasUser)){
				return $datasUser;
			}
			return NULL;
		}


		public function newUser($name, $email, $password){
			$newUser = $this->insert(new User($name, 0, $email, NULL, $password));
			if($newUser)
				return $this->loginUser($email, $password);
			return "Usuário existente";

		}

		public function updateUser($Obj){
			$updateUser = $this->update($obj);
			if($updateUser)
				return $obj;
			return "erro na atualização";


		}


		public function exclutionUser($obj){
			$desireList = new DesireListSQL("localhost","root", "","CRUD");
			$userDelete = $desireList->delete($obj);
			$isDelete = $this->delete($obj);
			if($isDelete && $userDelete)
				return "Excluição concluida com sucesso";
			else
				return "problemas na exclusão";

		}










	}
?>