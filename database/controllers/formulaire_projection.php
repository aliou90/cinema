<?php
/*---------------------------------------*/
    //AJOUTER UNE PROJECTION
/*--------------------------------------*/
function insert_one_projection($numCine,$numFilm,$dateProjection) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO projection (numCine,numFilm,dateProjection) VALUES ( ?,?,?) ");
    $insert_one->execute([ $numCine,$numFilm,$dateProjection]);

    $id = $pdo->lastInsertId(); 
    $msg = "Insertion réussie!";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}
#var_dump(insert_one_projection(2,1,'2001-12-03'));
/*---------------------------------------*/
    //MODIFIER UNE PROJECTION 
/*--------------------------------------*/
function update_col_projection($newCine,$newFilm,$newDate,$numCine,$numFilm,$dateProjection) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_one = $pdo->prepare("UPDATE projection SET numCine= ?, numFilm= ?, dateProjection= ?  WHERE numCine= ? AND numFilm= ? AND dateProjection= ? ");
    $update_one->execute([ $newCine,$newFilm,$newDate,$numCine,$numFilm,$dateProjection ]);
    $msg = "Mise à jour réussie!";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}
#var_dump(update_col_projection(2,3,"1999-12-01",1,2,"1960-11-09"));

/*-------------------------------------------------*/
    //SUPPRIMER UNE PROJECTION
/*--------------------------------------------------*/
function delete_one_projection($numCine,$numFilm,$dateProjection){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM projection WHERE numCine = ? AND numFilm = ? AND dateProjection = ? ") 
        ->execute([$numCine,$numFilm,$dateProjection]);
        
        $msg = "La projection a été supprimée";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}

#var_dump(delete_one_projection(2,3,"1999-12-01"));

/*-------------------------------------------------*/
    //SUPPRIMER UNE PROJECTION
/*--------------------------------------------------*/
function delete_one_projection_by_cinema($numCine){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM projection WHERE numCine = ? ") 
        ->execute([$numCine]);
        
        $msg = "Les projections du cinéma n°".$numCine." ont été supprimées";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}

/*-------------------------------------------------*/
    //SUPPRIMER UNE PROJECTION
/*--------------------------------------------------*/
function delete_one_projection_by_film($numFilm){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM projection WHERE numFilm = ? ") 
        ->execute([$numFilm]);
        
        $msg = "Les projections du film n°".$numFilm." ont été supprimées";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}


?>