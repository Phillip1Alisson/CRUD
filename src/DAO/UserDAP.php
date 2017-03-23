<?php
	namespace DAO;

	include('Conexion.php');
	include('src\Model\User.php');
	include('src\Model\Item.php');

	use Model\User as User;
	use Model\Item as Item;
	use DAO\Conexion as Conexion;

	class UserDAO{
		private $connexion;
		

		function __construct(){
			$this->connexion = new Conexion("localhost","root","","CRUD");
			
		}

		
		public function loginUser($email, $password){
			$hasUser = $this->connexion->searchUserBanc($email, $password);
			if(!is_null($hasUser)){
				$definitiveUser = $hasUser->fetch_array(MYSQLI_ASSOC);
				$HasitensInDesireList = $this->connexion->searchItensInDesireListBanc($definitiveUser["id_user"]);
				$arrayItens = NULL;
				if(!is_null($HasitensInDesireList)){
					foreach ($HasitensInDesireList->fetch_array(MYSQLI_ASSOC) as $Itens => $id_item) {
						echo $id_item;
						$item = $this->connexion->searchItensBanc($id_item);
						$item = $item->fetch_array(MYSQLI_ASSOC);
						$arrayItens[$id_item] = new Item($item["name_item"], $id_item);

					}
				}
				return new User($definitiveUser["full_name"], $definitiveUser["id_user"], $definitiveUser["email"], $arrayItens);
			}

		}
	}

?>