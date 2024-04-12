<?php
	session_start();
	ob_start();

    $title = "Films";
?>

	<p>On a <?= $requeteFilms->rowCount() ?> films</p>

	<table>
		<thead>
			<tr>
				<th>TITRE</th>
				<th>ANNEE SORTIE</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($requeteFilms->fetchAll() as $film) { ?>
				<tr>
					<td><?= $film["titre"] ?></td>
					<td><?= $film["anneeSortie"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>