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
    <h5>Créer un évènement</h5>
	<form action="index.php?<?php echo base64_encode('action=createEvent&page=AdminController')?>" method="post" id="add" enctype="multipart/form-data">
	<label for="name"></label>
	<input type="text" name="name" placeholder="Nom" size="100"><br /><br />
	<label for="desc"></label>
	<textarea rows="10" cols="100" name="desc" placeholder="Description"></textarea><br />
	<label for="date">Date : </label><input type="date" name="date"><br />
	<label for="dej">Y a t-il un déjeuner de prévu ?</label>
	<input type="radio" name="dej" value="oui">Oui      
	<input type="radio" name="dej" value="non">Non<br />
	<label for="din">Y'a t-il un dîner de prévu ?</label>
	<input type="radio" name="din" value="oui">Oui       
	<input type="radio" name="din" value="non">Non<br />
	<label for="nbr_atelier">Atelier(s) : </label>
	<input type="hidden" name="nbr_atelier" id="nbratelier"><br />
	<button id="plus" class="btn btn-default" type="button"> + </button>
	<button id="minus" class="btn btn-default" type="button"> - </button><br />
	<div id="atelier"></div>
	<label for="logo">Logo : </label><br />
	<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
	<input type="file" name="logo" id="logo" /><br /><br />
	<div id="erreur"></div>
</form>

	<fieldset class="gllpLatlonPicker">
    <input type="text" class="gllpSearchField" id="searchBox">
    <input type="button" class="gllpSearchButton" value="Rechercher">
	<div class="gllpMap">Google Maps</div>
	<input type="text" class="gllpLatitude" value="48" name="lat" form="add" />
	<input type="text" class="gllpLongitude" value="3" name="lon" form="add"/>
	<input type="text" size="40" class="gllpLocationName" name="address" form="add" />
	<input type="hidden" class="gllpZoom" value="5"/>
  	</fieldset>
	<br />

	<input type="submit" id="submit" form="add" value="Créer">
</div>

<script type="text/javascript">
	nbrAtelier = 0;
	$("#nbratelier").val(nbrAtelier);
	$('#plus').click(function(e) {
		e.preventDefault();
		nbrAtelier++;
		$("#nbratelier").val(nbrAtelier);
		$('#atelier').append('<div id="' + nbrAtelier + '"> Nom Atelier ' + nbrAtelier + ' : <br /><input type="text" name="nom_atelier' + nbrAtelier + '"></input> <br /> Description : <br /><textarea name="desc_atelier' + nbrAtelier + '"></textarea><br /></div>')
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