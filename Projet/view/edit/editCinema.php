<?php
	session_start();
	ob_start();

    $title = "Edit Cinema";

	//Dans cette page nous allons pouvoir ajouter et supprimer les films 
?>

	<table>
		<thead>
			<tr>
				<th>FILM</th>
				<th>ACTEUR</th>
				<th>GENRE</th>
				<th>REALISATEUR</th>
				<th>ROLE PERSONNAGE</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les films du tableau  -->
			<?php foreach ($requeteFilmsEdit->fetchAll() as $film) { ?>
				<tr>
					<td><a href="index.php?action=detailFilm&id=<?= $film["id_film"]; ?>"><?= $film["titre"] ?></a></td>
				</tr>
			<?php } ?>
			<?php foreach ($requeteActeursEdit->fetchAll() as $acteur) { ?>
				<tr>
					<td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"]; ?>"><?= $acteur["Acteur"] ?></a></td>
				</tr>
			<?php } ?>
			<?php foreach ($requeteGenresEdit->fetchAll() as $genre) { ?>
				<tr>
					<td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"]; ?>"><?= $genre["genreFilm"] ?></a></td>
				</tr>
			<?php } ?>
			<?php foreach ($requeteRealisateursEdit->fetchAll() as $realisateur) { ?>
				<tr>
					<td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"]; ?>"><?= $realisateur["Realisateur"] ?></a></td>
				</tr>
			<?php } ?>
			<?php foreach ($requeteRolePersoEdit->fetchAll() as $roleperso) { ?>
				<tr>
					<td><a href="index.php?action=detailRoleperso&id=<?= $roleperso["id_roleperso"]; ?>"><?= $roleperso["nomPerso"] ?></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>