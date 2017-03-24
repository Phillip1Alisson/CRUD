<?php
	include_once('src/Model/User.class.php');
	include_once('src/Model/Item.class.php');
	include_once('src/DAO/CommandSQL.class.php');
	include_once('src/DAO/UpdateInterface.class.php');
	include_once('src/DAO/UserSQL.class.php');


	$item[] = new Item(1, "Ferrari") ;
	$user   = new User("Phillip", 1, "gnkscksdkfj@asjkkashdkdsa", "123456",$item);
	$UserSQL = new UserSQL();
	var_dump($UserSQL->insert($user));
	print_r($user);
	
?>