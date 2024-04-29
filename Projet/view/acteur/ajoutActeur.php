<?php
	session_start();
	ob_start();

    $title = "Ajout d'Acteur";
?>

     <!--     id_acteur, nom, prenom, sexe, dateNaissance, afficheActeur    -->
     <form action="index.php***">
        
        <!--nom -->
        <label for="">
            <p></p>
            <input type="text">
        </label>
        
        <!--prenom -->
        <label for="">
            <p></p>
            <input type="text">
        </label>
        
        <!--sexe -->
        <label for="">
            <p></p>
            <input type="text">
        </label>
        
        <!--dateNaissance -->
        <label for="">
            <p></p>
            <input type="text">
        </label>
        
        <!--afficheActeur -->
        <label for="">
            <p></p>
            <input type="text">
        </label>
        
    </form>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>