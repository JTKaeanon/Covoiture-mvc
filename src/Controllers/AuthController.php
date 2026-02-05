<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    
    // 1. Affiche le formulaire HTML
    public function loginForm() {
        require __DIR__ . '/../../views/login.php';
    }

    // 2. Traite les données du formulaire
    public function login() {
        // On récupère les données du formulaire
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // On cherche l'utilisateur en BDD
        $userModel = new User();
        $user = $userModel->findByEmail($email);

        // Si l'utilisateur existe ET que le mot de passe correspond au hash
        if ($user && password_verify($password, $user['password'])) {
            // SUCCÈS : On enregistre l'utilisateur en session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'roles' => json_decode($user['roles']) // On décode le JSON des rôles
            ];

            // On redirige vers l'accueil
            header('Location: /');
            exit;
        } else {
            // ÉCHEC : On affiche une erreur
            $error = "Email ou mot de passe incorrect.";
            require __DIR__ . '/../../views/login.php';
        }
    }

    // 3. Déconnexion
    public function logout() {
        session_destroy(); // On détruit la session
        header('Location: /'); // Retour à l'accueil
        exit;
    }
}