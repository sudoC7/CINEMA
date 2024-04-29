<?php
	session_start();
	ob_start();

    $title = "Edit Cinema";

	//Dans cette page nous allons pouvoir ajouter et supprimer les films 
?>
<div class="editTableau">

	<!--TABLEAU FILM-->
	<div>
		<div>
			<a href="index.php?action=">AJOUT FILM</a>
		</div>
	 	<table>
			<thead>
				<tr>
					<th>FILM/s</th>
				</tr>
			</thead>
			<tbody>
				<!-- Affiche tous les films du tableau  -->
				<?php foreach ($requeteFilmsEdit->fetchAll() as $film) { ?>
					<tr> 
						<td><a href="index.php?action=detailFilm&id=<?= $film["id_film"]; ?>"><?= $film["titre"] ?></a></td>
						<td><a href="index.php?action=suppFilm&id=<?= $film["id_film"];  ?>"><input type="submit" name="submit" value="DELL"></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
	<!--TABLEAU ACTEUR-->
	<div>
		<div>
			<a href="view/acteur/ajoutActeur.php">AJOUT ACTEUR</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>ACTEUR/s</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($requeteActeursEdit->fetchAll() as $acteur) { ?>
					<tr>      
						<td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"]; ?>"><?= $acteur["Acteur"] ?></a></td>
						<td><a href="index.php?action=suppActeur&id=<?= $acteur["id_acteur"]; ?>"><input type="submit" name="submit" value="DELL"></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<!--TABLEAU GENRE-->
	<div>
		<div>
			<a href="view/genre/ajoutGenre.php">AJOUT GENRE</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>GENRE/s</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($requeteGenresEdit->fetchAll() as $genre) { ?>
					<tr>
						<td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"]; ?>"><?= $genre["genreFilm"] ?></a></td>
						<td><a href="index.php?action=suppGenre&id=<?= $genre["id_genre"] ?>"><input type="submit" name="submit" value="DELL"></a></td>
				    </tr>
				<?php } ?>
			</tbody>
		</table>	
	</div>

	<!--TABLEAU REALISATEUR-->
	<div>
		<div>
			<a href="view/realisateur/ajoutRealisateur.php">AJOUT REALISATEUR</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>REALISATEUR/s</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($requeteRealisateursEdit->fetchAll() as $realisateur) { ?>
					<tr>
						<td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"]; ?>"><?= $realisateur["Realisateur"] ?></a></td>
						<td><a href="index.php?action=suppRealisateur&id=<?= $realisateur['id_realisateur'] ?>"><input type="submit" name="submit" value="DELL"></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
		
	<!--TABLEAU ROLE-->
	<div>
		<div>
			<a href="view/role/ajoutRoleperso.php">AJOUT ROLE</a>
		</div>
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
						<td><a href="index.php?action=suppRoleperso&id=<?= $roleperso["id_roleperso"] ?>"><input type="submit" name="submit" value="DELL"></a></td>
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