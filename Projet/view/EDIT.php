<?php
	session_start();
	ob_start();

    $title = "Ajout de film";

	//Dans cette page nous allons pouvoir ajouter et supprimer les films 
?>





<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>