<?php
	session_start();
	ob_start();

    $title = "Genre";
?>


<h2>LES FILMS DU CATEGORIE :  <?= $requeteGenre['genreFilm'] ?></h2>
	<!-- Compte le nombre de catégories du tableau  -->

	<table>
		<thead>
			<tr>
				<th>LISTE FILMS</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les genres du tableau  -->
			<?php foreach ($requeteGenreFilms as $film) { ?>
				<tr>
					<td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>