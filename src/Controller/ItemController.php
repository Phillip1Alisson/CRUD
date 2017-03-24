<?php
	class ItemController{
		private static $ItemSQL = new ItemSQL;
		public  static $Itens = self::searchItens();

		public static function updateItem();
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
		public static function searchItem();
		private static function searchItens(){
			$item = self::$itemSQL->select(NULL);
			while($item->fetch_array(MYSQLI_ASSOC)){
				$itns[] = new Item($item["id_item"], $item["name_item"]);
			}
			return $itns;
		}
		public static function createItens(){
			self::$itemSQL->
		}



	}