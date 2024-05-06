<?php
	session_start();
	ob_start();
    $title = "Ajout de Réalisateur"; 
?>

    <!--     id_realisateur, nomReal, prenomReal, dateNaissanceReal, afficheReal   -->
    <form action="index.php?action=ajoutRealisateur" method="POST" enctype="multipart/form-data">
        
            <p>Nom</p>
            <input type="text" name="lastname">
            <p>Prenom</p>
            <input type="text" name="firstname">
        
        <!-- pour la date de naissance -->
            <p>Date de naissance</p>
            <input type="date" name="bday" value="0000-00-00">
        
        <!-- pour importer une photo -->
            <p>Photo</p>
            <input type="file" name="fileImg">
        
        <!-- Boutton submit du fomulaire -->
            <input type="submit" name="submit" value="Ajouter">
        
    </form>
    <a href="index.php?action=listEditCinema">Retour</a>
<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>