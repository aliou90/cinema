<?php
/*-------------------------------------------------*/
    //AJOUTER UN CINÉMA
/*--------------------------------------------------*/

function insert_one_cinema($nomCine,$adresse) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO cinema (nomCine,adresse) VALUES ( ?,?) ");
    $insert_one->execute([ $nomCine,$adresse]);

    $id = $pdo->lastInsertId(); 
    $msg = "Insertion réussie. Numéro de la dernière insertion ".$id;
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*-------------------------------------------------*/
    //MODIFIER UN CINÉMA
/*--------------------------------------------------*/
function update_col_cinema($numCine,$nomCine,$adresse,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_one = $pdo->prepare("UPDATE cinema SET numCine= ?, nomCine= ?, adresse= ? WHERE numCine = ?  ");
    $update_one->execute([ $numCine,$nomCine,$adresse,$id ]);
    $msg = "Les données du cinéma n°".$id." ont été mises à jour.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*-------------------------------------------------*/
    //SUPPRIMER UN CINÉMA
/*--------------------------------------------------*/
function delete_one_cinema($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM cinema WHERE numCine = ?") 
        ->execute([$id]);
        
        $msg = "Le cinéma n°".$id." a été supprimé";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}

/*---------------------------------------*/
    //AFFICHAGE DE DONNÉES CINÉMAS
/*--------------------------------------*/
function select_cinema_ids(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT numCine, nomCine, adresse FROM cinema;");
    $select_all->execute();
    $list_all = $select_all->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $list_all;
}


?>