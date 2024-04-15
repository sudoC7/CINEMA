<?php
	session_start();
	ob_start();

    $title = "Détails d'un film";
?>

<!-- Ici nous allons afficher le detail d'un film ( titre acteur reéalisateur role synopsis etc...)-->




<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>