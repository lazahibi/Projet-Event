<?php
	session_start();	
		//var_dump(parse_url($_SERVER['REQUEST_URI']));
	$temp = parse_url($_SERVER['REQUEST_URI']);
	if (array_key_exists('query', $temp)) {
		$temp = base64_decode($temp['query']);
		parse_str($temp, $tab);
	} else {
		$tab['page'] = 'AdminController'; 
		$action = '';
	}

	if (!empty($tab['page']) && is_file('controller/'.$tab['page'].'.php')){
		if (!empty($tab['action'])) {
			$action = $tab['action'];
		} else {
			$action = 'dashboard';
		}
	}
	
	include_once 'src/router.php';
