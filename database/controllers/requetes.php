<?php
/*-------------------------------------------------------*/
    //Req1: Titres des Drames
/*------------------------------------------------------*/
function R1(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT titre AS 'Titres des Drames'
                            FROM film
                                WHERE genre='Drame'; 
                        ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R1());
/*-------------------------------------------------------*/
    //Req2: films sont projetés au cinéma Le Fontenelle
/*------------------------------------------------------*/
function R2(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre AS 'Les films projetés au cinéma Le Fontenelle'
                            FROM FILM, CINEMA
                                WHERE CINEMA.nomCine='Le fontenelle';
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}

#print_r(R2());

/*-------------------------------------------------------*/
    //Req03-Noms et Prénoms des réalisateurs
/*------------------------------------------------------*/
function R3(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT INDIVIDU.nomInd AS 'NOM REALISATEUR', INDIVIDU.prenomInd AS 'PRENOM REALISATEUR'
                            FROM INDIVIDU, FILM  
                                WHERE INDIVIDU.numInd = FILM.numInd
                                    ORDER BY INDIVIDU.nomInd ;
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}

#print_r(R3());

/*-------------------------------------------------------*/
    //Req04-Noms et Prénoms des acteurs
/*------------------------------------------------------*/
function R4(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT INDIVIDU.nomInd AS 'NOM ACTEUR', INDIVIDU.prenomInd AS 'PRENOM ACTEUR'
                            FROM INDIVIDU, FILM
                             WHERE INDIVIDU.numInd = FILM.numInd;
    
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}

#print_r(R4());

/*-------------------------------------------------------*/
    //Req05-Films projétés en 2002
/*------------------------------------------------------*/
function R5(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre AS 'Films projétés en 2002'
                            FROM FILM, PROJECTION
                                WHERE FILM.numFilm = PROJECTION.numFilm
                                    AND PROJECTION.dateProjection BETWEEN '2002-01-01' AND '2002-12-31';
    
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R5());

/*-------------------------------------------------------*/
    //Req06-films réalisés par Lars von Trier
/*------------------------------------------------------*/
function R6(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre AS 'Les films réalises par Lars von Trier'
                            FROM INDIVIDU, FILM
                                WHERE INDIVIDU.numInd = FILM.numInd
                                    AND INDIVIDU.prenomInd='Lars' AND INDIVIDU.nomInd='Von trier';
    
    
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R6());

/*-------------------------------------------------------*/
    //Req07-Réalisateurs de Drame et Épouvante
/*------------------------------------------------------*/
function R7(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT DISTINCT 
                            INDIVIDU.nomInd AS 'Nom Realisateurs Epouvante Ou Drame',
                            INDIVIDU.prenomInd AS 'PRENOM Realisateurs Epouvante Ou Drame'
                            FROM INDIVIDU, FILM 
                                WHERE INDIVIDU.numInd = FILM.numInd
                                    AND (FILM.genre='Drame' OR FILM.genre='Epouvante');
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R7());

/*-------------------------------------------------------*/
    //Req08-Films où Nicole Kidman a joué un rôle
/*------------------------------------------------------*/
function R8(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre AS 'Les Films ou Nicole Kidman a joue un role'
                            FROM INDIVIDU, JOUER, FILM 
                                WHERE FILM.numFilm = JOUER.numFilm 
                                    AND INDIVIDU.numInd = JOUER.numInd
                                        AND INDIVIDU.nomInd='Kidman'
                                            AND INDIVIDU.prenomInd='Nicole';
    
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R8());

/*-------------------------------------------------------*/
    //Req09-Acteurs qui n'ont pas joué des films dramatiques
/*------------------------------------------------------*/
function R9(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT INDIVIDU.nomInd AS NOM, INDIVIDU.prenomInd AS PRENOM, FILM.genre AS GENRE
                            FROM INDIVIDU, JOUER, FILM
                                WHERE INDIVIDU.numInd = JOUER.numInd 
                                    AND FILM.numFilm = JOUER.numFilm
                                        AND FILM.genre NOT IN
                                        (SELECT FILM.genre 
                                            FROM FILM 
                                                WHERE FILM.genre = 'Drame');
    
    
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R9());

/*---------------------------------------------------------------------*/
    //Req10-Nom du Cinéma avec titre du film projété 02 Décembre 1990
