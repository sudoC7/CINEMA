<?php
	session_start();
	ob_start();

    $title = "Ajout de film";
?>

<h2>DETAILS DU FILM </h2>
	<!-- Compte le nombre de realisateurs  -->
	<p>On a <?= $requeteActeurs->rowCount() ?> acteurs</p>

	<table>
		<thead>
			<tr>
				<th>TITRE</th>
				<th>SYNOPSIS</th>
				<th>NOTE</th>
				<th>DUREE</th>
				<th>anneeSortie</th>
				<th>REALISATEUR</th>
				<th>ACTEUR</th>
				<th>ROLE</th>
			</tr>
		</thead>
		<tbody>
		$rocketDetailsFilm = "SELECT titre, resumeFilm, noteFilm, duree, anneeSortie, CONCAT(realisateur.nomReal, ' ', realisateur.prenomReal) AS realisateur, CONCAT(acteur.nom, ' ', acteur.prenom) AS acteur, nomPerso AS roleActeur 

			<!-- Affiche tous les films du tableau  -->
			<?php foreach ($requeteActeurs->fetchAll() as $acteur) { ?>
				<tr>
					<td><?= $acteur["titre"] ?></td>
					<td><?= $acteur["resumeFilm"] ?></td>
					<td><?= $acteur["noteFilm"] ?></td>
					<td><?= $acteur["duree"] ?></td>
					<td><?= $acteur["anneeSortie"] ?></td>
					<td><?= $acteur["realisateur"] ?></td>
					<td><?= $acteur["acteur"] ?></td>
					<td><?= $acteur["roleActeur"] ?></td>
				</tr>
			<?php }	?>
		</tbody>
	</table>




<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>