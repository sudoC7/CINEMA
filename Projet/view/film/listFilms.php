<?php
	session_start();
	ob_start();

    $title = "Films";

?>
	<h2>LES FILMS</h2>
	<!-- Compte le nombre de realisateurs  -->
	<p>On a <?= $requeteFilms->rowCount() ?> films</p>
	

	<table>
		<thead>
			<tr>
				<th>TITRE</th>
				<th>ANNEE SORTIE</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les films du tableau  -->
			<?php foreach ($requeteFilms->fetchAll() as $film) { ?>

				<tr> <!-- ajout de liens pour detailFilm.php ... -->
					<td><a href="index.php?action=detailFilm&id=<?= $film["id_film"]; ?>"><?= $film["titre"] ?></a></td>
					<td><?= $film["anneeSortie"] ?></td>
				</tr>
																																
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>