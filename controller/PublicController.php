<?php
	include_once('model/ModelForm.php');
	include_once('model/ModelSatisfaction.php'); 
	class PublicController {
		public function readForm($id) 
		{
	        $list = new ModelForm;
	        $req = $list->readForm($id);
	        $date_d = explode("-",$req['date']);
	    	if ($date_d[1] < 10) {
	    		$date_mois = trim($date_d[1], "0");
	    	}
	    	$mois = array("janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
	    	$date_ev = "Le " . $date_d[2] . " " . $mois[$date_mois] . " " . $date_d[0];
	        $name = $req['name'];
	        $desc = $req['desc'];
	        $dej = $req['dej'];
	        $din = $req['din'];
	        $lat = $req['lat'];
	        $lon = $req['lon'];
	        $nbrAtelier = $req['nbrAtelier'];
	        $logo = $req['logo'];
	        $date_ev = $date_ev;
	        $address = $req['address'];
	    	return include('view/form.php');
		}

		public function sendForm($id) 
		{
	        if ($_POST['participation'] == "non"){
	            $_POST['dej'] = "non";
	            $_POST['din'] = "non";
	            $_POST['dispoam'] = "/";
	            $_POST['dispopm'] = "/";
	        }
	        if (!isset($_POST['dispoam']))
	        {
	            $_POST['dispoam'] = "/";
	        }

	        if (!isset($_POST['dispopm']))
	        {
	            $_POST['dispopm'] = "/";
	        }
	        $send = new ModelForm; 
	        $send->sendForm($id);
	        return include('view/success.php');
		}

		public function readSatisfaction($id)
		{
	        if (isset($_COOKIE[$id]))
	        {
	        	return include ('view/error.php');
	       	} else {

	            $list = new ModelSatisfaction;
	            $req = $list->readFormSatisfaction($id);
	            $date_d = explode("-",$req['date']);
		        if ($date_d[1] < 10) {
		            $date_mois = trim($date_d[1], "0");
		        }
		        $mois = array("janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");

		        $date_ev = "Le " . $date_d[2] . " " . $mois[$date_mois] . " " . $date_d[0];
		       	$name = $req['name'];
		        $nbrAtelier = $req['nbrAtelier'];
		        $logo = $req['logo'];
		        $address = $req['address'];
		        $at = $req['req'];
		        $id = $req['id'];
		        return include('view/satisfaction.php');
	        }
		}

		public function sendSatisfaction($id)
		{	
	        $send = new ModelSatisfaction; 
	        $send->sendFormSatisfaction($id);
	        setcookie(
	          $id,
	          1,
	          time() + (10 * 365 * 24 * 60 * 60)
	        );
	        return include('view/success.php');
		}
	}