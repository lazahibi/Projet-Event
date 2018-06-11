<?php
	include('view/partials/header.php');
?>
<script type="text/javascript" src="src/js/functions.js"></script>
	<div class="contenue">
		<table>
	   	<tr> <th>Nom</th> <th>Description</th> <th>Date</th> <th>Déjeuner</th> <th>Diner</th> <th>Localisation</th> <th>Nbre d'ateliers</th>  <th>Logo</th> <th>Liens</th> <th>Modifications</th></tr>
	   <?php	while ($data = $req->fetch()): 
	   			$id = $data['id'];
	   			$logo = $data['logo'];
	   ?>
			    <tr> 
			    	<td><?= $data['name_ev'] ?></td>
			    	<td><p id="desc"><?= $data['desc_ev']?></p></td> 
			    	<td><?= date('d/m/Y',strtotime($data['date_ev']))?></td> 
			    	<td><?= $data['dej']?></td> 
			    	<td><?= $data['din']?></td> 
			    	<td><?= $data['address']?></td> 
			    	<td><?= $data['nbr_atelier']?></td> 
			    	<td> <img width="100" src="<?= $data['logo'] ?>"/></td>
			        <td> <a target="_blank" href="index.php?<?= base64_encode("page=PublicController&action=readForm&id=".$id)?>"> Formulaire<<i class="fa fa-external-link" aria-hidden="true"></i> </a> <br />
			        	 <a target="_blank" href="index.php?<?= base64_encode("page=PublicController&action=readSatisfaction&id=".$id)?>"> Satisfaction<i class="fa fa-external-link" aria-hidden="true"></i> </a> <br />

			    	<td> 
						<a href="index.php?<?= base64_encode("action=readUpdateEvent&page=AdminController&id=".$id)?>"><button class="btn btn-secondary btn-block">  Modifier  </button></a>
			    		<a href="index.php?<?= base64_encode('page=AdminController&id='.$id.'&file='.$logo.'&action=deleteEvent')?>"><button class="btn btn-danger btn-block confirmation">Supprimer</button></a> 
			        	<a href="index.php?<?= base64_encode("page=AdminController&action=readMail&id=".$id)?>"> <button class="btn btn-info btn-block">Invitations</button> </a></td>
			    	</td> 

			    </tr>
		<?php endwhile ?>
	</div>
	<script type="text/javascript" src="src/js/functions.js"></script>
</body>
</html>