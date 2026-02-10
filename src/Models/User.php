<?php
namespace App\Models;

class User extends Database {

    // Récupérer un utilisateur par son email (Login)
    public function findByEmail($email) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    // --- NOUVEAU : Récupérer TOUS les utilisateurs (Admin) ---
    public function findAll() {
        $pdo = $this->getPDO();
        $stmt = $pdo->query("SELECT * FROM user ORDER BY lastname ASC");
        return $stmt->fetchAll();
    }
}