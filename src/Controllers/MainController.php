<?php
namespace App\Controllers;

use App\Models\Trip; // On importe le modèle

class MainController {
    
    public function home() {
        // 1. On instancie le modèle
        $tripModel = new Trip();
        
        // 2. On récupère les données
        $trips = $tripModel->findAll();
        
        // 3. On envoie les données à la vue
        // La variable $trips sera accessible directement dans home.php
        require __DIR__ . '/../../views/home.php';
    }
}