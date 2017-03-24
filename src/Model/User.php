<?php
	namespace Model;
	include('DesireList.php');
	use Model\DesireList as DesireList;

	class User{
		private $name;
		private $idUser;
		private $email;
		private $desireList;
		

		function __construct($name, $idUser, $email, $itens){
			$this->name   = $name;
			$this->idUser = $idUser;
			$this->email = $email;
			if($itens != NULL)
				$this->desireList = new DesireList($itens);
		}

		public function getName(){
			return $this->name;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getdesireList(){
			return $this->desireList;
		}

		public function getIdUser(){
			return $this->idUser;
		}

		public function __tostring(){
			return 'testing class';
		}


	}
?>