<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/b5122a116b.js"></script>
	<script src="src/js/jquery-2.1.1.min.js"></script>
	 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfNKKTWKwxWhf1DCELpzYyK_KPQjqSQi4&callback=initMap">
    </script>
	<link rel="stylesheet" type="text/css" href="src/css/jquery-gmaps-latlon-picker.css"/>
    <link rel="stylesheet" type="text/css" href="src/css/styleadmin.css">
	<title>Espace Administrateur - <?= $title ?></title>
</head>
<body>


	<nav>
		<h5>Espace Administrateur</h5>

		<ul id="menu">
			<a href="index.php?<?php echo base64_encode('page=AdminController&action=dashboard'); ?>"><li id="home"> <i class="fa fa-home fa-2x" aria-hidden="true" style="float:left"></i>Général</li></a>
			<a href="index.php?<?php echo base64_encode('page=AdminController&action=readEvent'); ?>"><li id="event"><i class="fa fa-table fa-2x" aria-hidden="true" style="float:left"></i>Evenements</li></a>
			<a href="index.php?<?php echo base64_encode('page=AdminController&action=readCreateEvent'); ?>"><li id='create' class="sousmenu">Créer un Evenement</li></a>
			<a href="index.php?<?php echo base64_encode('page=AdminController&action=readParticip'); ?>"><li id="part"><i class="fa fa-users fa-2x" aria-hidden="true" style="float:left"></i>Participants</li></a>
			<a href="index.php?<?php echo base64_encode('page=AdminController&action=readStat'); ?>"><li id="stats"><i class="fa fa-bar-chart fa-2x" aria-hidden="true" style="float:left"></i>Statistiques</li></a>
		</ul>
		<ul id="deco">
			<a href="index.php?<?php echo base64_encode('page=LoginController&action=logout'); ?>"><li>Se déconnecter</li></a>
		</ul>
	</nav>

	<script type="text/javascript">
		if ($(location).attr('href') == "http://localhost/seminaire_mvc/index.php?<?php echo base64_encode('page=AdminController&action=dashboard'); ?>" || $(location).attr('href') == "http://localhost/seminaire_mvc/index.php") {
			$('#home').attr('id', 'select');
		} else if ($(location).attr('href') == "http://localhost/seminaire_mvc/index.php?<?php echo base64_encode('page=AdminController&action=readEvent'); ?>") {
			$('#event').attr('id', 'select');
		} else if ($(location).attr('href') == "http://localhost/seminaire_mvc/index.php?<?php echo base64_encode('page=AdminController&action=readParticip'); ?>") {
			$('#part').attr('id', 'select');
		} else if ($(location).attr('href') == "http://localhost/seminaire_mvc/index.php?<?php echo base64_encode('page=AdminController&action=readStat'); ?>") {
			$('#stats').attr('id', 'select');
		} else if ($(location).attr('href') == "http://localhost/seminaire_mvc/index.php?<?php echo base64_encode('page=AdminController&action=readCreateEvent'); ?>") {
			$('#event').attr('id', 'select');
			$('#create').attr('id', 'select');
		}
	</script>
	