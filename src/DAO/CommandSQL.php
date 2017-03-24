<?php
	namespace DAO;

	abstract class CommandSQL{

		protected $conn;

		function __construct($localServer, $login, $pass, $nameBanc){
			$this->conn = mysqli_connect($localServer, $login, $pass, $nameBanc);
		}

		public function executSQL($query, $conn){
			return mysqli_query($conn, $query);
		}
		abstract public function insert($ob, $otherObj = NULL);

		abstract public function delete($obj);

		abstract public function select($obj, $otherObj = False);

	}
?>