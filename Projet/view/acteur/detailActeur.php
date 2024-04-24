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
                    <td><?= $acteur1["titre"] ?></td>
                    <td><?= $acteur1["nomPerso"] ?></td>
                    <td><?= $acteur1["anneeSortie"] ?></td>
                </tr>
		        <?php }	?>
		</tbody>
	</table>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>