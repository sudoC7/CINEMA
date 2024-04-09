<?php 

use controller/CinemaController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

$id = (isset($_GET["id"])) ? $_GET("id") : null;

$ctrlCinema = new CinemaController();


if(isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms" : $ctrlCinema->listFilms(); break; 
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
        case "listRealisateurs" : $ctrlCinema->listRealisateurs(); break;
        case "listGenre" : $ctrlCinema->listGenre(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id);
    }
}