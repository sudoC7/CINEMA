<?php
	session_start();
	ob_start();

    $title = "Ajout de Film";
?>

    <!--     id_film, titre, anneeSortie, duree, resumeFilm, noteFilm, afficheFilm, afficheBack, id_realisateur    -->
    <form action="index.php?action=ajoutFilm" method="post" enctype="multipart/form-data">
            
        <!--Titre -->
            <p>Titre</p>
            <input type="text">
            
            
            <!-- anneeSortie -->
                <p>Annee de sortie</p>
                <input type="text" name="titre">
            
            <!--duree(min) -->
                <p>Durée</p>
                <input type="number" name="">
            
            <!--synopsis(resumeFilm) -->
                <p>Synopsis</p>
                <input type="text" name="resumeFilm">
            
            <!--noteFilm -->
                <p>Note</p>
                <input type="number" name="noteFilm">
            
            <!--afficheFilm et afficheBack -->
                <p>Photo principal</p>
                <input type="file" name="afficheFilm">
                <p>Photo du Back</p>
                <input type="file" name="afficheBack">
            
            <!-- id_realisateur (choix de réalisateur)  Faire un foreach qui la lister tous les réalisateur et pouvoir choisir le réalisateur-->
                <p>Réalisateur</p>
            
                <input type="text">
            
    </form>

    <a href="index.php?action=listEditCinema">Retour</a>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>