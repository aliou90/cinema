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
        echo "Insertion des données de la table INDIVIDU ...";
    $insert1 = $pdo->exec("INSERT INTO individu (numInd,nomInd,prenomInd) 
                                VALUES  ( 1,'Kidman','Nicole'),
                                        ( 2,'Bettany','Paul'),
                                        ( 3,'Watson','Emily'),
                                        ( 4,'Skarsgard','Stellan'),
                                        ( 5,'Travolta','John'),
                                        ( 6,'L. Jackson','Samuel'),
                                        ( 7,'Willis','Bruce'),
                                        ( 8,'Irons','Jeremy'),
                                        ( 9,'Spader','James'),
                                        ( 10,'Hunter','Holly'),
                                        ( 11,'Arquette','Rosana'),
                                        ( 12,'Wayne','John'),
                                        ( 13,'Von Trier','Lars'),
                                        ( 14,'Tarantino','Quentin'),
                                        ( 15,'Cronenberg','David'),
                                        ( 16,'Mazursky','Paul'),
                                        ( 17,'John','Grace'),
                                        ( 18,'Glen','John');
                                ");
    echo "Succès!".PHP_EOL;


    }catch(throwable $th){
        throw $th;
}


?>