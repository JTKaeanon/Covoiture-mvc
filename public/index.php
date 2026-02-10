<?php
require '../vendor/autoload.php';
session_start();
$router = new AltoRouter();

// --- ROUTES ---
$router->map('GET', '/', 'App\Controllers\MainController#home', 'home');
$router->map('GET', '/login', 'App\Controllers\AuthController#loginForm', 'login_form');
$router->map('POST', '/login', 'App\Controllers\AuthController#login', 'login_process');
$router->map('GET', '/logout', 'App\Controllers\AuthController#logout', 'logout');

// Trajets (Ajout, Suppression, Modification)
$router->map('GET', '/trip/add', 'App\Controllers\TripController#addForm', 'trip_add_form');
$router->map('POST', '/trip/add', 'App\Controllers\TripController#add', 'trip_add_process');
$router->map('GET', '/trip/delete/[i:id]', 'App\Controllers\TripController#delete', 'trip_delete');

// NOUVEAU : Modification
$router->map('GET', '/trip/edit/[i:id]', 'App\Controllers\TripController#editForm', 'trip_edit_form');
$router->map('POST', '/trip/edit/[i:id]', 'App\Controllers\TripController#edit', 'trip_edit_process');

// --- DISPATCH ---
$match = $router->match();
if ($match) {
    list($controllerName, $methodName) = explode('#', $match['target']);
    if (class_exists($controllerName)) {
        $controller = new $controllerName($router); 
        if (method_exists($controller, $methodName)) {
            call_user_func_array([$controller, $methodName], $match['params']); 
        } else { echo "Méthode introuvable"; }
    } else { echo "Contrôleur introuvable"; }
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "<h1>404 - Page introuvable</h1>";
}