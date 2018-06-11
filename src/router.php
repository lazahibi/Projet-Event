<?php	
	if ($tab['page'] == "AdminController") {
		if (isset($_SESSION['usr'])) {
			include_once 'controller/AdminController.php';
			$controller = new AdminController();
		}
		else {
			header('location: index.php?'.base64_encode("page=LoginController&action=readLogin"));
		}
		switch ($action) {
			case 'readCreateEvent':
				$controller->readCreateEvent();
				break;
			case 'createEvent':
				$controller->createEvent();
				break;
			case 'readEvent':
				$controller->readEvent();
				break;
			case 'readUpdateEvent':
				$id = $tab['id'];
				$controller->readUpdateEvent($id);
				break;
			case 'updateEvent':
				$id = $tab['id'];
				$controller->updateEvent($id);
				break;
			case 'deleteEvent':
				$id = $tab['id'];
				$controller->deleteEvent($id);
				break;
			case 'readParticip':
				$controller->readParticip();
				break;
			case 'readUpdateParticip':
				$id = $tab['id'];
				$controller->readUpdateParticip($id);
				break;
			case 'updateParticip':
				$id = $tab['id'];
				$controller->updateParticip($id);
				break;
			case 'deleteParticip':
				$id = $tab['id'];
				$controller->deleteParticip($id);
				break;
			case 'readStat':
				$controller->readStat();
				break;
			case 'dashboard':
				$controller->dashboard();
				break;
			case 'readMail':
				$id = $tab['id'];
				$controller->readMail($id);
				break;
			case 'sendMail':
				$id = $tab['id'];
				$controller->sendMail($id);
				break;
			default:
				$controller->dashboard();
			break;
		}
	}

	if ($tab['page'] == "PublicController") {
		include_once 'controller/PublicController.php';
		$id = $tab['id'];
		$controller = new PublicController();
		switch ($action) {
			case 'readForm':
				$controller->readForm($id);
				break;
			case 'sendForm':
				$controller->sendForm($id);
				break;
			case 'readSatisfaction':
				$controller->readSatisfaction($id);
				break;
			case 'sendSatisfaction':
				$controller->sendSatisfaction($id);
				break;
			default:
			break;
		}
	}

	if ($tab['page'] == "LoginController") {
		include_once 'controller/LoginController.php';
		$controller = new LoginController();
		switch ($action) {
			case 'readLogin':
				$controller->readLogin();
				break;
			case 'sendLogin':
				$controller->sendLogin();
				break;
			case 'logout':
				$controller->logout();
				break;
			default:
			break;
		}
	}