<?php
	include('view/partials/header.php');
?>
<script type="text/javascript" src="src/js/functions.js"></script>
	<div class="contenue">
		<h5>Envoie d'invitations par mail : </h5>
		<form action='index.php?<?= base64_encode('page=AdminController&action=sendMail&id='.$id) ?>' method='post'>
			<label>Destinataires (séparé par des virgules) : </label><br /><input type="text" name="to" size="100"><br />
			<label>Message : </label><br />
			Bonjour, <br />
			<textarea name="msg" rows="8" cols="100">Vous ètes invité(e) à l'evenement <?= $name ?> qui se déroulera <?= $date_ev ?> au <?= $address ?></textarea><br />
			<input type="submit" name="Envoyer">
		</form>
	</div>
</body>
</html>