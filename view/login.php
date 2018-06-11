<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="src/css/login.css">
	<title>Se connecter</title>
	</head>
</head>
<body>

    <div style="text-align:center;"> <img src="src/img/logoacademie.png"  width="250"/> </div>
<form class="block" action="index.php?<?php echo base64_encode('page=LoginController&action=sendLogin'); ?>" method="post" class="log">

	<h2 class="titre"><small>Connexion Administrateur :</small></h3>
	<table>
	<tr> <td> <input size="40" type="text" name="usr" placeholder="Nom d'utilisateur" autofocus> </td> </tr>
	<tr> <td> <input size="40" type="password" name="psw" placeholder="Mot de passe"> </td> </tr>
	</table>
	<input class="fr" type="submit" value="Se connecter"> <br />
</body>
</html>

