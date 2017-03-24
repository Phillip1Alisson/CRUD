<?php
class Controller{
	private static $user;
	private static $ItemSQL = new ItemSQL;
	public  static $Itens   = self::searchItens();
	private static $userSQL = new UserSQL;

	public static function loginUser(){
		$password = $__POST["password"];
		$email    = $__POST["email"];
		
		$userToLog = self::$userSQL->select(new User(NULL, NULL, $email,$password, NULL));
		$userToLog->fetch_array(MYSQLI_ASSOC);

		self::$user = new User($userToLog["full_name"], $userToLog["id_user"], $email, $password);

		$desireListSQl = new desireListSQl;
		$itens;	
		$itensIDs = $desireListSQl->select(self::$user);
		while($itensIDs->fetch_array(MYSQLI_ASSOC)){
			$itens[] = new Item($itensIDs["id_item"], $itensIDs["name_item"]);
		}

		self::$user->setDesireList($itens);

		echo self::$user;
	}


	public static function newUser(){
		$password = $__POST["password"];
		$email    = $__POST["email"];
		$name     = $__POST["name"];

		self::$userSQL->insert(new User($name, NULL, $email,$password, NULL));
		$newUser = self::$userSQL->select(new User($name, NULL, $email,$password, NULL));
		$newUser->fetch_array(MYSQLI_ASSOC);
		$user = new User($name, $newUser["id_user"], $email, $password);

		echo self::$user;
	}


	public static function deleteUser(){
		$password = $__POST["password"];
		$email    = $__POST["email"];
		if(self::$password == $password && self::$email == $email){
			$desireListSQL = new desireListSQl;
			$desireListSQl->deleteUserOfDesireList(self::$user);
			self::$user->getDesireList(NULL);
			self::$userSQL->delete(self::$user);

			echo 'Exclusão com sucesso';
		}

	}

		public static function createItem(){
			$name_item = $__POST["name_item"];
			self::$itemSQL->insert(new Item(NULL, $name));
			$item = self::$itemSQL->select(new Item(NULL, $name));
			$item->fetch_array(MYSQLI_ASSOC);
			$itens[] = new Item($item["id_item"], $name);

			echo 'inserção realizada com sucesso';
		}

		public static function deleteItem(){
			$name = $__POST["name_item"];

			foreach(self::$itens as $key = $value){
				if($value->getName_item() == $name){
					$desireList = new DesireListSQL;
					$desireList->deleteItemOfDesireList($value);
					self::$itemSQL->delete($value);
				}

			}
		}

		private static function searchItens(){
			$item = self::$itemSQL->select(NULL);
			while($item->fetch_array(MYSQLI_ASSOC)){
				$itns[] = new Item($item["id_item"], $item["name_item"]);
			}
			return $itns;
		}
}


?>
