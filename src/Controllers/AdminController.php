<?php
namespace App\Controllers;

use App\Models\Agency;
use App\Models\Trip;
use App\Models\User;

class AdminController {
    
    // Sécurité : Vérifie si Admin
    private function isAdmin() {
        if (!isset($_SESSION['user'])) return false;
        return in_array('ROLE_ADMIN', $_SESSION['user']['roles']);
    }

    // Tableau de bord
    public function dashboard() {
        if (!$this->isAdmin()) { header('Location: /'); exit; }
        require __DIR__ . '/../../views/admin/dashboard.php';
    }

    // ========================
    // GESTION DES AGENCES
    // ========================

    public function listAgencies() {
        if (!$this->isAdmin()) { header('Location: /'); exit; }
        $agencyModel = new Agency();
        $agencies = $agencyModel->findAll();
        require __DIR__ . '/../../views/admin/agency_list.php';
    }

    public function addAgency() {
        if (!$this->isAdmin()) { header('Location: /'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $agencyModel = new Agency();
            $agencyModel->create($_POST['name']);
            $_SESSION['success'] = "Agence créée avec succès.";
            header('Location: /admin/agencies');
            exit;
        }
        require __DIR__ . '/../../views/admin/agency_form.php';
    }

    public function editAgency($id) {
        if (!$this->isAdmin()) { header('Location: /'); exit; }
        $agencyModel = new Agency();
        $agency = $agencyModel->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $agencyModel->update($id, $_POST['name']);
            $_SESSION['success'] = "Agence modifiée.";
            header('Location: /admin/agencies');
            exit;
        }
        require __DIR__ . '/../../views/admin/agency_form.php';
    }

    public function deleteAgency($id) {
        if (!$this->isAdmin()) { header('Location: /'); exit; }
        $agencyModel = new Agency();
        $agencyModel->delete($id);
        $_SESSION['success'] = "Agence supprimée.";
        header('Location: /admin/agencies');
        exit;
    }

    // ========================
    // GESTION DES TRAJETS
    // ========================

    public function listTrips() {
        if (!$this->isAdmin()) { header('Location: /'); exit; }
        
        $tripModel = new Trip();
        $trips = $tripModel->findAllForAdmin();
        
        require __DIR__ . '/../../views/admin/trip_list.php';
    }

    public function deleteTrip($id) {
        if (!$this->isAdmin()) { header('Location: /'); exit; }

        $tripModel = new Trip();
        $tripModel->delete($id);
        
        $_SESSION['success'] = "Trajet supprimé par l'administrateur.";
        header('Location: /admin/trips');
        exit;
    }

    // ========================
    // GESTION DES UTILISATEURS
    // ========================

    public function listUsers() {
        if (!$this->isAdmin()) { header('Location: /'); exit; }
        
        $userModel = new User();
        $users = $userModel->findAll();
        
        require __DIR__ . '/../../views/admin/user_list.php';
    }
}