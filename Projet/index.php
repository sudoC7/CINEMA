<?php 

use Controller\FilmController;
use Controller\ActeurController;
use Controller\GenreController;
use Controller\RealisateurController;
use Controller\RolepersoController;
use Controller\EditController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});


$id = (isset($_GET["id"])) ? $_GET["id"] : null;

$ctrlFilm = new FilmController();
$ctrlActeur = new ActeurController();
$ctrlGenre = new GenreController();
$ctrlRealisateur = new RealisateurController();
$ctrlRoleperso = new RolepersoController();
$ctrlEdit = new EditController();


if(isset($_GET["action"])) {
    
    switch ($_GET["action"]) { 

        //==== FILMS ====//
        case "listFilms" : $ctrlFilm->listFilms(); break; 
        // detail film 
        case "detailFilm" : $ctrlFilm->detailFilm($id); break; 
        // supprime film
        case "suppFilm" : $ctrlFilm->suppFilm($id); break;


        //==== ACTEURS ====//
        case "listActeurs" : $ctrlActeur->listActeurs(); break;
        // detail acteur 
        case "detailActeur" : $ctrlActeur->detailActeur($id); break;
        // supprime acteur
        case "suppActeur" : $ctrlActeur->suppActeur($id); break;


        //==== GENRES ====//
        case "listGenres" : $ctrlGenre->listGenres(); break;
        // detail genre 
        case "detailGenre" : $ctrlGenre->detailGenre($id); break;
        // supprime genre
        case "suppGenre" : $ctrlGenre->suppGenre($id); break;
        // ajout genre
        case "ajoutGenre" : $ctrlGenre->ajoutGenre(); break;


        //==== REALISATEURS ====//
        case "listRealisateurs" : $ctrlRealisateur->listRealisateurs(); break;
        // detail realisateur 
        case "detailRealisateur" : $ctrlRealisateur->detailRealisateur($id); break;
        // supprime realisateur
        case "suppRealisateur" : $ctrlRealisateur->suppRealisateur($id); break;
        // ajout realisateur 
        case "ajoutRealisateur" : $ctrlRealisateur->ajoutRealisateur(); break;


        //==== ROLE PERSONNAGE ====//
        case "listRoleperso" : $ctrlRoleperso->listRoleperso(); break;
        // detail role perso
        case "detailRoleperso" : $ctrlRoleperso->detailRolePerso($id); break;
        // supprime role perso
        case "suppRoleperso" : $ctrlRoleperso->suppRolePerso($id); break;
        // ajout role perso
        case "ajoutRoleperso" : $ctrlRoleperso->ajouterRolePerso(); break; 
        
        
        //==== EDIT CINEMA ====//
        case "listEditCinema" : $ctrlEdit->listEditCinema(); break;
        

    }
    
} else {
    $ctrlFilm->listFilms();
}
