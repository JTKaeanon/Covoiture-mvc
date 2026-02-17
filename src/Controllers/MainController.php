<?php
namespace App\Controllers;

use App\Models\Trip; /** import model */

class MainController {
    
    public function home() {
        
        $tripModel = new Trip();
        
        
        $trips = $tripModel->findAll();
        
        
        require __DIR__ . '/../../views/home.php';
    }
}