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
		<?php $data = $req1; 
			  $data2 = $req2;
			  $id = $data['id'];
		?>
					<h5>Modifier les informations du participant : </h5>
			        <form action="index.php?<?= base64_encode("action=updateParticip&page=AdminController&id=".$id) ?>" method="post">
			        <label>Prenom : </label><input type="text" name="lastname" placeholder="Prenom" value="<?= $data['lastname'] ?>"><br />
                    <label>Nom : </label><input type="text" name="name" placeholder="Nom" value="<?= $data['name'] ?>"><br />
                    <label>Fonction : </label><input type="text" name="fonction" placeholder="fonction" value="<?= $data['fonction'] ?>"><br />
                    <label>Téléphone : </label><input type="text" name="tel" placeholder="telephone" value="<?= $data['tel'] ?>"><br />
                    <label>Mail : </label><input type="text" name="mail" placeholder="email" value="<?= $data['mail'] ?>"><br />
                    
					<?php
					if ($data['particip'] == "oui") {
					?>
		                    <input type="radio" id="part1" name="participe" value="oui" checked> <label for="oui">Je participerai à cet événement.</label> <br />
		                    <input type="radio" id="part2" name="participe" value="non"> <label for="non">Je ne participerai pas à cet événement.</label>
		            <?php
                	} else if ($data['particip'] == "non") {
		            ?>
		                    <input type="radio" id="part1" name="participe" value="oui"> <label for="oui">Je participerai à cet événement.</label> <br />
		                    <input type="radio" id="part2" name="participe" value="non" checked> <label for="non">Je ne participerai pas à cet événement.</label>
		            <?php
                    }
                    ?>
                    <div class="disponibilite">
                        <br /> <h3>Disponibilités :</h3><br />
                    <?php
                        if ($data['am'] == 'matin'):
                    ?>
                        	<input type="checkbox" id="hid" name="dispoam" value="matin" checked> Le matin <br />
                    <?php
                        else:
                    ?>
                        	<input type="checkbox" id="hid" name="dispoam" value="matin"> Le matin <br />
                    <?php
                        endif;

                        if ($data['pm'] == 'apres'):
                    ?>
                        	<input type="checkbox" id="hid" name="dispopm" value="apres" checked> L'après midi <br />
                    <?php
                        else:
                    ?>
                        	<input type="checkbox" id="hid" name="dispopm" value="apres"> L'après midi <br />
                    <?php
                        endif;
                        
                        if ($data2['dej'] == "oui"): 
	                ?>
	                        <br /> <h3>Dejeuner :</h4> <br />
	                <?php
	                        if ($data['dej'] == "oui"):
	                ?>
			                        <input type="radio" id="hid" name="dej" value="oui" checked> Je resterai pour le déjeuner <br />
			                        <input type="radio" id="hid" name="dej" value="non"> Je ne resterai pas pour le déjeuner <br />
			        <?php
			                elseif ($data['dej'] == "non"):
			        ?>
		                		<input type="radio" id="hid" name="dej" value="oui"> Je resterai pour le déjeuner <br />
		                        <input type="radio" id="hid" name="dej" value="non" checked> Je ne resterai pas pour le déjeuner <br />
			        <?php
		                	endif;

                        else: 
                    ?>
                    			<input type="hidden" id="hid" name="dej" value="non">
                    <?php
                        endif;

                        if ($data2['din'] == "oui"):
	                ?>
	                        <br /> <h3>Diner :</h4> <br />
	                <?php
	                        if ($data['din'] == "oui"):
		            ?>
		                        <input type="radio" id="hid" name="din" value="oui" checked> Je resterai pour le dîner <br />
		                        <input type="radio" id="hid" name="din" value="non"> Je ne resterai pas pour le dîner <br />
		            <?php
		                    elseif ($data['din'] == "non"):
		            ?>
		                        <input type="radio" id="hid" name="din" value="oui"> Je resterai pour le dîner <br />
		                        <input type="radio" id="hid" name="din" value="non" checked> Je ne resterai pas pour le dîner <br />
		            <?php
		                    endif;
    					else: 
                    ?>
                    			<input type="hidden" id="hid" name="din" value="non">
                    <?php
                        endif;
                    ?>
                    </div>
                        </article>
                        <div class="input">
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
	</div>



</body>
</html>