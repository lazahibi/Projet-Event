<?php
	include_once('model/ModelEvent.php');
	include_once('model/ModelParticipant.php');
	include_once('model/ModelStat.php');
	include_once('model/ModelAdmin.php');
	include_once('model/ModelMail.php');
	class AdminController {

		public function readCreateEvent() 
		{
			$title = "Ajout d'un évenement";
			include('view/admin_add_evenement.php');
		}

		public function createEvent()
		{
			if (!empty($_POST)){
				$id = rand(1, 999999);
				$namefile = "src/img/logos/$id.jpg";
				$res = move_uploaded_file($_FILES['logo']['tmp_name'],$namefile);
				$create = new ModelEvent; 
				$create->create($namefile);
				return header('location: index.php?'.base64_encode('page=AdminController&action=readEvent'));
			}
		}

		public function readEvent() 
		{
			$title = "Liste des évenements";
			$list = new ModelEvent;
			$req = $list->read();
			return include('view/admin_evenement.php');
		}

		public function readUpdateEvent($id) 
		{
			$title = "Modification d'un évenement";
			$list = new ModelEvent;
			$req = $list->readEdit($id);
			$req1 = $req['req1'];
			$req2 = $req['req2'];
			return include('view/admin_evenement_mod.php');
		}

		public function updateEvent($id)
		{
			$n = rand(1, 999999);
			$namefile = "src/img/logos/$n.jpg";
			$resultat = move_uploaded_file($_FILES['logo']['tmp_name'],$namefile);
		if (empty($_FILES['logo']['name'])) 
			{$namefile = $_POST['oldlogo'];}
			$edit = new ModelEvent;
			$req = $edit->update($id, $namefile);
			return header('location: index.php?'.base64_encode('page=AdminController&action=readEvent'));
		}

		public function deleteEvent($id)
		{
			$del = new ModelEvent;
			$req = $del->delete($id);
			unlink($file);
			return header('location: index.php?'.base64_encode('page=AdminController&action=readEvent'));
		}

		public function readParticip() 
		{
			$title = "Liste de participants";
			$list = new ModelParticipant;
			$return = $list->read();
			$req = $return['res'];
			$info = $return['info'];
			$nbr = $return['nbr'];
			return include('view/admin_participant.php');
		}

		public function readUpdateParticip($id) 
		{
			$title ="Modification info participant";
			$list = new ModelParticipant;
			$req = $list->readEdit($id);
			$req1 = $req['1'];
			$req2 = $req['2'];
			return include('view/admin_particip_mod.php');
		}

		public function updateParticip($id)
		{
			$edit = new ModelParticipant;
			$req = $edit->update($id);
			return header('location: index.php?'.base64_encode("page=AdminController&action=readParticip"));
		}

		public function deleteParticip($id)
		{
			$del = new ModelParticipant;
			$req = $del->delete($id);
		    return header('location: index.php?'.base64_encode("page=AdminController&action=readParticip"));
		}

		public function readStat()
		{
			$title = "Statistiques";
	        $list = new ModelStat;
			$return = $list->read();
			$req = $return['res'];
			$maxParticipant = $return['maxParticipant'];
			$participant = $return['participant'];
			$avg = $return['avg'];
			$nbrNote = $return['nbrNote'];
			$nbrDej = $return['nbrDej'];
			$nbrDin = $return['nbrDin'];
			return include('view/admin_stat.php');
		}

		public function dashboard()
		{
			$title = "Général";
			$nextEv = new Admin;
			$req2 = $nextEv->nextEv();
			$dateEv = $req2['dateEv'];
			$nextEv = $req2['nextEv'];
			$particip = $req2['particip'];
			$calendar = new Admin;
			$req = $calendar->calendar();
			include('view/admin.php');
		}

		public function readMail($id)
		{
			$title = "Evnoie invitation par mail";
			$mail = new ModelMail;
			$req = $mail->readMail($id);
			$date_d = explode("-",$req['date']);
	    	if ($date_d[1] < 10) {
	    		$date_month = trim($date_d[1], "0");
	    	}
	    	$month = array("janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
	    	$date_ev = "le " . $date_d[2] . " " . $month[$date_month] . " " . $date_d[0];
	    	$name = $req['name'];
	    	$address = $req['address'];
			return include('view/mail.php');
		}
		public function sendMail()
		{
		  	 $to      = $_POST['to'];
		     iconv_set_encoding("internal_encoding", "UTF-8");
		     $subject = 'Invitation à un évenement - l\'Académie de Dijon';
		     include('view/partials/template_mail.php');
		     $headers = 'From: webmaster@ac-dijon.fr' . "\r\n" .
		     'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		     'X-Mailer: PHP/' . phpversion();
		     mail($to, utf8_decode($subject), utf8_decode($message), $headers);
		}
	}
?>