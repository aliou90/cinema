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