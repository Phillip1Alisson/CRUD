<?php
	namespace DAO;


	use DAO\CommandSQL as CommandSQL;
	use DAO\iUpdate as iUpdate;
	use DAO\DesireListSQL as DesireListSQL;
	use Model\Item as Item;
	use Model\DesireList as DesireList;

	class ItemSQL extends CommandSQL implements iUpdate{
		function __construct($localServer, $login, $pass, $nameBanc){
			parent::__construct($localServer, $login, $pass, $nameBanc);
		}

		public function insert($obj, $otherObj = NULL){
			$query = "INSERT INTO itens (name_item) VALUES ('".$obj->getNameItem()."');";
			return $this->executSQL($query, $this->conn);
		}
	
		public function delete($obj){
			$query = "DELETE FROM itens WHERE id_item = ".$obj->getIdItem();
			return $this->executSQL($query, $this->conn);			
		}

		public function select($obj, $otherObj = False){
			if(!$otherObj)
				if($obj->getIdItem()!= NULL && $obj->getIdItem()!=0)
					$query = "SELECT * FROM itens WHERE id_item = '".$obj->getIdItem();
				else
					$query = "SELECT * FROM itens WHERE name_item = '".$obj->getNameItem()."'";
			else
				$query = "SELECT * FROM itens";

			return $this->executSQL($query, $this->conn);
		}

		public function update($obj){
			$query = "UPDATE itens SET name_item = '".$obj->getNameItem()."' WHERE id_item = ".$obj->getIdItem();
			return $this->executSQL($query, $this->conn);
		}


		public function excluirItem($item){
			$DesireList = new DesireListSQL("localhost","root", "","CRUD");
			$itens = $DesireList->delete($item);
			$itens2 = $this->delete($item);
			if($itens && $itens2)	
				return "exclusão concluida com sucesso";
			return "problemas para excluir";
		}

		public function createItem($item){
			$itemInsert = $this->insert($item);
			if($itemInsert){
				$itens = $this->select($item);
				$itens = $itens->fetch_array(MYSQLI_ASSOC);
				return new Item($itens["name_item"], $itens["id_item"]);
			}
			return "Erro na inserção";
		}

		public function selectOneItem($item){
			$itens = $this->select($item);
			$itens = $itens->fetch_array(MYSQLI_ASSOC);
			return new Item($itens["name_item"], $itens["id_item"]);
		}

		public function selectItens(){
			$itens = $this->select($item, true);
			$arrayItem;
			$cont = 0;
			while($item = $itens->fetch_array(MYSQLI_ASSOC)){
				$arrayItem[$cont] = new Item($item["name_item"], $item["id_item"]);
				$cont = $cont + 1;
			}

			return $arrayItem;
		}

		public function updateItem($item){
			$isUpdate = $this->update($item);
			if($isUpdate){
				$item = $this->select($item);
				$itens = $item->fetch_array(MYSQLI_ASSOC);
				return new Item($itens["name_item"], $itens["id_item"]);
			}
		}

	}
?>