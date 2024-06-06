<?php
	session_start();
	ob_start();

    $title = "Détails d'un acteur";
?>


<h2>DETAIL de l'ACTEUR  : <?= $requeteActeur1["Acteur"] ?></h2>

    <table>
		<thead>
			<tr>
				<th>FILM</th>
				<th>ROLE PERSONNAGE</th>
				<th>ANNEE DE SORTIE </th>
			</tr>
		</thead>
		<tbody>
                <tr>
			<!-- Affiche tous les films du tableau -->
                <?php foreach ($requeteActeur as $acteur1) { ?>
                    <!-- mettre le lien pour être dirigé vers le detailFilm.php ???? ???? ???? ???? -->
                    <!-- mettre le lien pour être dirigé vers le detailRoleperso.php ???? ???? ???? ???? -->
                    <td><a href="index.php?action=detailFilm&id=<?=$acteur1["id_acteur"]?>"><?= $acteur1["titre"] ?></a></td>
                    <td><a href="index.php?action=detailRoleperso&id=<?= $acteur1["id_acteur"] ?>"><?= $acteur1["nomPerso"] ?></a></td>
                    <td><?= $acteur1["anneeSortie"] ?></td>
                </tr>
		        <?php }	?>
		</tbody>
	</table>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>