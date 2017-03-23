<?php
	
	namespace Model;


	class DesireList{
		private $itens;

		function __construct($itens){
			$this->itens = $itens;
		}

		public function addItem($item){
			$this->itens[$item->getIdItem()] = $item->getNameItem();
			return $item;
		}

		public function removeItem($idItem){
			unset($this->itens[$idItem]);
			return $idItem;
		}
	}
?>