/*-------------------------------------------------------------------*/
function R10(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT CINEMA.nomCine AS 'NOM CINEMA', FILM.titre AS 'TITRE FILM'
                            FROM FILM, CINEMA, PROJECTION 
                                WHERE CINEMA.numCine = PROJECTION.numCine 
                                    AND FILM.numFilm = PROJECTION.numFilm
                                        AND PROJECTION.dateProjection='1990-12-02';
    
    
    
    
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R10());

/*---------------------------------------------------------------------*/
    //Req11-les acteurs-titre-année des Drame et Espionnage
/*-------------------------------------------------------------------*/
function R11(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT INDIVIDU.nomInd AS 'NOM ACTEUR', INDIVIDU.prenomInd AS 'PRENOM ACTEUR', 
                                FILM.titre AS 'TITRE FILM', FILM.annee AS 'ANNEE DE PARUTION'
                                FROM INDIVIDU, FILM, JOUER 
                                    WHERE FILM.numFilm = JOUER.numFilm 
                                        AND INDIVIDU.numInd = JOUER.numInd
                                            AND (FILM.genre='Drame' OR FILM.genre='Espionnage');
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R11());

/*---------------------------------------------------------------------*/
    //Req12-titre et année de parution des films Western ou Policie
/*-------------------------------------------------------------------*/
function R12(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre AS 'TITRE FILM', FILM.annee AS 'ANNEE DE PARUTION'
                            FROM FILM
                                WHERE FILM.genre='Western' OR FILM.genre='Policier';
    
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R12());

/*---------------------------------------------------------------------*/
    //Req13-rôles des acteurs du film Dogville
/*-------------------------------------------------------------------*/
function R13(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT JOUER.roleActeur 'Roles des acteurs du film Dogville'
                            FROM FILM, JOUER 
                                WHERE FILM.numFilm = JOUER.numFilm
                                    AND FILM.titre='Dogville'
                                        ORDER BY JOUER.roleActeur;
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R13());

/*---------------------------------------------------------------------*/
    //Req14-acteur du rôle d’Helen Remington dans le film Crash
/*-------------------------------------------------------------------*/
function R14(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT INDIVIDU.nomInd AS 'NOM ACTEUR', INDIVIDU.prenomInd AS 'PRENOM ACTEUR'
                            FROM INDIVIDU, JOUER, FILM 
                            WHERE FILM.numFilm = JOUER.numFilm 
                                AND INDIVIDU.numInd = JOUER.numInd
                                AND JOUER.roleActeur='Helen remington' 
                                AND FILM.titre='Crash';

    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R14());

/*---------------------------------------------------------------------*/
    //Req15- titre, genre et année des film réalisé par  David Cronenberg
/*-------------------------------------------------------------------*/
function R15(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre , FILM.genre, FILM.annee
                            FROM INDIVIDU, FILM 
                                WHERE INDIVIDU.numInd = FILM.numInd
                                    AND INDIVIDU.nomInd='Cronenberg' 
                                    AND INDIVIDU.prenomInd='David'
                                        ORDER BY FILM.titre;
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R15());

/*---------------------------------------------------------------------*/
    //Req16-adresse du cinéma Gaumont Wilson
/*-------------------------------------------------------------------*/
function R16(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT CINEMA.adresse AS 'Adresse Du Cinema Gaumont Wilson'
                            FROM CINEMA
                                WHERE CINEMA.nomCine='Gaumont wilson';
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R16());

/*---------------------------------------------------------------------*/
    //Req17-Acteurs dont le nom commence par J, leur rôle le titre des films
/*-------------------------------------------------------------------*/
function R17(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT INDIVIDU.nomInd, INDIVIDU.prenomInd, JOUER.roleActeur, FILM.titre
                            FROM INDIVIDU, JOUER, FILM
                                WHERE FILM.numFilm = JOUER.numFilm 
                                    AND INDIVIDU.numInd = JOUER.numInd
                                    AND INDIVIDU.nomInd Like 'J*';

    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R17());

/*---------------------------------------------------------------------*/
    //Req18-Réalisateur et genre du film Pulp Fiction
