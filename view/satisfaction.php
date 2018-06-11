<?php include('view/partials/headerPublic.php'); ?>
	<title>Formulaire de satisfaction</title>
</head>
<body>
	<div class="contenaire">
<header>
            <div id="infos"> 
            <h1 class="titlesatisfaction">Indice de satisfaction</h1><br />
            </div>
            </header>
            <div class="presentation">
                <p>Vous avez participé dernièrement a l'evenement <?= $name ?> le <?= $date_ev ?> au <?= $address ?> </p>
            </div>


            <article>
                <form action="index.php?<?= base64_encode("action=sendSatisfaction&page=PublicController&id=".$id."") ?>" method="post">'
           <?php     $i=0;
                foreach ($at as $data):
                    $i++;
            ?>
                    		<h5>Atelier <?= $data['name_atelier'] ?></h5> 
                            <p><label><input type="radio" name="note<?= $i ?>" value="1"><span>1</span></label>
                            <label><input type="radio" name="note<?= $i ?>" value="2"><span>2</span></label>
                            <label><input type="radio" name="note<?= $i ?>" value="3"><span>3</span></label>
                            <label><input type="radio" name="note<?= $i ?>" value="4"><span>4</span></label>
                            <label><input type="radio" name="note<?= $i ?>" value="5"><span>5</span></label></p><br />
                            <input type="hidden" name="at<?= $i ?>" value="<?= $data["id"] ?>">
            <?php 
        		endforeach;
        	?>
            	<input type="hidden" name="nbrAtelier" value="<?= $i ?>">
             <h5>Note générale</h5>
             <p><label><input type="radio" name="notegeneral" value="1"><span>1</span></label>
             <label><input type="radio" name="notegeneral" value="2"><span>2</span></label>
             <label><input type="radio" name="notegeneral" value="3"><span>3</span></label>
             <label><input type="radio" name="notegeneral" value="4"><span>4</span></label>
             <label><input type="radio" name="notegeneral" value="5"><span>5</span></label></p><br />
            </article>
                        <div class="input">
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
</article>
</div>
</html>