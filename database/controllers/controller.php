<?php 
#require_once(__DIR__."/full_control/individu_controller.php");
#require_once(__DIR__."/full_control/film_controller.php");
#require_once(__DIR__."/full_control/cinema_controller.php");
#require_once(__DIR__."/full_control/jouer_controller.php");
#require_once(__DIR__."/full_control/projection_controller.php"); 

/*---------------------------------------------------------*/
    // LOGIN ADMINISTRATEUR
/*--------------------------------------------------------*/
require_once(__DIR__."/login.php");

/*---------------------------------------------------------*/
    //ÉTATS DE LA BASE DE DONNÉES
/*--------------------------------------------------------*/
require_once(__DIR__."/etats.php");

/*-------------------------------------------------------*/
    //FORMULAIRES DE MANIPULATION DE LA BASE DE DONNÉES
/*------------------------------------------------------*/
require_once(__DIR__."/formulaire_cinema.php");
require_once(__DIR__."/formulaire_film.php");
require_once(__DIR__."/formulaire_individu.php"); 
require_once(__DIR__."/formulaire_jouer.php");
require_once(__DIR__."/formulaire_projection.php");

/*-------------------------------------------------------*/
    //REQUÊTES D'INTERROGATION DE LA BASE DE DONNÉES
/*------------------------------------------------------*/

require_once(__DIR__."/requetes.php");