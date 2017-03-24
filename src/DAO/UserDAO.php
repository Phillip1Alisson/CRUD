<?php
	namespace DAO;

/*	include('SelectClass.php');
	include('DeleteClass.php');
	include('UpdateClass.php');
	include('InsertClass.php');

	include('src\Model\User.php');
	include('src\Model\Item.php');
*/
	use Model\User as User;
	use Model\Item as Item;
	use DAO\SelectClass as SelectClass;
	use DAO\DeleteClass as DeleteClass;
	use DAO\InsertClass as InsertClass;
	use DAO\UpdateClass as UpdateClass;

	class UserDAO{
		private $connexion;
		

		function __construct($operation){
			$this->connexion = $this->createConnDAO($operation);
		}

		private function createConnDAO($operation){
			if($operation == "Insert")
				return new InsertClass("localhost","root","","CRUD");
			if($operation == "Select")
				return new SelectClass("localhost","root","","CRUD");
			if($operation == "Update")
				return new UpdateClass("localhost","root","","CRUD");
			if($operation == "Delete")
				return new DeleteClass("localhost","root","","CRUD");
		}

		public function deleteUser($idUser){
			try{
				return $this->connexion->deleteUser($idUser);
			}catch(Exception $e){
				echo 'Usuario nao existente';
				
			}
		}

		public function newUser($nameUser, $email, $password){
			if($this->connexion->insertUser($nameUser, $email, $password) === true){
				$this->connexion = $this->createConnDAO("Select");
				return $this->loginUser($email, $password);
			}
			else
				echo 'Usuario ja ativo';				
		}

		

		private function callUser($email, $password){
			$hasUser = $this->connexion->selectOneUser($email, $password);
			var_dump($hasUser);
			if(!is_null($hasUser))
				return $hasUser->fetch_array(MYSQLI_ASSOC);
			throw new Exception("Nenhum usuario existente", 1);
		}


		private function IsDesireList($IdUser){
			$HasitensInDesireList = $this->connexion->selectDesireList($IdUser);
			if(!is_null($HasitensInDesireList))
				return $HasitensInDesireList->fetch_array(MYSQLI_ASSOC);
			return NULL;
			//throw new Exception("Nenhuma lista de desejos para o usuario", 1);
			
		}

		private function desireList($arrayItens){
			$arrayItens = NULL;
			if(!is_null($arrayItens)){
				foreach ($arrayItens as $Itens => $id_item) {
					$item = $this->connexion->selectOneItem($id_item);
					$item = $item->fetch_array(MYSQLI_ASSOC);
					$arrayItens[$id_item] = new Item($item["name_item"], $id_item);
				}
			}
			
			return $arrayItens;
		}

		public function loginUser($email, $password){
			
			try{
				$user = $this->callUser($email, $password);
				try{
					$HasitensInDesireList = $this->IsDesireList($user["id_user"]);
					$arrayItens = $this->desireList($HasitensInDesireList);
				}catch(Expection $e){
					echo $e->getMessage();
				}
				return new User($user["full_name"], $user["id_user"], $email, $arrayItens);
			}catch(Expection $e){
				echo $e->getMessage();
			}
		}
	}
?>