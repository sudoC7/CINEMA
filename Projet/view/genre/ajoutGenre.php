<?php
	session_start();
	ob_start();

    $title = "Ajout de Genre";
?>
    <!--     id_genre, genreFilm     -->
    <form action="index.php***">
        
        <label for="">
            <p></p>
            <input type="text">
        </label>
        
    </form>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>