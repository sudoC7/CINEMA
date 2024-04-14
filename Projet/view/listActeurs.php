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
				<th>Nom</th>
				<th>Prenom</th>
				<th>Sexe</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les films du tableau  -->
			<?php foreach ($requeteActeurs->fetchAll() as $acteur) { ?>
				<tr>
					<td><?= $acteur["nom"] ?></td>
					<td><?= $acteur["prenom"] ?></td>
					<td><?= $acteur["sexe"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>