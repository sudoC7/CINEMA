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
					<td><a href="index.php?action=detailRealisateur&id=<?= $realisateur['id_realisateur'] ?>"><?= $realisateur["Realisateur"] ?></a></td>
					<td><?= $realisateur["dateNaissanceReal"] ?></td>
					<td><a href="index.php?action=suppRealisateur&id=<?= $realisateur['id_realisateur'] ?>"><input type="submit" name="submit" value="DELL"></a></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>