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
	<p><a href="index.php?action=detailRealisateur&id=<?=$requeteFilmtitre["id_realisateur"]?>"><?= $requeteFilmtitre["Realisateur"] ?></a></p>

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
					<td><a href="index.php?action=detailActeur&id=<?= $film["id_acteur"]?>"><?= $film["acteur"] ?></a></td>
					<td><a href="index.php?action=detailRolePerso&id=<?= $film["id_role_personnage"]?>"><?= $film["roleActeur"] ?></a></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>