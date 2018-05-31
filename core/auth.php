<?php

	class Auth {

		private $login;
		private $passwordModif;
		
		//Получаем догин и пароль, введенные пользователем.
		function __construct() {
			$this->login = $_POST['login'];
			$this->passwordModif = md5($_POST['password']);
		}

		public function verific(){
			$this->redirect();
			$this->logOn();
		}

		public function registrUser(){
			$this->redirect();
			$this->checkNewLoginToRepeat();
			$this->addNewUser();
		}
		
		//Завершение сессии
		public function logOut() {
			$this->redirect(); //перенаправляем на страницу входа в админку
			unset($_SESSION['auth']);
			$_SESSION['infoAuth'] = "";
			$_SESSION['infoLogin'] = "";
			$_SESSION['infoAboutReg'] ="";
		}
		
		
		/* --------------------------------------------------------- */
		
		## Общая ф-ция
		//Перенаправляем пользователя на страницу входа в админку
		public function redirect(){
			header('Location: index.php?controller=ControllerAdmin&action=openPageRegAuth');
		}
		
		## Для авторизации		
		//Установление сессии (+проверка логина и пароля)
		public function logOn(){
			
			$query = "SELECT `login`, `psw` FROM `tableUsers` WHERE `login` = '$this->login' AND `psw` = '$this->passwordModif'";
			
			$result = Database::queryToDb($query);
			
				##Проверка логина и пароля.
				if($this->login === $result['login'] and $this->passwordModif === $result['psw']){

					//Установление сессии.
					$_SESSION['auth'] = true;
					$_SESSION['infoAuth'] = "";
					echo 'Login and Password OK!';
					exit();

				} else {
					$_SESSION['infoAuth'] = "<span style='color: red;'>Неверные логин или пароль.. Повторите попытку</span>";

					echo 'wrong login or password!';
				}
			
		}

		##Для регистрации нового пользователя.
		//Проверка Логина на совпадение с уже существующими
		public function checkNewLoginToRepeat(){

			$query = "SELECT `login` FROM `tableUsers` WHERE `login` = '$this->login'";
			
			$result = Database::queryToDb($query);

			foreach($result as $key => $value){

				if($this->login === $result['login']){

					$_SESSION['infoLogin'] = "Такой Логин уже занят. Придумайте другой Логин.";
					$_SESSION['infoAboutReg'] = "";
					
					echo 'Login already exists..';
					exit();

				} else {
					$_SESSION['infoLogin'] = "Логин не занят";
				}
			}			
		}
		
		##Для регистрации нового пользователя
		//Запись информации (Логин и пароль) в файл
		public function addNewUser(){

			if($_SESSION['infoLogin'] = "Логин не занят"){
			
				$query = "INSERT INTO `tableUsers`(`login`, `psw`) VALUES ('$this->login', '$this->passwordModif')";
			
				$result = Database::queryToDb($query);
				
				$_SESSION['infoAboutReg'] = "Регистрация прошла успешно. Зайдите под своим логином и паролем.";
			}	
		}		
	}