<?php
	session_start();
	ob_start();

    $title = "Ajout de Casting";
?>


    <form action="index.php?action=ajoutCasting" method="post" enctype="multipart/form-data">

        <!--    Liste de Film    -->
        <p>Film</p>
                <select name="id_film">
                    <?php foreach($requeteFilm->fetchAll() as $film) {?>
                        <option value="<?=$film["id_film"]?>"><?= $film['titre'] ?></option>
                        <?php }?>   
                </select>

        <!--    Liste de Acteur     -->
        <p>Acteur</p>
                <select name="id_acteur">
                    <?php foreach($requeteActeur->fetchAll() as $acteur) {?>
                        <option value="<?=$acteur["id_acteur"]?>"><?= $acteur['nomActeur'] ?></option>
                        <?php }?>   
                </select>
        <!--    Liste de RolePerso    -->
        <p>Role Personnage</p>
                <select name="id_roleperso">
                    <?php foreach($requeteRoleperso->fetchAll() as $role) {?>
                        <option value="<?=$role["id_roleperso"]?>"><?= $role['nomPerso'] ?></option>
                        <?php }?>   
                </select>
        <!--    Liste de Genre   -->
        <p>Genre</p>
                <select name="id_genre">
                    <?php foreach($requeteGenre->fetchAll() as $genre) {?>
                        <option value="<?=$genre["id_genre"]?>"><?= $genre['genreFilm'] ?></option>
                        <?php }?>   
                </select>

                <!-- Boutton pour ajouter -->    
                <input type="submit" name="submit" value="Ajouter">
            
    </form>

    <a href="index.php?action=listEditCinema">Retour</a>        

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>