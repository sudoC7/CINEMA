<?php
	session_start();
	ob_start();

    $title = "Edit Cinema";

	//Dans cette page nous allons pouvoir ajouter et supprimer les films 
?>
<div class="editTableau">
		<!--TABLEAU FILM-->
	<div>
	 	<table>
			<thead>
				<tr>
					<th>FILMs</th>
				</tr>
			</thead>
			<tbody>
				<!-- Affiche tous les films du tableau  -->
				<?php foreach ($requeteFilmsEdit->fetchAll() as $film) { ?>
					<tr> 
						<td><a href="index.php?action=detailFilm&id=<?= $film["id_film"]; ?>"><?= $film["titre"] ?></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
	<!--TABLEAU ACTEUR-->
	<div>
		<table>
			<thead>
				<tr>
					<th>ACTEURs</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($requeteActeursEdit->fetchAll() as $acteur) { ?>
					<tr>      
						<td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"]; ?>"><?= $acteur["Acteur"] ?></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!--TABLEAU GENRE-->
	<div>
		<table>
			<thead>
				<tr>
					<th>GENREs</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($requeteGenresEdit->fetchAll() as $genre) { ?>
					<tr>
						<td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"]; ?>"><?= $genre["genreFilm"] ?></a></td>
				    </tr>
				<?php } ?>
			</tbody>
		</table>	
	</div>

		<!--TABLEAU REALISATEUR-->
	<div>
		<table>
			<thead>
				<tr>
					<th>REALISATEURs</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($requeteRealisateursEdit->fetchAll() as $realisateur) { ?>
					<tr>
						<td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"]; ?>"><?= $realisateur["Realisateur"] ?></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
		
	<!--TABLEAU ROLE-->
	<div>
		<table>
			<thead>
				<tr>
					<th>ROLEs</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($requeteRolePersoEdit->fetchAll() as $roleperso) { ?>
					<tr>
						<td><a href="index.php?action=detailRoleperso&id=<?= $roleperso["id_roleperso"]; ?>"><?= $roleperso["nomPerso"] ?></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

	
<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>