<?php
	namespace Model;

	class Item{
		private $idItem;
		private $nameItem;

		function __construct($name, $id){
			$this->idItem = $id;
			$this->nameItem = $name;
		}

	}
?>
