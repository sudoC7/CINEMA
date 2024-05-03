<?php
	session_start();
	ob_start();

    $title = "Ajout de Film";
?>

    <!--     id_film, titre, anneeSortie, duree, resumeFilm, noteFilm, afficheFilm, afficheBack, id_realisateur    -->
    <form action="index.php***" method="post" enctype="multipart/form-data">
            
        <!--Titre -->
        <label for="">
            <p></p>
            <input type="text">
            </label>
            
            <!--anneeSortie -->
            <label for="">
                <p></p>
                <input type="text">
            </label>
            
            <!--duree(min) -->
            <label for="">
                <p></p>
                <input type="text">
            </label>
            
            <!--synopsis(resumeFilm) -->
            <label for="">
                <p></p>
                <input type="text">
            </label>
            
            <!--noteFilm -->
            <label for="">
                <p></p>
                <input type="text">
            </label>
            
            <!--afficheFilm -->
            <label for="">
                <p></p>
                <input type="text">
            </label>
            
            <!--afficheBack -->
            <label for="">
                <p></p>
                <input type="text">
            </label>
            
            <!-- id_realisateur (choix de réalisateur) -->
            <label for="">
                <p></p>
                <input type="text">
        </label>
            
    </form>

    <a href="index.php?action=listEditCinema">Retour</a>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>