<?php
	session_start();
	ob_start();

    $title = "Réalisateurs";
	var_dump($requeteRealisateurs);
?>


	<h1>LES REALISATEURS</h1>

	<table>
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Date Naissance</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($requeteRealisateurs->fetchAll() as $realisateur) { ?>
				<tr>
					<td><?= $realisateur["nomReal"] ?></td>
					<td><?= $realisateur["prenomReal"] ?></td>
					<td><?= $realisateur["dateNaissanceReal"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>