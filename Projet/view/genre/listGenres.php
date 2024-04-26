<?php
	session_start();
	ob_start();

    $title = "Genre";
?>


<h2>LES CATEGORIES</h2>
	<!-- Compte le nombre de catégories du tableau  -->
	<p>On a <?= $requeteGenres->rowCount() ?> catégories</p>

	<table>
		<thead>
			<tr>
				<th>Genres</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les genres du tableau  -->
			<?php foreach ($requeteGenres->fetchAll() as $genre) { ?>
				<tr>
					<td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["genreFilm"] ?></a></td>
					<td><a href="index.php?action=suppGenre&id=<?= $genre["id_genre"] ?>"><input type="submit" name="submit" value="DELL"></a></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>