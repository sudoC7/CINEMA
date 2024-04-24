<?php
	session_start();
	ob_start();

    $title = "Réalisateurs";
?>


	<h2>LES REALISATEURS</h2>
	<!-- Compte le nombre de realisateurs  -->
	<p>Il y'a <?= $requeteRealisateurs->rowCount(); ?> realisateurs</p>

	<table>
		<thead>
			<tr>
				<th>Realisateur</th>
				<th>Date Naissance</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les réalisateurs du tableau -->
			<?php foreach ($requeteRealisateurs->fetchAll() as $realisateur) { ?>
				<tr>
					<td><a href=""><?= $realisateur["Realisateur"] ?></a></td>
					<td><?= $realisateur["dateNaissanceReal"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>