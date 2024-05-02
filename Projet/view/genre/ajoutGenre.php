<?php
	session_start();
	ob_start();

    $title = "Ajout de Genre";
?>
    <!--     id_genre, genreFilm     -->
    <form action="index.php?action=ajoutGenre" method="post" enctype="multipart/form-data">
        
        <!-- Barre de saisit -->
        <label>
            <p>Genre à ajouter </p>
            <input type="text" name="name">
        </label>

        <!-- Button ajouter -->
        <label>
            <input type="submit" name="submit" value="Ajouter">
        </label>
        
    </form>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>