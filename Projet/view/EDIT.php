<?php
	session_start();
	ob_start();

    $title = "Ajout de film";
?>





<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>