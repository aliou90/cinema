<?php
// Connection à la base de données
function pdo(){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=bdcinema2023', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");      
        
        return $pdo;
    
    
    } catch (PDOException $e) {
        die("Erreur: ".$e->getMessage());
    }
    
}


// // Connexion à une base SQLite
// function pdo(){
//     try {
//         // Le fichier SQLite sera stocké ici (ou crée s'il n'existe pas)
//         $file = __DIR__ . '/../bdcinema2023.sqlite';
        
//         // Connexion PDO
//         $pdo = new PDO("sqlite:$file");
        
//         // Gestion des erreurs
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
//         // Pour forcer l'UTF-8
//         $pdo->exec("PRAGMA encoding = 'UTF-8';");
        
//         return $pdo;

//     } catch (PDOException $e) {
//         die("Erreur: ".$e->getMessage());
//     }
// }
