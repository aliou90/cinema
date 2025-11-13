<?php
function login($username, $password) {
    require_once(__DIR__."/../models/bd_connexion.php");
    $pdo = pdo();

        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($admin && password_verify($password, $admin['password'])) {
            // Informations d'identification correctes
            return true;
            session_start();
            $_SESSION['admin'] = $username;
        } else {
            // Informations d'identification incorrectes
            return false;
        }
}
