<?php
	namespace Model;

	class User{
		private $name;
		private $idUser;
		private $email;

		function User($name, $idUser, $email){
			$this->name   = $name;
			$this->email  = $email;
			$this->idUser = $idUser;
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