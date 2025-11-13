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
        echo "Insertion des données de la table CINEMA ...";
    $insert1 = $pdo->exec("INSERT INTO cinema (numCine,nomCine,adresse) 
                                VALUES  ( 1,'Le Renoir', '13100 Aix-en-Provence'),
                                        ( 2,'Le Fontenelle', '78160 Marly-le-Roi'),
                                        ( 3,'Gaumont Wilson', '31000 Toulouse'), 
                                        ( 4,'Espace Cine', 'Epinay-sur-Seine');

                                ");
    echo "Succès!".PHP_EOL;
    
}catch(throwable $th){
    throw $th;
}
