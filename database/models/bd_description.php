<?php 
/*---------------------------------------*/
        //Créer la BD s'Il n'existe pas
/*--------------------------------------*/
$servername = 'localhost';
$username = 'root';
$password = '';

try{
    $dbco = new PDO("mysql:host=$servername", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    #--------- SUPPRESSION BD EXISTANTS ---#
    $sql1 = "DROP DATABASE IF EXISTS bdcinema2023";
    $dbco->exec($sql1);
    
    #--------- CRÉATION NOUVELLE BD ---#
    $sql2 = "CREATE DATABASE bdcinema2023";
    $dbco->exec($sql2);
    
    echo 'Base de données bdcinema2023 bien créée !'.PHP_EOL;
}

catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}



/*-----------------------------------------------*/
        //Importation fichier de connexion à la BD
/*-----------------------------------------------*/
require_once('bd_connexion.php'); 


/*---------------------------------------*/
        //Connexion
/*--------------------------------------*/
$pdo = pdo();

#--------------------------------------#
    # DESCRIPTION TABLES CINÉMA
#--------------------------------------#    
try {
    echo "Création de la table CINÉMA.";
        $posts = $pdo->prepare("CREATE TABLE cinema (
            numCine INTEGER PRIMARY KEY AUTO_INCREMENT,
            nomCine VARCHAR(20) NOT NULL,
            adresse VARCHAR(40) NOT NULL
            );
        ");
    
    $posts->execute();
    echo "Terminée!".PHP_EOL;
} catch (PDOException $err) {
        throw($err);
} 

#--------------------------------------#
    # DESCRIPTION TABLES INDIVIDU
#--------------------------------------#    
try {
    echo "Création de la table INDIVIDU.";
        $posts = $pdo->prepare("CREATE TABLE individu (
        numInd INTEGER PRIMARY KEY AUTO_INCREMENT,
        nomInd VARCHAR(30) NOT NULL,
        prenomInd VARCHAR(35) NOT NULL
        );
        ");
    
    $posts->execute();
    echo "Terminée!".PHP_EOL;
    
} catch (PDOException $err) {
        throw($err);
} 

#--------------------------------------#
    # DESCRIPTION TABLES FILM 
#--------------------------------------#    
try {
    echo "Création de la table FILM.";
        $posts = $pdo->prepare("CREATE TABLE film (
            numFilm INTEGER PRIMARY KEY AUTO_INCREMENT,
            numInd INTEGER NOT NULL,
            titre VARCHAR(25) NOT NULL,
            genre VARCHAR(15) NOT NULL,
            annee INT NOT NULL,
            CONSTRAINT FK_film FOREIGN KEY(numInd) REFERENCES individu(numInd)
            );
        ");
    
    $posts->execute();
    echo "Terminée!".PHP_EOL;
} catch (PDOException $err) {
        throw($err);
} 


#--------------------------------------#
    # DESCRIPTION TABLES JOUER 
#--------------------------------------#    
try {
    echo "Création de la table JOUER.";
        $query = $pdo->prepare("CREATE TABLE jouer (
            numInd INTEGER NOT NULL,
            numFilm INTEGER NOT NULL,
            roleActeur VARCHAR(35) NOT NULL,
            CONSTRAINT PK_jouer PRIMARY KEY(numFilm,numInd),
            CONSTRAINT fk2_jouer FOREIGN KEY(numFilm) REFERENCES film(numFilm),
            CONSTRAINT fk1_jouer FOREIGN KEY(numInd) REFERENCES individu(numInd)
            );
        ");
    
     $query->execute();
     echo "Terminée!".PHP_EOL;
} catch (Throwable $th) {
        throw $th;
}

#--------------------------------------#
    # DESCRIPTION TABLES PROJECTION
#--------------------------------------#    
try {
    echo "Création de la table PROJECTION.";
        $query = $pdo->prepare("CREATE TABLE projection (    
                                numCine INTEGER NOT NULL,
                                numFilm INTEGER NOT NULL,
                                dateProjection DATE,
                                CONSTRAINT PK_projection PRIMARY KEY(numCine,numFilm,dateProjection),
                                CONSTRAINT fk1_projection FOREIGN KEY(numCine) REFERENCES cinema(numCine),
                                CONSTRAINT fk2_projection FOREIGN KEY(numFilm) REFERENCES film(numFilm)
                                );
        ");
    
     $query->execute();
     echo "Terminée!".PHP_EOL;
} catch (Throwable $th) {
        throw $th;
}

#--------------------------------------#
    # DESCRIPTION TABLES ADMINISTRATEUR
#--------------------------------------#   
try {
    echo "Création de la table ADMIN.";
    $stmt = $pdo->prepare("CREATE TABLE admin (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(20) NOT NULL,
        password VARCHAR(255) NOT NULL
    )");
    
    $stmt->execute();
    echo "Terminée!".PHP_EOL;
} catch (PDOException $err) {
    throw $err;
}
