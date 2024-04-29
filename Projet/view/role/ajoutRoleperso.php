<?php
	session_start();
	ob_start();

    $title = "Ajout de Role personnage";
?>



<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>