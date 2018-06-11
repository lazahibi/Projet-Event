<?php
	include_once('../db/connect.php');
    $cnx = new connect;
    $pdo = $cnx->setConnexion();
    $req = $pdo->query('SELECT id, nom_ev, date_ev, adresse FROM liste_seminaire WHERE date_ev + 1 = CURDATE()');

    while ($donnees = $req->fetch()){
    	$mail = array();
    	$nom = array();
		$id = $donnees['id'];
		$req2 = $pdo->prepare('SELECT id, id_seminaire, nom, prenom, mail, participe FROM participant WHERE id_seminaire=:value AND participe = "oui"');
        $req2->bindParam(':value', $id, PDO::PARAM_INT);
        $req2->execute();
        while ($donnees2 = $req2->fetch()){
        	array_push($mail, $donnees2['mail']);
        }

	     $list = implode(",", $mail);
		 echo $list, '<br />';
		 $to      = $list;
	     iconv_set_encoding("internal_encoding", "UTF-8");
	     $subject = 'Votre avis nous intérèsse';
	     include('../../view/partials/template_mail_satisfaction.php');
	     $headers = 'From: webmaster@ac-dijon.fr' . "\r\n" .
	     'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
	     'X-Mailer: PHP/' . phpversion();
	     mail($to, utf8_decode($subject), utf8_decode($message), $headers);
    }

