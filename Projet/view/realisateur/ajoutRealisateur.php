<?php
	session_start();
	ob_start();

    $title = "Ajout de Réalisateur";
?>


    <!--     id_realisateur, nomReal, prenomReal, dateNaissanceReal, afficheReal   -->
    <form action="index.php?action=ajoutRealisateur" method="post" enctype="multipart/form=data">
        
        <label>
            <p>Nom</p>
            <input type="text" name="lastname">
        </label>
        <label>
            <p>Prenom</p>
            <input type="text" name="firstname">
        </label>

        <!-- pour la date de naissance -->
        <label>
            <p>Date de naissance</p>
            <input type="date" name="bday" value="0000-00-00">
        </label>

        <!-- pour importer une photo -->
        <label>
            <p>photo</p>
            <input type="file" name="fileImg" accept=".jpg, .png, .jpeg, .svg" >
            <!--<button type="submit" name="fileImg">UPLOAD</button>-->
        </label>

        <!-- Boutton submit du fomulaireo -->
        <label>
            <br><input type="submit" name="submit" value="Ajouter">
        </label>
        
        
    </form>

    <a href="index.php?action=listEditCinema">Retour</a>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>