<?php
	session_start();
	ob_start();

    $title = "Ajout de Role personnage";
?>

    <!--  id_roleperso, nomPerso  -->
    <form action="index.php?action=ajoutRoleperso" method="post">
        
        <label>
            <p>Ajouter un Rôle personnage</p>
            <input type="text" name="name">
        </label>

        <!--Button d'ajout-->
        <label>
            <input type="submit" name="submit" value="Ajouter">
        </label>
                                                
    </form>

    <a href="index.php?action=listEditCinema">Retour</a>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>