<?php
	//include('Conexion.php');

	
	namespace DAO;
	
	use DAO\Conexion as Conexion;
	class UpdateClass extends Conexion{

		function __construct($localServer, $login, $pass, $nameBanc){
			parent::__construct($localServer, $login, $pass, $nameBanc);
		}


		public function updateUSer($name, $idUser, $email){
			$query = "UPDATE users SET full_name = '".$name."', email = '".$email."' WHERE id_user = ".$idUser;
			return $this->executSQL($query, $this->conn);
		}

		public function updateItem($name, $idItem){
			$query = "UPDATE itens SET name_item = '".$name."'' WHERE id_item = ".$idItem;
			return $this->executSQL($query, $this->conn);
		}
	}

?>
