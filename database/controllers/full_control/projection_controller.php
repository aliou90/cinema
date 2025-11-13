<?php
/*--------------------------------------------*/
    #CONTROLLER DE LA TABLE PROJECTION
/*-------------------------------------------*/
//SCHEMA DE LA TABLE: PROJECTION
$table_name ="projection";
/*--------------------------------------------*/
$columns[0] = "numProj";   
$columns[1] = "numCine";
$columns[2] = "numFilm";    
$columns[3] = "dateProjection";  

/*---------------------------------------*/
    //SELECT ALL 
/*--------------------------------------*/
function select_all_projection(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT * FROM projection");
    $select_all->execute();
    $list_all = $select_all->fetchAll();

    }catch(throwable $th){
        throw $th;
    }

    return $list_all;
}


/*---------------------------------------*/
    //SELECT ONE  
/*--------------------------------------*/
function select_one_projection($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_one = $pdo->prepare("SELECT * FROM projection WHERE numProj = ?");
    $select_one->execute([$id]);
    $list_one = $select_one->fetch();
    }catch(throwable $th){
        throw $th;
    }
    return $list_one; 
}



/*---------------------------------------*/
    //SELECT MANY 
/*--------------------------------------*/
function select_many_projection($col,$value){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();

    $columns[0] = "numProj";   
    $columns[1] = "numCine";
    $columns[2] = "numFilm";    
    $columns[3] = "dateProjection";  
    try{
        #----------------------------------
            #----Rechercher le mot clé
        #--------------------------------
    $c = count($columns);
    for ($i = 0; $i <= $c - 1; $i++){
        if ($col == $columns[$i]) {
            $key = $col;
        }
    }
        #--------------------------------
            #-- Requête avec le mot clé  
    $select_many = $pdo->prepare("SELECT * FROM projection WHERE $key = ? ");
    $select_many->execute([$value]);
    $list_many = $select_many->fetchAll();
    }catch(throwable $th){
        throw $th;
    }
    return $list_many;
}


/*---------------------------------------*/
    //INSERT ONE
/*--------------------------------------*/
function insert_one_projection($numProj,$numCine,$numFilm,$dateProjection) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO projection (numProj,numCine,numFilm,dateProjection) VALUES ( ?,?,?,?) ");
    $insert_one->execute([ $numProj,$numCine,$numFilm,$dateProjection]);

    $id = $pdo->lastInsertId(); 
    $msg = "Insertion réussie. Numéro de la dernière insertion ".$id;
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*---------------------------------------*/
    //UPDATE FULL COLUMN 
/*--------------------------------------*/
function update_col_projection($numProj,$numCine,$numFilm,$dateProjection,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_one = $pdo->prepare("UPDATE projection SET numProj= ?,numCine= ?, numFilm= ?, dateProjection= ?  WHERE numProj = ? ");
    $update_one->execute([ $numProj,$numCine,$numFilm,$dateProjection,$id ]);
    $msg = "La relation projection n°".$id." a été mise à jour.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*---------------------------------------*/
    //UPDATE ROW
/*--------------------------------------*/
function update_row_projection($row, $new,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_row = $pdo->prepare("UPDATE projection SET $row= ? WHERE numProj = ?  ");
    $update_row->execute([ $new,$id ]);
        $msg = "Mise à jour de l'enregistrement n°".$id." éffectuée.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*-------------------------------------------------*/
    //DELETE ONE 
/*--------------------------------------------------*/
function delete_one_projection($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM projection WHERE numProj = ?") 
        ->execute([$id]);
        
        $msg = "La relation projection n°".$id." a été supprimée";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    
/*-------------------------------------------------*/
    //DELETE ALL 
/*--------------------------------------------------*/
function delete_all_projection(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM projection") 
        ->execute();
        $msg = "Toutes les relations projection ont été supprimées.";
    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    

?>    
