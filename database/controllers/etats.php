<?php
/*---------------------------------------*/
    //AFFICHAGE ÉTATS DES INDIVIDUS
/*--------------------------------------*/
function select_all_individu(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT * FROM individu;");
    $select_all->execute();
    $list_all = $select_all->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $list_all;
}

/*---------------------------------------*/
    //AFFICHAGE ÉTATS DES CINÉMAS
/*--------------------------------------*/
function select_all_cinema(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT * FROM cinema;");
    $select_all->execute();
    $list_all = $select_all->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $list_all;
}

/*---------------------------------------*/
    //AFFICHAGE ÉTATS DES FILMS
/*--------------------------------------*/
function select_all_film() {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try {
        $select_all = $pdo->prepare("SELECT f.*, i.nomInd, i.prenomInd
                                    FROM film f
                                    INNER JOIN individu i ON f.numInd = i.numInd");
        $select_all->execute();
        $list_all = $select_all->fetchAll();
    } catch (Throwable $th) {
        throw $th;
    }
    return $list_all;
}


/*---------------------------------------*/
    //AFFICHAGE ÉTATS DES ACTEURS
/*--------------------------------------*/
function select_all_jouer() {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try {
        $select_all = $pdo->prepare("SELECT j.*, f.titre, i.nomInd, i.prenomInd
                                    FROM jouer j
                                    INNER JOIN film f ON j.numFilm = f.numFilm
                                    INNER JOIN individu i ON j.numInd = i.numInd");
        $select_all->execute();
        $list_all = $select_all->fetchAll();
    } catch (Throwable $th) {
        throw $th;
    }
    return $list_all;
}


/*---------------------------------------*/
    //AFFICHAGE ÉTATS DES PROJECTIONS
/*--------------------------------------*/
function select_all_projection() {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try {
        $select_all = $pdo->prepare("SELECT p.*, f.titre, f.genre, f.annee, c.nomCine, c.adresse
                                    FROM projection p
                                    INNER JOIN film f ON p.numFilm = f.numFilm
                                    INNER JOIN cinema c ON p.numCine = c.numCine");
        $select_all->execute();
        $list_all = $select_all->fetchAll();
    } catch (Throwable $th) {
        throw $th;
    }
    return $list_all;
}


?>