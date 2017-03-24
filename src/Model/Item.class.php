<?php
	class Item{
		private $id_item;
		private $name_item;

		function __construct($id_item, $name_item){
			$this->id_item = $id_item;
			$this->name_item = $name_item;
		}

		public function getId_item(){
			return $this->id_item;
		}
		public function getName_item(){
			return $this->name_item;
		}

		public function setName_item($newName){
			$this->name_item = $newName;
		}


	}
?>