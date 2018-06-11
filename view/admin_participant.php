<?php
	include('view/partials/header.php');
?>
<script type="text/javascript" src="src/js/functions.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.header').nextUntil('tr.header').hide();
		$('.header').click(function(){
	    	$(this).nextUntil('tr.header').toggle();
	    	if ($('.arrow').html() == "▲"){
	    		$('.arrow').html() = "▼";
	    	} else if ($('.arrow').html() == "▼"){
	    		$('.arrow').html() == "▲";
	    	}
		});
	});

</script>
	<div class="contenue">
	<?php
		$i = 0;
		while ($data2 = $req->fetch()):
	?>
			<table>
				<tr class='header' id='<?= $data2['name_ev'] ?>'>
				<th colspan='5'><?= $data2['name_ev'] ?></th>
				<th class='arrow' colspan='1'>▲</th>
				<th colspan='5'>Nombre de réponses : <?= $nbr[$i]["nbr"] ?></th></tr>
			   	<tr> <th>Nom</th> <th>Prénom</th> <th>Fonction</th> <th>Téléphone</th> <th>Mail</th> <th>Participation?</th> <th>Dejeuné?</th>  <th>Diner?</th> <th>Disponibiilité</th> <th>Modifications</th></tr>
	<?php
			if(!empty($info[$i])):
			  	foreach ($info[$i] as $data):
	?>
					<tr> 
				    	<td><?= $data['name'] ?></td>
				    	<td><?= $data['lastname'] ?></td> 
				    	<td><?= $data['fonction'] ?></td> 
				    	<td><?= $data['tel'] ?></td> 
				    	<td><?= $data['mail'] ?></td> 
				    	<td><?= $data['particip'] ?></td>
				    	<td><?= $data['dej'] ?></td> 
				    	<td><?= $data['din'] ?></td> 
				        <td><?= $data['am'] ?> <?= $data['pm'] ?></td>

				    	<td> 
						<a href="index.php?<?= base64_encode("action=readUpdateParticip&page=AdminController&id=".$data['id']) ?>"><button class="btn btn-secondary btn-block">Modifier</button></a>
				    	<a href="index.php?<?= base64_encode("page=AdminController&id=".$data['id']."&action=deleteParticip") ?>"><button class="btn btn-danger confirmation btn-block">Supprimer</button></a> </td> 
				    	</td> 
				    </tr>
	<?php
				endforeach;
			endif;
	?>
			</table>
	<?php
		$i++;
		endwhile;
	?>
	</div>
	<script type="text/javascript" src="src/js/functions.js"></script>
</body>
</html>