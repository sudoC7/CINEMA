<?php
	session_start();
	ob_start();

    $title = "Ajout de film";

	//Dans cette page nous allons pouvoir ajouter et supprimer les films 
?>


<p>HELLLO</p>


<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>