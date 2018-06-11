<?php
  include('view/partials/header.php');
?>
<head>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDfNKKTWKwxWhf1DCELpzYyK_KPQjqSQi4&sensor=false&libraries=places"></script>
    </script>
    <script src="src/js/jquery-gmaps-latlon-picker.js"></script>
	<link rel="stylesheet" type="text/css" href="src/css/jquery-gmaps-latlon-picker.css"/>
</head>
<body>
<div class="contenue">
			<h5>Modifier l'évènement : </h5>
			<?php  $data = $req1;
				  $id = $data['id'];
			?>
			<form action='index.php?<?= base64_encode('page=AdminController&action=updateEvent&id='.$id) ?>' method='post' id='mod' enctype='multipart/form-data'>
			<label for='name'></label>
			<input type='text' name='name' placeholder='Nom' size='100' value='<?= $data['name_ev'] ?>'><br /><br />
			<label for='desc'></label>
			<textarea rows='10' cols='100' name='desc'><?= $data['desc_ev'] ?></textarea><br />
			<label for='date'>Date : </label><input type='date' name='date' value='<?= $data['date_ev'] ?>'><br />

			<label for='dej'>Y a t-il un déjeuner de prévu ?</label>

			<?php if ($data['dej'] == 'oui'): ?>
				<input type="radio" name="dej" value="oui" checked>Oui
				<input type="radio" name="dej" value="non">Non<br />
			<?php else: ?>
				<input type="radio" name="dej" value="oui">Oui
				<input type="radio" name="dej" value="non" checked>Non<br />
			<?php endif ?>
			<label for='din'>Y'a t-il un dîner de prévu ?</label>

			<?php if ($data['din'] == 'oui'): ?>
				<input type="radio" name="din" value="oui" checked>Oui
				<input type="radio" name="din" value="non">Non<br />
			<?php else: ?>
				<input type="radio" name="din" value="oui">Oui
				<input type="radio" name="din" value="non" checked>Non<br />
			<?php endif ?>
			<label for='nbr_atelier'>Atelier(s) : </label>
			<input type='hidden' name='nbr_atelier' id='nbratelier' value='<?= $data['nbr_atelier'] ?>'><br />
			<button id='plus' type='button' class='btn btn-default'> + </button>
			<button id='minus' type='button' class='btn btn-default'> - </button><br />
			<div id='atelier'>
			<?php $i = 1;
			foreach ($req2 as $data2): ?>
				<div id="<?= $i ?>"> name Atelier <?= $i ?> : <br /><input type="text" name="name_atelier<?= $i ?>" value="<?= $data2['name_atelier'] ?>"></input> <br /> Description : <br /><textarea name="desc_atelier<?= $i ?>"><?= $data2['desc_atelier'] ?></textarea><br /></div>';
			<?php $i++;
			endforeach ?>
			</div>
			<label for='logo'>Logo : </label><img width='100' src='<?= $data['logo'] ?>'><br />
			<input type='hidden' name='oldlogo' value='<?= $data['logo'] ?>'>
			<input type='hidden' name='MAX_FILE_SIZE' value='5242880' />
			<input type='file' name='logo' id='logo' /><br /><br />
			<div id='erreur'></div>
			</form>

			<fieldset class='gllpLatlonPicker'>
		    <input type='text' id='searchBox' class='gllpSearchField'>
		    <input type='button' class='gllpSearchButton' value='Rechercher'>
			<div class='gllpMap'>Google Maps</div>
			<input type='hidden' class='gllpLatitude' value='<?= $data['lat'] ?>' name='lat' form='mod' />
			<input type='hidden' class='gllpLongitude' value='<?=  $data['lon'] ?>' name='lon' form='mod'/>
			<input type='text' size='40' class='gllpLocationName' name='address' value='<?= $data['address'] ?>' form='mod' />
			<input type='hidden' class='gllpZoom' value='10'/>
			<input type='hidden' form='mod' name='id' value='<?= $id ?>'>
		  	</fieldset>
			<br />

			<input type='submit' form='mod' value='Modifier'>
</div>
<script type="text/javascript">
	nbrAtelier = $("#nbratelier").val();
	$('#plus').click(function(e) {
		e.preventDefault();
	nbrAtelier++;
	$("#nbratelier").val(nbrAtelier);
	$('#atelier').append('<div id="' + nbrAtelier + '"> name Atelier ' + nbrAtelier + ' : <br /><input type="text" name="name_atelier' + nbrAtelier + '"></input> <br /> Description : <br /><textarea name="desc_atelier' + nbrAtelier + '"></textarea><br /></div>')
	});
	$('#minus').click(function(e) {
		e.preventDefault();
		$('#' + nbrAtelier).remove();
		nbrAtelier--;
		$("#nbratelier").val(nbrAtelier);
	});

	$('#logo').bind('change', function() {
		if (this.files[0].size >= 3242880) {
			$('#erreur').append("<p style='color:red'>Fichier trop volumineux(Max 5mo)");
			$('#submit').hide();
		} else {
			$('#erreur').empty();
			$('#submit').show();
		}
	});
	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchBox'));
</script>
</body>
</html>