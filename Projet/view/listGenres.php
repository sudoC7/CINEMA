<?php
	session_start();
	ob_start();

    $title = "Genre";
?>




<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>