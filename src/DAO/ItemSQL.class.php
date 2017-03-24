<?php
	class ItemSQL extends CommandSQL implements iUpdate{
		function __construct(){
			parent::__construct();
		}

		public function insert($obj, $otherObj = NULL){
			$query = "INSERT INTO itens (name_item) VALUES ('".$obj->getName_item()."');";
			return $this->executSQL($query, $this->conn);
		}
	
		public function delete($obj){
			$query = "DELETE FROM itens WHERE id_item = ".$obj->getId_item();
			return $this->executSQL($query, $this->conn);			
		}

		public function select($obj, $otherObj = False){
			if(!is_null($objs))
				if($obj->getId_item()!= NULL && $obj->getId_item()!=0)
					$query = "SELECT * FROM itens WHERE id_item = '".$obj->getId_item();
				else
					$query = "SELECT * FROM itens WHERE name_item = '".$obj->getName_item()."'";
			else
				$query = "SELECT * FROM itens";

			return $this->executSQL($query, $this->conn);
		}

		public function update($obj){
			$query = "UPDATE itens SET name_item = '".$obj->getName_item()."' WHERE id_item = ".$obj->getId_item();
			return $this->executSQL($query, $this->conn);
		}

	}
?>