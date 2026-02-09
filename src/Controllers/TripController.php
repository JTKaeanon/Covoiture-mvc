<?php
namespace App\Controllers;

use App\Models\Trip;
use App\Models\Database;

class TripController {
    
    // Formulaire d'ajout
    public function addForm() {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }
        $db = new Database();
        $pdo = $db->getPDO();
        $stmt = $pdo->query("SELECT * FROM agency ORDER BY name ASC");
        $agencies = $stmt->fetchAll();
        require __DIR__ . '/../../views/trip_add.php';
    }

    // Traitement de l'ajout
    public function add() {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }
        $tripModel = new Trip();
        $tripModel->create($_SESSION['user']['id'], $_POST['departure'], $_POST['arrival'], $_POST['date'], $_POST['time'], $_POST['price'], $_POST['seats']);
        header('Location: /');
        exit;
    }

    // Suppression
    public function delete($id) {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }
        $tripModel = new Trip();
        $tripModel->delete($id);
        header('Location: /');
        exit;
    }

    // --- NOUVEAU : Formulaire de modification ---
    public function editForm($id) {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }

        $tripModel = new Trip();
        $trip = $tripModel->find($id);

        // Si le trajet n'existe pas ou n'appartient pas à l'utilisateur, on redirige
        if (!$trip || $trip['driver_id'] != $_SESSION['user']['id']) {
            header('Location: /');
            exit;
        }

        // On récupère les villes
        $db = new Database();
        $pdo = $db->getPDO();
        $stmt = $pdo->query("SELECT * FROM agency ORDER BY name ASC");
        $agencies = $stmt->fetchAll();

        require __DIR__ . '/../../views/trip_edit.php';
    }

    // --- NOUVEAU : Traitement de la modification ---
    public function edit($id) {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }
        
        $tripModel = new Trip();
        $tripModel->update($id, $_POST['departure'], $_POST['arrival'], $_POST['date'], $_POST['time'], $_POST['price'], $_POST['seats']);
        
        header('Location: /');
        exit;
    }
}