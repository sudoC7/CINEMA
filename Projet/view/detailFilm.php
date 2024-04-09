<?php
	session_start();
	ob_start();

    $title = "Détails d'un film";
?>




<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>