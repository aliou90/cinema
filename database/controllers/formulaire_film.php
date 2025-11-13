<?php
/*---------------------------------------*/
    //AJOUTER UN FILM
/*--------------------------------------*/
function insert_one_film($numInd,$titre,$genre,$annee) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO film (numInd,titre,genre,annee) VALUES ( ?,?,?,?) ");
    $insert_one->execute([ $numInd,$titre,$genre,$annee]);

    $id = $pdo->lastInsertId(); 
    }catch(throwable $th){
        throw $th;
    }
        return $id;
}

/*---------------------------------------*/
    //MODIFIER UN FILM  
/*--------------------------------------*/
function update_col_film($numFilm,$numInd,$titre,$genre,$annee,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_one = $pdo->prepare("UPDATE film SET numFilm= ?,numInd= ?,titre= ?,genre=?, annee= ?  WHERE numFilm = ?  ");
$update_one->execute([ $numFilm,$numInd,$titre,$genre,$annee,$id ]);
 
    }catch(throwable $th){
        throw $th;
    }
        return $id;
}

/*-------------------------------------------------*/
    //SUPPRIMER UN FILM
/*--------------------------------------------------*/
function delete_one_film($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM film WHERE numFilm = ?") 
        ->execute([$id]);
        
        $msg = "Le film ".$id." a été supprimé";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}

/*-------------------------------------------------*/
    //SUPPRIMER UN FILM
/*--------------------------------------------------*/
function delete_one_film_by_ind($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM film WHERE numInd = ?") 
        ->execute([$id]);
        
        $msg = "Les films réalisés par l'individu n°".$id." a été supprimé";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}

/*---------------------------------------*/
    //Sélectionner IDs des film
/*--------------------------------------*/
function select_film_ids(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT numFilm, titre, genre, annee FROM film;");
    $select_all->execute();
    $list_all = $select_all->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $list_all;
}



?>