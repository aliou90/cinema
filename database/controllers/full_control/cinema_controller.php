<?php
/*--------------------------------------------*/
    #CONTROLLER DE LA TABLE CINEMA
/*-------------------------------------------*/
//SCHEMA DE LA TABLE: CINEMA
$table_name ="cinema";
/*--------------------------------------------*/
$columns[0] = "numCine";   
$columns[1] = "nomCine";    
$columns[2] = "adresse";  

/*---------------------------------------*/
    //SELECT ALL 
/*--------------------------------------*/
function select_all_cinema(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT * FROM cinema");
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
function select_one_cinema($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_one = $pdo->prepare("SELECT * FROM cinema WHERE numCine = ?");
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
function select_many_cinema($col,$value){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();

    $columns[0] = "numCine";   
    $columns[1] = "nomCine";    
    $columns[2] = "adresse";  
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
    $select_many = $pdo->prepare("SELECT * FROM cinema WHERE $key = ? ");
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
function insert_one_cinema($numCine,$nomCine,$adresse) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO cinema (numCine,nomCine,adresse) VALUES ( ?,?,?) ");
    $insert_one->execute([ $numCine,$nomCine,$adresse]);

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

/*---------------------------------------*/
    //UPDATE ROW
/*--------------------------------------*/
function update_row_cinema($row, $new,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_row = $pdo->prepare("UPDATE cinema SET $row= ? WHERE numCIne = ?  ");
    $update_row->execute([ $new,$id ]);
        $msg = "Mise à jour du cinéma n°".$id." éffectuée.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*-------------------------------------------------*/
    //DELETE ONE 
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
    
/*-------------------------------------------------*/
    //DELETE ALL 
/*--------------------------------------------------*/
function delete_all_cinema(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM cinema") 
        ->execute();
        $msg = "Tous les cinémas ont été supprimés.";
    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    

?>    
