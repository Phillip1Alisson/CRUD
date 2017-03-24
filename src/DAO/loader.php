<?php

	function __autoload($class){

		$class = HOST."\\src".DS.str_replace('\\', DS, $class) .".php";
		if(file_exists($class))
			include_once $class;
	}
?>