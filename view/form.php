<?php include('view/partials/headerPublic.php'); ?>
	<title>Evenement - <?= $name ?></title>
</head>
<body>
    <div class="contenaire">
<header>
        <div id="infos"> 
            <?php 
                if ($req['date'] > date('Y-m-d') ):
            ?>
            <h1><?= $name ?></h1><br />
                <h5><?= $date_ev ?>' <br /> '<?= $address ?>'</h5> 
            </div>
            <?php  
                list($width, $height) = getimagesize($logo);
                if($width > $height): 
            ?>
                <img src="<?= $logo ?>" height="100">
            <?php 
                else: 
            ?>
                <img src="<?= $logo ?>" width="100">
            <?php 
                endif; 
            ?>

            </header>
            <div class="presentation">
                <p>'<?= $desc ?>'</p>
            </div>
           <div id="map"></div>
            <script>
              function initMap() {
                var uluru = {lat: <?= $lat ?>, lng: <?= $lon ?>};
                var map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 15,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
              }
            </script>


            <article>
                <form class="col s12" action="index.php?<?= base64_encode("action=sendForm&page=PublicController&id=".$id) ?>" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                          <input id="first_name" name="lastname" type="text" class="validate">
                          <label for="first_name">Prénom</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="last_name" name="name" type="text" class="validate">
                          <label for="last_name">Nom</label>
                        </div>
                    </div>
                    <div class="input-field">
                    <input type="text" name="fonction">
                    <label for="fonction">Fonction</label>
                    </div>

                    <div class="input-field">
                    <input type="text" name="mail" class="input-field">
                    <label for="mail">Adresse mail</label>
                    </div>

                    <div class="input-field">
                    <input type="text" name="tel" class="input-field">
                    <label for="tel">Numéro téléphone</label>
                    </div>
                    
                    <p>
                        <label>
                            <input type="radio" id="part1" name="participation" value="oui"> <span>Je participerai à cet événement.</span>
                        </label>
                    </p>
                    <p>
                        <label>
                    <input type="radio" id="part2" name="participation" value="non"> <span>Je ne participerai pas à cet événement.</span>
                        </label>
                    </p>
                    <div class="disponibilite">
                        <br /> <h3>Disponibilités :</h3><br />
                        <p><label><input type="checkbox" id="hid" name="dispoam" value="matin"> <span>Le matin</span></label></p>
                        <p><label><input type="checkbox" id="hid" name="dispopm" value="apres midi"> <span>Laprès midi</span></label></p>
                        <?php 
                        if ($dej == "oui"): 
                        ?>
                        <br /> <h3>Dejeuner :</h3> <br />
                        <p><label><input type="radio" id="hid" name="dej" value="oui"> <span>Je resterai pour le déjeuner</span></label></p>
                        <p><label><input type="radio" id="hid" name="dej" value="non"><span>Je ne resterai pas pour le déjeuner</span></label></p>
                        <?php
                        else :?> <input type="hidden" id="hid" name="dej" value="non">
                        <?php
                        endif;
                        if ($din == "oui"):
                        ?>
                        <br /> <h3>Diner :</h3> <br />
                        <p><label><input type="radio" id="hid" name="din" value="oui"> <span>Je resterai pour le dîner</span></label></p>
                        <p><label><input type="radio" id="hid" name="din" value="non"> <span>Je ne resterai pas pour le dîner</span></label></p>
                        <?php
                        else: ?> <input type="hidden" id="hid" name="din" value="non"> <?php
                        endif;
                        ?>
                    </div>
                        </article>
                        <div class="input">
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
            </article>
        </div>

   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfNKKTWKwxWhf1DCELpzYyK_KPQjqSQi4&callback=initMap">
    </script>
            <?php
                 else:
            ?>
                 <h3 align="center">Cet évenement est passé !</h3>
            <?php                      
                endif;
            ?>
</body>

</html>