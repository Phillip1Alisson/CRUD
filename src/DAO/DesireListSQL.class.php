<?php

	class DesireListSQL extends CommandSQL{
		function __construct(){
			parent::__construct());
		}

		public function insert($obj, $otherObj = NULL){
			if(!is_null($otherObj)){
				$query = "INSERT INTO desire_list (id_user, id_item) VALUES (".$obj->getId_user().", ".$otherObj->getId_item().")";
				return $this->executSQL($query, $this->conn);
			}
		}
	
		public function delete($obj){
			if($obj instanceof User)
				$query = "DELETE FROM desire_list WHERE id_user = ".$obj->getId_user();
			else
				$query = "DELETE FROM desire_list WHERE id_item = ".$obj->getId_item();
			return $this->executSQL($query, $this->conn);			
		}

		public function select($obj, $otherObj = False){
			if(!$otherObj)
				if($obj instanceof User)
					$query = "SELECT id_item, name_item FROM desire_list WHERE id_user = '".$obj->getId_user(). " INNER JOIN itens ON desire_list.id_item = itens.id_item";
				else
					$query = "SELECT id_user FROM desire_list WHERE id_item = '".$obj->getId_item();
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