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
			<?php foreach ($requeteFilm as $film) { ?>
				<tr>
					<td><?= $film["titre"] ?></td>
					<td><?= $film["resumeFilm"] ?></td>
					<td><?= $film["noteFilm"] ?></td>
					<td><?= $film["duree"] ?></td>
					<td><?= $film["anneeSortie"] ?></td>
					<td><?= $film["realisateur"] ?></td>
					<td><?= $film["acteur"] ?></td>
					<td><?= $film["roleActeur"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>