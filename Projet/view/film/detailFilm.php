<?php
	session_start();
	ob_start();

    $title = "Détails d'un film";
?>

<!-- Ici nous allons afficher le detail d'un film ( titre acteur reéalisateur role synopsis etc...)-->

<h2>DETAILS DU <?=  ?> </h2>
	<!-- Compte le nombre de realisateurs  -->

	<table>
		<thead>
			<tr>
				<th>TITRE</th>
				<th>SYNOPSIS</th>
				<th>NOTE</th>
				<th>DUREE</th>
				<th>anneeSortie</th>
				<th>REALISATEUR</th>
				<th>ACTEUR</th>
				<th>ROLE</th>
			</tr>
		</thead>
		<tbody>

			<!-- Affiche tous les films du tableau  -->
			<?php foreach ($requeteActeurs->fetch() as $acteur) { ?>
				<tr>
					<td><?= $acteur["titre"] ?></td>
					<td><?= $acteur["resumeFilm"] ?></td>
					<td><?= $acteur["noteFilm"] ?></td>
					<td><?= $acteur["duree"] ?></td>
					<td><?= $acteur["anneeSortie"] ?></td>
					<td><?= $acteur["realisateur"] ?></td>
					<td><?= $acteur["acteur"] ?></td>
					<td><?= $acteur["roleActeur"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>