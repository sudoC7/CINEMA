<?php
	session_start();
	ob_start();

    $title = "Détails d'un film";
?>

<!-- Ici nous allons afficher le detail d'un film ( titre acteur reéalisateur role synopsis etc...)-->

<h2>DETAILS DU film : <?= $requeteFilmtitre["titre"] ?> </h2>
	<!-- Compte le nombre de realisateurs  -->
	<p><b>SYNOPSIS :</b></p>
	<p><?= $requeteFilmtitre["resumeFilm"] ?></p>
	<p><b>NOTE :</b></p>
	<p><?= $requeteFilmtitre["noteFilm"] ?></p>
	<p><b>DUREE :</b></p>
	<p><?= $requeteFilmtitre["duree"] ?> (min)</p>
	<p><b>ANNEE SORTIE :</b></p>
	<p><?= $requeteFilmtitre["anneeSortie"] ?></p>
	<p><b>REALISATEUR :</b></p>
	<p><a href=""><?= $requeteFilmtitre["Realisateur"] ?></a></p>

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
					<td><a href=""><?= $film["acteur"] ?></a></td>
					<td><a href=""><?= $film["roleActeur"] ?></a></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>