<?php
namespace App\Models;

class User extends Database {

    /** recup user par mail */
    public function findByEmail($email) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    /** admin recup tout les users */
    public function findAll() {
        $pdo = $this->getPDO();
        $stmt = $pdo->query("SELECT * FROM user ORDER BY lastname ASC");
        return $stmt->fetchAll();
    }
}