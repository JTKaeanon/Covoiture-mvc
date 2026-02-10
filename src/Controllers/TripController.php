<?php
namespace App\Controllers;

use App\Models\Trip;
use App\Models\Database;

class TripController {
    
    // --- PARTIE AJOUT ---

    // 1. Formulaire d'ajout
    public function addForm() {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }

        $db = new Database();
        $pdo = $db->getPDO();
        $stmt = $pdo->query("SELECT * FROM agency ORDER BY name ASC");
        $agencies = $stmt->fetchAll();

        require __DIR__ . '/../../views/trip_add.php';
    }

    // 2. Traitement de l'ajout
    public function add() {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }

        // Vérification : Départ != Arrivée
        if ($_POST['departure'] == $_POST['arrival']) {
            $_SESSION['error'] = "La ville de départ et d'arrivée doivent être différentes.";
            
            // 🛑 CORRECTION ICI : On renvoie vers le formulaire "/trip/add", PAS vers l'accueil "/"
            header('Location: /trip/add'); 
            exit;
        }

        $tripModel = new Trip();
        $tripModel->create($_SESSION['user']['id'], $_POST['departure'], $_POST['arrival'], $_POST['date'], $_POST['time'], $_POST['price'], $_POST['seats']);
        
        $_SESSION['success'] = "Trajet publié avec succès !";
        header('Location: /');
        exit;
    }

    // --- PARTIE SUPPRESSION ---

    public function delete($id) {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }

        $tripModel = new Trip();
        $trip = $tripModel->find($id);

        if ($trip && $trip['driver_id'] == $_SESSION['user']['id']) {
            $tripModel->delete($id);
            $_SESSION['success'] = "Trajet supprimé.";
        } else {
            $_SESSION['error'] = "Vous n'avez pas le droit de supprimer ce trajet.";
        }

        header('Location: /');
        exit;
    }

    // --- PARTIE MODIFICATION ---

    // 3. Formulaire de modification
    public function editForm($id) {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }

        $tripModel = new Trip();
        $trip = $tripModel->find($id);

        if (!$trip || $trip['driver_id'] != $_SESSION['user']['id']) {
            $_SESSION['error'] = "Accès refusé.";
            header('Location: /');
            exit;
        }

        $db = new Database();
        $pdo = $db->getPDO();
        $stmt = $pdo->query("SELECT * FROM agency ORDER BY name ASC");
        $agencies = $stmt->fetchAll();

        require __DIR__ . '/../../views/trip_edit.php';
    }

    // 4. Traitement de la modification
    public function edit($id) {
        if (!isset($_SESSION['user'])) { header('Location: /login'); exit; }
        
        // Vérification : Départ != Arrivée
        if ($_POST['departure'] == $_POST['arrival']) {
            $_SESSION['error'] = "La ville de départ et d'arrivée doivent être différentes.";
            
            // 🛑 CORRECTION ICI : On renvoie vers l'édition "/trip/edit/...", PAS vers l'accueil
            header("Location: /trip/edit/$id"); 
            exit;
        }

        // Vérification de sécurité
        $tripModel = new Trip();
        $trip = $tripModel->find($id);
        if ($trip['driver_id'] != $_SESSION['user']['id']) {
            header('Location: /');
            exit;
        }

        $tripModel->update($id, $_POST['departure'], $_POST['arrival'], $_POST['date'], $_POST['time'], $_POST['price'], $_POST['seats']);
        
        $_SESSION['success'] = "Trajet modifié avec succès.";
        header('Location: /');
        exit;
    }
}