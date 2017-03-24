<?php


	namespace CONTROLLER;

		class UserController{
			private static $user;
			private static $userSQL;

			public static function loginUser(){
				$password = $__POST["password"];
				$email    = $__POST["email"];

				self::$userSQL = new UserSQL("localhost","root", "","CRUD");
				$desireList = NULL;
				$datasUser;
				$desireListSQL;

				$datasUser = self::$userSQL->loginUser($email, $password);
				if(is_null($datasUser))
					return "Usuario inexistente";
				else{
					
					$desireListSQL = new desireListSQL("localhost","root", "","CRUD");
					$desire = $desireListSQL->select(self::$user);
					if(!is_null($desire)){
						$cont = 0;
						$itens[$cont] = new Item($desire["name_item"], $desire["id_item"]);
						while($desire->fetch_array(MYSQLI_ASSOC));
							$itens[$cont] = new Item($desire["name_item"], $desire["id_item"]);
							$cont = $cont+1;
						}
						$desireList = new desireList($itens);
					}
					self::$user = new User($datasUser["full_name"], $datasUser["id_user"], $email, $desireList, $password);
					return "Login com sucesso";					
				}
			}



		}


?>