/*-------------------------------------------------------------------*/
function R18(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT INDIVIDU.nomInd AS 'Nom Realisateur', INDIVIDU.prenomInd AS 'Prenom Realisateur', FILM.genre AS 'Genre du Film'
                            FROM INDIVIDU, FILM 
                                WHERE INDIVIDU.numInd = FILM.numInd
                                    AND FILM.titre='Pulp fiction';


    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R18());

/*---------------------------------------------------------------------*/
    //Req19-Titre, le genre et l’année de parution de tous les films de la base 
    //      sauf les films réalisés par von Trier
/*-------------------------------------------------------------------*/
function R19(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre, FILM.genre, FILM.annee
                            FROM INDIVIDU, FILM
                                WHERE INDIVIDU.numInd = FILM.numInd
                                    AND INDIVIDU.nomInd 
                                        NOT IN 
                                            (SELECT INDIVIDU.nomInd  
                                                FROM INDIVIDU, FILM
                                                    WHERE INDIVIDU.numInd = FILM.numInd
                                                        AND INDIVIDU.nomInd = 'Von Trier' );
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R19());

/*---------------------------------------------------------------------*/
    //Req20-rôles des acteurs du film Crash et son année de parution
/*-------------------------------------------------------------------*/
function R20(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre AS 'Titre du Film',
                         FILM.annee AS 'Annee de Parution',
                         JOUER.roleActeur AS 'Role Acteur'
                            FROM  FILM, JOUER
                                WHERE FILM.numFilm = JOUER.numFilm 
                                    AND FILM.titre='Crash';

    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R20());

/*----------------------------------------------------------------------------------------*/
    //Req21- titre et date de films projetés au cinéma Fontenell ou Espace ciné
/*----------------------------------------------------------------------------------------*/
function R21(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT FILM.titre , FILM.annee
                            FROM FILM, CINEMA, PROJECTION 
                                WHERE CINEMA.numCine=PROJECTION.numCine
                                    AND FILM.numFilm=PROJECTION.numFilm
                                        AND (CINEMA.nomCine='Le fontenelle' 
                                            OR CINEMA.nomCine='Espace ciné');

    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R21());

/*----------------------------------------------------------------------------------------*/
    //Req22-Titre et date des films projetés dans les cinemas Gaumont Wilson et Le Renoire
/*----------------------------------------------------------------------------------------*/
function R22(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT DISTINCT FILM.titre, FILM.annee
                            FROM FILM, CINEMA, PROJECTION 
                                WHERE CINEMA.numCine=PROJECTION.numCine 
                                    AND FILM.numFilm=PROJECTION.numFilm
                                        AND (CINEMA.nomCine='Gaumont wilson'
                                            OR CINEMA.nomCine='Le renoire');
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#print_r(R22());

/*----------------------------------------------------------------------------------------*/
    //Req23- Informations sur les films projetés chez  Espace ciné et Le renoir
/*----------------------------------------------------------------------------------------*/
function R23(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $req = $pdo->prepare("SELECT CINEMA.nomCine AS 'NOM CINEMA',
                                FILM.titre AS 'TITRE FILM', 
                                FILM.annee AS 'ANNEE DE PARUTION', 
                                INDIVIDU.nomInd AS 'NOM REALISATEUR', INDIVIDU.prenomInd AS 'PRENOM REALISATEUR', 
                                ACTEUR.nomInd AS 'NOM ACTEUR', ACTEUR.prenomInd AS 'PRENOM ACTEUR', 
                                JOUER.roleActeur AS 'ROLE ACTEUR'
                                FROM INDIVIDU, FILM, INDIVIDU AS ACTEUR, JOUER, PROJECTION, CINEMA 
                                    WHERE INDIVIDU.numInd = FILM.numInd
                                        AND ACTEUR.numInd = JOUER.numInd
                                        AND FILM.numFilm = JOUER.numFilm 
                                        AND FILM.numFilm = PROJECTION.numFilm
                                        AND CINEMA.numCine = PROJECTION.numCine                                                                                                                                                                               
                                    
                                    AND (CINEMA.nomCine='Espace cine' 
                                        OR CINEMA.nomCine='Le renoir')
                                        ORDER BY CINEMA.nomCine;
                                        
    ");
    $req->execute();
    $rep = $req->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $rep;
}
#var_dump(R23());

?>