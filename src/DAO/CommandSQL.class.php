<?php
	abstract class CommandSQL{

		protected $conn;

		function __construct(){
			$this->conn = mysqli_connect("localhost","root", "","CRUD");
		}

		public function executSQL($query, $conn){
			return mysqli_query($conn, $query);
		}
		abstract public function insert($ob, $otherObj = NULL);

		abstract public function delete($obj);

		abstract public function select($obj, $otherObj = False);

	}
?>