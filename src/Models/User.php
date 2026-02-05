<?php
namespace App\Models;

class User extends Database {

    // Récupérer un utilisateur par son email
    public function findByEmail($email) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        // On retourne l'utilisateur ou 'false' s'il n'existe pas
        return $stmt->fetch();
    }
}