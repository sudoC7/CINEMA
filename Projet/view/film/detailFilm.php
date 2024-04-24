<?php
	session_start();
	ob_start();

    $title = "Détails d'un film";
?>

<!-- Ici nous allons afficher le detail d'un film ( titre acteur reéalisateur role synopsis etc...)-->

<h2>DETAILS DU film : <?= $requeteFilmtitre["titre"] ?> </h2>
	<!-- Compte le nombre de realisateurs  -->
	<p><?= $requeteFilmtitre["resumeFilm"] ?></p>
	<p><?= $requeteFilmtitre["noteFilm"] ?></p>
	<p><?= $requeteFilmtitre["duree"] ?></p>
	<p><?= $requeteFilmtitre["anneeSortie"] ?></p>
	<p><?= $requeteFilmtitre["Realisateur"] ?></p>

	<table>
		<thead>
			<tr>
				<th>ACTEUR</th>
				<th>ROLE</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les films du tableau  -->
			<?php foreach ($requeteFilm as $film) { ?>
					<tr>
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