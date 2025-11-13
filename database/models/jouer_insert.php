<?php
/*-----------------------------------------------*/
        //Importation fichier de connexion à la BD
/*-----------------------------------------------*/
require_once('bd_connexion.php'); 
/*---------------------------------------*/
        //Connexion
/*--------------------------------------*/
$pdo = pdo();

/*-----------------------------------------------*/
        //INSERTION DES DONNÉES DE LA BASE
/*-----------------------------------------------*/
try{
        echo "Insertion des données de la table JOUER ...";
    $jouer1 = $pdo->exec("INSERT INTO jouer (numInd,numFilm,roleActeur) 
                                VALUES  ( 1,5,'Grace'),
                                        ( 2,5,'Tom Edison'),
                                        ( 3,4,'Bess'),
                                        ( 4,4,'Jean'),
                                        ( 5,3,'Vincent Vega'),
                                        ( 6,3,'Jules Winnfield');
                        ");

    echo "Succès!".PHP_EOL;

}catch(throwable $th){
    throw $th;
}
