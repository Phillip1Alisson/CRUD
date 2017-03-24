<?php
	class User{
		private $full_name;
		private $id_user_user;
		private $email;
		private $desireList; // array of itens

		public function __construct($full_name, $id_user, $email, $desireList = NULL){
			$this->full_name = $full_name;
			$this->id_user = $id_user;
			$this->email = $email;
			$this->esireList = $desireList;
		}

		public function setFull_name($name){
			$this->full_name = $name;
		}

		public function getfull_name(){
			return $this->full_name;
		}
		
		public function getid_user(){
			return $this->id_user;
		}
		
		public function getEmail(){
			return $this->email;
		}

		public function getDesireList(){
			return $this->desireList;
		}

		public function setDesireList($desireList){
			$this->desireList = $desireList;
		}
	}
?>