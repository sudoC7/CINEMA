<?php
	session_start();
	ob_start();

    $title = "Rôle personnage";
?>
    <!-- Affiche le nom du personnage -->
	<h2>LES FILMS DU PERSONNAGE : <?= $requeteRP['nomPerso'] ?></h2>

	<table>
		<thead>
			<tr>
				<th>LES FILMS</th>
				<th>ACTEUR</th>
			</tr>
		</thead>
		<tbody> 
			<!-- Affiche tous les films du role perso -->
			<?php foreach ($requeteFilmRolePerso as $film) { ?>
				<tr>
					<td><a href=""><?= $film["titre"] ?></a></td>
					<td><a href=""><?= $film["Acteur"] ?></a></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>


<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>