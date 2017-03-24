<?php
	/*include('src\Model\User.php');
	include('src\Model\Item.php');

	use Model\User as User;	
	use Model\Item as Item;

	$item1 = new Item("Ferrari", 1);
	$item2 = new Item("Monza", 2);
	$item3 = new Item("Honda", 3);
	
	$arrayItens[$item1->getIdItem()] = $item1->getNameItem();
	$arrayItens[$item2->getIdItem()] = $item2->getNameItem();
	$arrayItens[$item3->getIdItem()] = $item3->getNameItem();

	$user  = new User("Phillip", 1, "phill.volpi@gmail.com", $arrayItens);
	$user->getDesireList()->addItem(new Item("Fusca", 55));
	var_dump($user->getDesireList());
	$user->getDesireList()->removeItem(55);
	var_dump($user->getDesireList());

	$conn = mysql_connect("localhost","root", "root");

	var_dump($conn);
	*/
	//include('src\DAO\UserDAO.php');
	define("HOST", dirname(__FILE__));
	define("DS", DIRECTORY_SEPARATOR);
	define("DAO", "\\src\\DAO");
	define("Model", dirname(__FILE__)."/src/Model/");
	define("View", dirname(__FILE__)."/src/View/");
	define("Controller", dirname(__FILE__)."/src/Controller/");
	

	
	require_once(HOST. DAO. DS . "loader.php");
	
	use DAO\UserDAO;

	$user = new UserDAO("Insert");
	$user1 = $user->newUser("asdasd","pasdadhill@gmail.com","123456");
	print_r($user1);
	//var_dump($user);
?>