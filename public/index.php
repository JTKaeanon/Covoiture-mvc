<?php

// 1. On charge l'autoloader de Composer
require '../vendor/autoload.php';

// 2. On démarre la session
session_start();

// 3. On instancie le Routeur
$router = new AltoRouter();

// --- DÉFINITION DES ROUTES ---

// Accueil
$router->map('GET', '/', 'App\Controllers\MainController#home', 'home');

// Connexion
$router->map('GET', '/login', 'App\Controllers\AuthController#loginForm', 'login_form');
$router->map('POST', '/login', 'App\Controllers\AuthController#login', 'login_process');

// Déconnexion
$router->map('GET', '/logout', 'App\Controllers\AuthController#logout', 'logout');

// --- NOUVELLES ROUTES A INTÉGRER ---
// Ajouter un trajet
$router->map('GET', '/trip/add', 'App\Controllers\TripController#addForm', 'trip_add_form');
$router->map('POST', '/trip/add', 'App\Controllers\TripController#add', 'trip_add_process');

// --- FIN DES ROUTES ---

// 4. On vérifie si l'URL demandée correspond à une route
$match = $router->match();

// 5. Dispatch
if ($match) {
    list($controllerName, $methodName) = explode('#', $match['target']);
    
    if (class_exists($controllerName)) {
        $controller = new $controllerName($router); 
        
        if (method_exists($controller, $methodName)) {
            call_user_func_array([$controller, $methodName], $match['params']); 
        } else {
            echo "Erreur : Méthode '$methodName' introuvable.";
        }
    } else {
        echo "Erreur : Contrôleur '$controllerName' introuvable.";
    }
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "<h1>404 - Page introuvable</h1>";
}