<?php
/*---------------------------------------*/
    //AJOUTER UN ACTEUR
/*--------------------------------------*/
function insert_one_jouer($numInd,$numFilm,$roleActeur) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO jouer (numInd,numFilm,roleActeur) VALUES ( ?,?,?) ");
    $insert_one->execute([ $numInd,$numFilm,$roleActeur]);

    $id = $pdo->lastInsertId(); 
    $msg = "Insertion réussie!";
    }catch(throwable $msg){
        throw $msg;
    }
        return $msg;
}
#var_dump(insert_one_jouer(2,3,'Baba'));

/*---------------------------------------*/
    //MODIFIER UN ACTEUR
/*--------------------------------------*/
function update_col_jouer($newInd,$newFilm,$roleActeur,$numInd,$numFilm) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_one = $pdo->prepare("UPDATE jouer SET numInd= ?, numFilm= ?, roleActeur= ?  WHERE numInd = ? AND numFilm = ? ");
    $update_one->execute([ $newInd,$newFilm,$roleActeur,$numInd,$numFilm  ]);
    $msg = "L'acteur a été mise à jour.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}
#var_dump(update_col_jouer(1,3,'Bababa',2,3));

/*-------------------------------------------------*/
    //DELETE ONE 
/*--------------------------------------------------*/
function delete_one_jouer($numInd, $numFilm){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM jouer WHERE numInd = ? AND numFilm = ? ") 
        ->execute([$numInd, $numFilm]);
        
        $msg = "La relation jouer de l'acteur n°".$numInd." du film n°".$numFilm." a été supprimée";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
 

/*-------------------------------------------------*/
    //SUPPRIMER UN ACTEUR
/*--------------------------------------------------*/
function delete_one_jouer_by_ind($numInd){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM jouer WHERE numInd = ? ") 
        ->execute([$numInd]);
        
        $msg = "Les acteurs correspondants à l'individu n°".$numInd." ont été supprimés";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}

#var_dump(delete_one_jouer(2,3));

/*-------------------------------------------------*/
    //SUPPRIMER UN ACTEUR
/*--------------------------------------------------*/
function delete_one_jouer_by_film($numFilm){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM jouer WHERE numFilm = ?") 
        ->execute([$numFilm]);
        
        $msg = "L'acteur du film n°".$numFilm." a été supprimée";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}


?>