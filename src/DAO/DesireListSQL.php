<?php
	namespace DAO;

	use DAO\CommandSQL as CommandSQL;
	use Model\User as User;
	use Model\Item as Item;


	class DesireListSQL extends CommandSQL{
		function __construct($localServer, $login, $pass, $nameBanc){
			parent::__construct($localServer, $login, $pass, $nameBanc);
		}

		public function insert($obj, $otherObj = NULL){
			if(!is_null($otherObj)){
				$query = "INSERT INTO desire_list (id_user, id_item) VALUES (".$obj->getIdUser().", ".$otherObj->getIdItem().")";
				return $this->executSQL($query, $this->conn);
			}
		}
	
		public function delete($obj){
			if($obj instanceof User)
				$query = "DELETE FROM desire_list WHERE id_user = ".$obj->getIdUser();
			else
				$query = "DELETE FROM desire_list WHERE id_item = ".$obj->getIdItem();
			return $this->executSQL($query, $this->conn);			
		}

		public function select($obj, $otherObj = False){
			if(!$otherObj)
				if($obj instanceof User)
					$query = "SELECT id_item, name_item FROM desire_list WHERE id_user = '".$obj->getIdUser(). " INNER JOIN itens ON desire_list.id_item = itens.id_item";
				else
					$query = "SELECT id_user FROM desire_list WHERE id_item = '".$obj->getIdItem();
			else
				$query = "SELECT * FROM desire_list";
			return $this->executSQL($query, $this->conn);
		}

		public function deleteUserOfDesireList($user){
			$result = $this->delete($user);
			if($result)
				return "exclusão bem sucedida";
			return "problemas na exclusão";
		}

		public function deleteItemOfDesireList($Item){
			$result = $this->delete($Item);
			if($result)
				return "exclusão bem sucedida";
			return "problemas na exclusão";
		}

		public function insertInDesireList($user, $item){
			$result = $this->insert($user,$item);
			if($result){
				return "Dados novos na lista de desejos";
			return "Sua inclusão não foi bem";
			}
		}


	}
?>