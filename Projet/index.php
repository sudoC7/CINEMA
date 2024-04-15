<?php 

use Controller\FilmController;
use Controller\ActeurController;
use Controller\GenreController;
use Controller\RealisateurController;
use Controller\RolepersoController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

//$id = (isset($_GET["id"])) ? $_GET("id") : null;

$ctrlFilm = new FilmController();
$ctrlActeur = new ActeurController();
$ctrlGenre = new GenreController();
$ctrlRealisateur = new RealisateurController();
$ctrlRoleperso = new RolepersoController();


if(isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms" : $ctrlFilm->listFilms(); break; 
        case "listActeurs" : $ctrlActeur->listActeurs(); break;
        case "listGenres" : $ctrlGenre->listGenres(); break;
        case "listRealisateurs" : $ctrlRealisateur->listRealisateurs(); break;
        case "listRole" : $ctrlRoleperso->listRole($id);
    }
}
