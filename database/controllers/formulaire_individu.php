<?php
/*---------------------------------------*/
    //AJOUTER UN INDIVIDU
/*--------------------------------------*/
function insert_one_individu($nomInd,$prenomInd) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO individu (nomInd,prenomInd) VALUES ( ?,?) ");
    $insert_one->execute([ $nomInd,$prenomInd]);

    $id = $pdo->lastInsertId(); 
    $msg = "Insertion réussie. Numéro de la dernière insertion ".$id;
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*---------------------------------------*/
    //MODIFIER UN INDIVIDU 
/*--------------------------------------*/
function update_col_individu($numInd,$nomInd,$prenomInd,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_one = $pdo->prepare("UPDATE individu SET numInd= ?,nomInd= ?,prenomInd= ?  WHERE numInd = ?  ");
    $update_one->execute([ $numInd,$nomInd,$prenomInd,$id ]);
    $msg = "Les données de l'individu n°".$id." ont été mises à jour.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*-------------------------------------------------*/
    //SUPPRIMER UN INDIVIDU 
/*--------------------------------------------------*/
function delete_one_individu($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM individu WHERE numInd = ?") 
        ->execute([$id]);
    
        
        $msg = "Supprimé avec succès !";

    }catch(throwable $msg){
        throw $msg;
    }
    
    return $msg;
}

/*---------------------------------------*/
    // Sélectionner IDs des individus
/*--------------------------------------*/
function select_individu_ids(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT numInd, nomInd, prenomInd FROM individu;");
    $select_all->execute();
    $list_all = $select_all->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $list_all;
}

?>