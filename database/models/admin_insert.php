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
        //INSERTION DES DONNÉES ADMIN À LA BASE
/*-----------------------------------------------*/
$username = 'admin@cine.com';
$password = '1234';
$password_hash= password_hash($password, PASSWORD_DEFAULT);
try {
        $smtp = $pdo->prepare("INSERT INTO admin (username, password) VALUES (?,?)");
        $smtp->execute([$username, $password_hash]);
        echo "Succès! Admin inséré".PHP_EOL;
} catch (Throwable $th) {
        throw $th;
}