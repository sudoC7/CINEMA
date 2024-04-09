<?php
	session_start();
	ob_start();

    $title = "Acteurs";
?>




<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>