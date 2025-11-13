<?php
/*--------------------------------------------*/
    #CONTROLLER DE LA TABLE INDIVIDU
/*-------------------------------------------*/
//SCHEMA DE LA TABLE: INDIVIDU
$table_name ="individu";
/*--------------------------------------------*/
$columns[0] = "numInd";   
$columns[1] = "nomInd";    
$columns[2] = "prenomInd";  

/*---------------------------------------*/
    //SELECT ALL 
/*--------------------------------------*/
function select_all_individu(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_all = $pdo->prepare("SELECT * FROM individu");
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
function select_one_individu($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $select_one = $pdo->prepare("SELECT * FROM individu WHERE numInd = ?");
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
function select_many_individu($col,$value){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();

    $columns[0] = "numInd";   
    $columns[1] = "nomInd";    
    $columns[2] = "prenomInd";  
      
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
    $select_many = $pdo->prepare("SELECT * FROM individu WHERE $key = ? ");
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
function insert_one_individu($numInd,$nomInd,$prenomInd) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $insert_one = $pdo->prepare("INSERT INTO individu (numInd,nomInd,prenomInd) VALUES ( ?,?,?) ");
    $insert_one->execute([ $numInd,$nomInd,$prenomInd]);

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

/*---------------------------------------*/
    //UPDATE ROW
/*--------------------------------------*/
function update_row_individu($row, $new,$id) {
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $update_row = $pdo->prepare("UPDATE individu SET $row= ? WHERE numInd = ?  ");
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
function delete_one_individu($id){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM individu WHERE numInd = ?") 
        ->execute([$id]);
        
        $msg = "L'individu' n°".$id." a été supprimé";

    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    
/*-------------------------------------------------*/
    //DELETE ALL 
/*--------------------------------------------------*/
function delete_all_individu(){
    require_once(__DIR__."\..\models\bd_connexion.php");
    $pdo = pdo();
    try{
    $pdo->prepare("DELETE FROM individu") 
        ->execute();
        $msg = "Tous les individu ont été supprimés.";
    }catch(throwable $th){
        throw $th;
    }
    
    return $msg;
}
    

?>    
