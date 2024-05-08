<?php
	session_start();
	ob_start();

    $title = "Ajout de Film";
?>

    <!--     id_film, titre, anneeSortie, duree, resumeFilm, noteFilm, afficheFilm, afficheBack, id_realisateur    -->
    <form action="index.php?action=ajoutFilm" method="post" enctype="multipart/form-data">
            
        
            <!--Titre -->
                <p>Titre</p>
                <input type="text" name="titre">
             
            <!-- anneeSortie -->
                <p>Annee de sortie</p>
                <input type="number" name="anneeSortie">
            
            <!-- duree(min) -->
                <p>Durée</p>
                <input type="number" name="duree">
            
            <!-- synopsis(resumeFilm) -->
                <p>Synopsis</p>
                <input type="text" name="resumeFilm">
            
            <!-- noteFilm -->
                <p>Note</p>
                <input type="number" name="noteFilm">
            
            <!-- afficheFilm et afficheBack 
                <p>Photo principal</p>
                <input type="file" name="afficheFilm">
                <p>Photo du Back</p>
                <input type="file" name="afficheBack">-->
            
            <!-- id_realisateur (choix de réalisateur)  Faire un foreach qui la lister tous les réalisateur et pouvoir choisir le réalisateur -->
            <br>
            <!-- OPTION 1 : -->
                <select name="<?= $real['id_realisateur']; ?>">
                    <?php foreach($requeteRealisateurs->fetchAll() as $real) { 
                     echo "<option value=' ".$real['id_realisateur']." '> ".$real['Realisateur']."</option>";
                     }; ?>
                </select>

            <!-- OPTION 2 : -->
                <?php foreach($requeteRealisateurs->fetchAll() as $real) {?>
                    <select name="">
                        <option value=""><?= $real['Realisateur'] ?></option>
                    </select>
                <?=}?>   

            <!-- Boutton pour ajouter -->    
                <input type="submit" name="submit" value="Ajouter">
            
    </form>

    <a href="index.php?action=listEditCinema">Retour</a>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>