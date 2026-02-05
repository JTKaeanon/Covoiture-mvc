<?php
namespace App\Controllers;

use App\Models\Trip;
use App\Models\Database;

class TripController {
    
    // 1. Affiche le formulaire d'ajout
    public function addForm() {
        // Sécurité : Si pas connecté, on renvoie au login
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        // On récupère la liste des villes pour le menu déroulant
        $db = new Database();
        $pdo = $db->getPDO();
        $stmt = $pdo->query("SELECT * FROM agency ORDER BY name ASC");
        $agencies = $stmt->fetchAll();

        // On affiche la vue (qu'on va créer juste après)
        require __DIR__ . '/../../views/trip_add.php';
    }

    // 2. Traite l'ajout du trajet (quand on valide le formulaire)
    public function add() {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        // Récupération des données du formulaire HTML
        $driver_id = $_SESSION['user']['id'];
        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $price = $_POST['price'];
        $seats = $_POST['seats'];

        // Enregistrement en base de données
        $tripModel = new Trip();
        $tripModel->create($driver_id, $departure, $arrival, $date, $time, $price, $seats);

        // Redirection vers l'accueil
        header('Location: /');
        exit;
    }
}