<?php
	session_start();
	ob_start();

    $title = "Détails d'un réalisateur";
?>

<h2> DETAIL DU REALISATEUR : <?= $requeteRealisateur["Realisateur"] ?></h2>


    <table>
		<thead>
			<tr>
				<th>FILM</th>
				<th>ANNEE SORTIE</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les réalisateurs du tableau -->
			<?php foreach ($requeteDetailRealisateur as $realisateur) { ?>
				<tr>
					<td><a href="index.php?action=detailFilm&id=<?= $realisateur["id_film"]?>"><?= $realisateur["titre"] ?></a></td>
					<td><?= $realisateur["anneeSortie"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>





<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>


