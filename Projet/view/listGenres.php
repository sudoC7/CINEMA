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
					<td><?= $genre["genreFilm"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>