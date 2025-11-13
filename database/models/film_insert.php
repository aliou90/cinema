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
        echo "Insertion des données de la table FILM ...";
    $film1 = $pdo->exec("INSERT INTO film (numFilm,numInd,titre,genre,annee) 
                                VALUES  ( 5,13,'Dogville','Drame',2002), 
                                        ( 4,13,'Breacking The Weaves','Drame',1996),
                                        ( 3,14,'Pulp Fiction','Policier',1994),
                                        ( 2,15,'Faux Semblants','Epouvante',1988),
                                        ( 1,15,'Crash','Drame',1996),
                                        ( 6,12,'Alamo','Western',1960),
                                        ( 7,18,'Dangereusement votre','Espionnage',1985);
                                ");
    echo "Succès!".PHP_EOL;

}catch(throwable $th){
    throw $th;
}
