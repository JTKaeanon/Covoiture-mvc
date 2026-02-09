<?php

namespace App\Models;

use PDO;
use PDOException;

class Database {
    // ⚠️ IMPORTANT : On force l'IP et non "localhost"
    private $host = "127.0.0.1"; 
    private $db_name = "covoiturage_mvc";
    private $username = "root";
    private $password = ""; 
    
    private $connexion;

    public function getPDO() {
        $this->connexion = null;

        try {
            // ⚠️ IMPORTANT : Vérifie que ";port=3307" est bien écrit ici 👇
            $this->connexion = new PDO(
                "mysql:host=" . $this->host . ";port=3307;dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            // On affiche l'erreur précise pour t'aider à débugger
            die("Erreur de connexion BDD : " . $exception->getMessage());
        }

        return $this->connexion;
    }
}