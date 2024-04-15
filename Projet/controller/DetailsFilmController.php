<?php

    //Contiendras tous les details du films 


    
	if(isset($_GET[$id])) {
		
		$rocketDetailsFilm = "";
		
		$pdoDetailsFilm = Connect::seConnecter();


	} else {
		echo "Pas de contenu";
	}

    

?>