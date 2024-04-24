<?php 

use Controller\FilmController;
use Controller\ActeurController;
use Controller\GenreController;
use Controller\RealisateurController;
use Controller\RolepersoController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});


$id = (isset($_GET["id"])) ? $_GET["id"] : null;

$ctrlFilm = new FilmController();
$ctrlActeur = new ActeurController();
$ctrlGenre = new GenreController();
$ctrlRealisateur = new RealisateurController();
$ctrlRoleperso = new RolepersoController();


if(isset($_GET["action"])) {
    
    switch ($_GET["action"]) {

        //===Films
        case "listFilms" : $ctrlFilm->listFilms(); break; 
        // detail film 
        case "detailFilm" : $ctrlFilm->detailFilm($id); break; 


        //===Acteurs
        case "listActeurs" : $ctrlActeur->listActeurs(); break;
        // detail acteur 
        case "detailActeur" : $ctrlActeur->detailActeur($id); break;


        //===Genres
        case "listGenres" : $ctrlGenre->listGenres(); break;
        // detail de genre 
        case "detailGenre" : $ctrlGenre->detailGenre($id); break;


        //===Realisateurs
        case "listRealisateurs" : $ctrlRealisateur->listRealisateurs(); break;
        // detail de realisateur 
        case "detailRealisateur" : $ctrlRealisateur->detailRealisateur($id); break;


        //===Role Personnage
        case "listRoleperso" : $ctrlRoleperso->listRoleperso();
        // detail de role perso
        case "detailRoleperso" : $ctrlRoleperso->detailRolePerso($id);
    }
}
