<?php
/*--------------------------------------------*/
    #CONTROLLER DE LA TABLE FILM
/*-------------------------------------------*/
//SCHEMA DE LA TABLE: FILM
$table_name ="film";
/*--------------------------------------------*/
$columns[0] = "numFilm";   
$columns[1] = "numInd";    
$columns[2] = "titre";    
$columns[3] = "genre";   
$columns[4] = "annee";  

/*---------------------------------------*/
    //SELECT ALL 
/*--------------------------------------*/
function select_all_film(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT * FROM film");
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
function select_one_film($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_one = $pdo->prepare("SELECT * FROM film WHERE numFilm = ?");
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
function select_many_film($col,$value){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();

    $columns[0] = "numFilm";   
    $columns[1] = "numInd";    
    $columns[2] = "titre";    
    $columns[3] = "genre";   
    $columns[4] = "annee";

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
    $select_many = $pdo->prepare("SELECT * FROM film WHERE $key = ? ");
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
function insert_one_film($numFilm,$numInd,$titre,$genre,$annee) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO film (numFilm,numInd,titre,genre,annee) VALUES ( ?,?,?,?,?) ");
    $insert_one->execute([ $numFilm,$numInd,$titre,$genre,$annee]);

    $id = $pdo->lastInsertId(); 
    }catch(throwable $th){
        throw $th;
    }
        return $id;
}

/*---------------------------------------*/
    //UPDATE FULL COLUMN  
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

/*---------------------------------------*/
    //UPDATE ROW 
/*--------------------------------------*/
function update_row_film($row, $new,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_row = $pdo->prepare("UPDATE film SET $row= ? WHERE numFilm = ?  ");
    $update_row->execute([ $new,$id ]);
        $msg = "Mise à jour du film n°".$id." éffectuée.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*-------------------------------------------------*/
    //DELETE ONE 
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
    //DELETE ALL
/*--------------------------------------------------*/
function delete_all_film(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM film") 
        ->execute();
        $msg = "Tous les films ont été supprimés.";
    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    

?>    
