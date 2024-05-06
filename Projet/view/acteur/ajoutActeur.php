<?php
	session_start();
	ob_start();

    $title = "Ajout d'Acteur";
?>
    <h2>Ajout d'Acteur</h2>
     <!--     id_acteur, nom, prenom, sexe, dateNaissance, afficheActeur    -->
     <form action="index.php?action=ajoutActeur" method="post" enctype="multipart/form-data">

            <p>Nom</p>
            <input type="text" name="lastName" >
            <p>Prenom</p>
            <input type="text" name="firstName" >
            <p>Sexe</p>
            <input type="text" name="sexe" >
            <p>Date de naissance</p>
            <input type="date" name="bday" value="0000-00-00">
        
        <!--afficheActeur -->
            <p>Photo</p>
            <input type="file" name="fileImg" accept=".jpg, .jpeg, .png, .svg">

        <!--Boutton d'ajout -->
            <input type="submit" name="submit" value="Ajouter">
     </form>                                                              

    <a href="index.php?action=listEditCinema">Retour</a>

<?php	
	$content = ob_get_clean();
	require_once "view/template.php";
?>