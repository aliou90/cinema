<?php
/*--------------------------------------------*/
    #CONTROLLER DE LA TABLE JOUER
/*-------------------------------------------*/
//SCHEMA DE LA TABLE: JOUER
$table_name ="jouer";
/*--------------------------------------------*/
$columns[0] = "numJouer";   
$columns[1] = "numInd";
$columns[2] = "numFilm";    
$columns[3] = "roleActeur";  

/*---------------------------------------*/
    //SELECT ALL 
/*--------------------------------------*/
function select_all_jouer(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT * FROM jouer");
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
function select_one_jouer($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_one = $pdo->prepare("SELECT * FROM jouer WHERE numJouer = ?");
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
function select_many_jouer($col,$value){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();

    $columns[0] = "numJouer";   
    $columns[1] = "numInd";
    $columns[2] = "numFilm";    
    $columns[3] = "roleActeur"; 
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
    $select_many = $pdo->prepare("SELECT * FROM jouer WHERE $key = ? ");
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
function insert_one_jouer($numJouer,$numInd,$numFilm,$roleActeur) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO jouer (numJouer,numInd,numFilm,roleActeur) VALUES ( ?,?,?,?) ");
    $insert_one->execute([ $numJouer,$numInd,$numFilm,$roleActeur]);

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
function update_col_jouer($numJouer,$numInd,$numFilm,$roleActeur,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_one = $pdo->prepare("UPDATE jouer SET numJouer= ?,numInd= ?, numFilm= ?, roleActeur= ?  WHERE numJouer = ? ");
    $update_one->execute([ $numJouer,$numInd,$numFilm,$roleActeur,$id ]);
    $msg = "La relation jouer n°".$id." a été mise à jour.";
    }catch(throwable $th){
        throw $th;
    }
        return $msg;
}

/*---------------------------------------*/
    //UPDATE ROW
/*--------------------------------------*/
function update_row_jouer($row, $new,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_row = $pdo->prepare("UPDATE jouer SET $row= ? WHERE numJouer = ?  ");
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
function delete_one_jouer($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM jouer WHERE numJouer = ?") 
        ->execute([$id]);
        
        $msg = "La relation jouer n°".$id." a été supprimée";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    
/*-------------------------------------------------*/
    //DELETE ALL 
/*--------------------------------------------------*/
function delete_all_jouer(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM jouer") 
        ->execute();
        $msg = "Toutes les relations jouer ont été supprimées.";
    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    

?>    
