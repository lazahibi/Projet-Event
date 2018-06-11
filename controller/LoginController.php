<?php
	include_once('model/ModelLogin.php');
	class LoginController {
		public function readLogin()
		{
			return include('view/login.php');	
		} 

		public function sendLogin()
		{
			$login = new ModelLogin;
			$log = $login->login($_POST['usr'], $_POST['psw']);
			if ($log > 0) {
				$_SESSION['usr'] = 1;
				$_SESSION['error'] = 0;
				return header('Location: index.php?'.base64_encode('page=AdminController&action=dashboard'));
			} else {
				$_SESSION['error'] = 1;
				return header('location: index.php?'.base64_encode("page=LoginController&action=readLogin"));
			}
		}

		public function logout()
		{
			session_start();
			unset($_SESSION['usr']);
			session_destroy();
			return header('location: index.php?'.base64_encode("page=LoginController&action=readLogin"));
		}
	}
?>