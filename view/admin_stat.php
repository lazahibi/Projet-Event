<?php
	include('view/partials/header.php');
?>
<script type="text/javascript" src="src/js/functions.js"></script>
	<div class="contenue">
		<table>
        <tr> <th>Logo</th> <th>Nom</th> <th>Date</th><th>Nombre de participants</th><th>nbr couverts déjeuné</th><th>nbr couverts diner</th><th>Moyenne donnée</th></tr>
    <?php
    	$i = 0;
        while ($data = $req->fetch()):
    ?>
        <tr> 
            <td> <img width="100" src="<?= $data['logo'] ?>"/></td>
            <td><?= $data['name_ev'] ?></td>
            <td><?= date('d/m/Y',strtotime($data['date_ev'])) ?></td> 
            <td><?= $participant[$i][0] ?> ( / <?= $maxParticipant[$i][0] ?> réponse(s) )</td>
            <td><?= $nbrDej[$i][0] ?></td>
            <td><?= $nbrDin[$i][0] ?></td>
            <td><?= $avg[$i][0] ?> (<?= $nbrNote[$i][0] ?>)</td>
        </tr>
    <?php
    	$i++;
    	endwhile;
    ?>
	</div>
</body>
</html>