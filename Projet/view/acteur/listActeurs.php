<?php
	session_start();
	ob_start();

    $title = "Acteurs";
?>


<h2>LES ACTEURS</h2>
	<!-- Compte le nombre de realisateurs  -->
	<p>On a <?= $requeteActeurs->rowCount() ?> acteurs</p>

	<table>
		<thead>
			<tr>
				<th>Acteur</th>
				<th>Sexe</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les acteurs du tableau  -->
			<?php foreach ($requeteActeurs->fetchAll() as $acteur) { ?>
				<tr>
					<td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"]; ?>"><?= $acteur["Acteur"] ?></a></td>
					<td><?= $acteur["sexe"] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>