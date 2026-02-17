<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    
    /** formulaire HTML */
    public function loginForm() {
        require __DIR__ . '/../../views/login.php';
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);


        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = [
                'id' => $user['id'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'roles' => json_decode($user['roles']) 
            ];


            header('Location: /');
            exit;
        } else {
            /** error */
            $error = "Email ou mot de passe incorrect.";
            require __DIR__ . '/../../views/login.php';
        }
    }


    public function logout() {
        session_destroy(); 
        header('Location: /'); 
        exit;
    }
}