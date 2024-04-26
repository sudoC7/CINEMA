<?php
	session_start();
	ob_start();

    $title = "Rôle personnage";
?>


	<h2>LES ROLES PERSONNAGE</h2>
	<!-- Compte le nombre de realisateurs  -->
	<p>Il y'a <?= $requeteRolePerso->rowCount(); ?> role personnage</p>

	<table>
		<thead>
			<tr>
				<th>Nom Personnage</th>
			</tr>
		</thead>
		<tbody>
			<!-- Affiche tous les réalisateurs du tableau -->
			<?php foreach ($requeteRolePerso->fetchAll() as $perso) { ?>
				<tr>
					<td><a href="index.php?action=detailRoleperso&id=<?= $perso["id_roleperso"] ?>"><?= $perso["nomPerso"] ?></a></td>
					<td><a href="index.php?action=suppRoleperso&id=<?= $perso["id_roleperso"] ?>"><input type="submit" name="submit" value="DELL"></a></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>