<?php
	session_start();
	ob_start();

    $title = "Ajout d'Acteur";
?>

<p>AJOUT D'ACTEUR</p>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>