<?php
	namespace Model;

	class User{
		private $name;
		private $idUser;
		private $email;

		

		function __construct($name, $idUser, $email){
			$this->name   = $name;
			$this->idUser = $idUser;
			$this->email = $email;
		}

		public function getName(){
			return $this->name;
		}

		public function getEmail(){
			return $this->email;
		}

		public function __tostring(){
			return 'testing class';
		}


	}
?>