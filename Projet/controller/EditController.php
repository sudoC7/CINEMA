<?php

    //Contiendras tous les details du films 


    
	if(isset($_GET[$id])) {
		
		$rocketDetailsFilm = "SELECT titre, resumeFilm, noteFilm, duree, anneeSortie, CONCAT(realisateur.nomReal, ' ', realisateur.prenomReal) AS realisateur, CONCAT(acteur.nom, ' ', acteur.prenom) AS acteur, nomPerso AS roleActeur 
        FROM acteur  	
        INNER JOIN jouerole ON acteur.id_acteur = jouerole.id_acteur  
        INNER JOIN roleperso ON jouerole.id_role_personnage = roleperso.id_roleperso  
        INNER JOIN film ON film.id_film = jouerole.id_film  
        INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur  
        WHERE film.id_film = :id";
		
		$pdoDetailsFilm = Connect::seConnecter();
        $rocketDetailsFilm->execute(["id" => $id]);
        $recette = $rocketDetailsFilm->fetch();




        

       


	} else {
		echo "Pas de contenu";
	}



?>