<?php

namespace App\Controllers;

use App\Models\Database;
use PDO;

class MainController {
    
    // Méthode pour la page d'accueil
    public function home() {
        // Testons la connexion à la BDD pour être sûr
        $db = new Database();
        $connexion = $db->getPDO();
        
        // On prépare un petit message de test
        $message = "Bienvenue sur Touche pas au klaxon !";
        if($connexion) {
            $status_bdd = "Connexion BDD : OK ✅";
        } else {
            $status_bdd = "Connexion BDD : ERREUR ❌";
        }

        // On inclut la vue (l'affichage)
        // __DIR__ est le dossier actuel, on remonte pour aller chercher /views
        require __DIR__ . '/../../views/home.php';
    }
}