<?php
	namespace Model;

	class Item{
		private $idItem;
		private $nameItem;

		function __construct($name, $id){
			$this->idItem = $id;
			$this->nameItem = $name;
		}

		public function getNameItem(){
			return $this->nameItem;
		}

		public function getIdItem(){
			return $this->idItem;
		}

		public function updateNameItem($newName){
			$this->nameItem = $newName;
		}

	}
?>
