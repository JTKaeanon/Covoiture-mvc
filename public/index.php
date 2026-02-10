<?php
require '../vendor/autoload.php';
session_start();
$router = new AltoRouter();

// ==============================
// 1. DÉFINITION DES ROUTES
// ==============================

// --- FRONT (Utilisateur) ---
$router->map('GET', '/', 'App\Controllers\MainController#home', 'home');
$router->map('GET', '/login', 'App\Controllers\AuthController#loginForm', 'login_form');
$router->map('POST', '/login', 'App\Controllers\AuthController#login', 'login_process');
$router->map('GET', '/logout', 'App\Controllers\AuthController#logout', 'logout');

// Trajets (Utilisateur)
$router->map('GET', '/trip/add', 'App\Controllers\TripController#addForm', 'trip_add_form');
$router->map('POST', '/trip/add', 'App\Controllers\TripController#add', 'trip_add_process');
$router->map('GET', '/trip/delete/[i:id]', 'App\Controllers\TripController#delete', 'trip_delete');
$router->map('GET', '/trip/edit/[i:id]', 'App\Controllers\TripController#editForm', 'trip_edit_form');
$router->map('POST', '/trip/edit/[i:id]', 'App\Controllers\TripController#edit', 'trip_edit_process');

// --- BACK (Administrateur) ---

// Dashboard
$router->map('GET', '/admin', 'App\Controllers\AdminController#dashboard', 'admin_dashboard');

// Gestion des Agences
$router->map('GET', '/admin/agencies', 'App\Controllers\AdminController#listAgencies', 'admin_agency_list');
$router->map('GET|POST', '/admin/agencies/add', 'App\Controllers\AdminController#addAgency', 'admin_agency_add');
$router->map('GET|POST', '/admin/agencies/edit/[i:id]', 'App\Controllers\AdminController#editAgency', 'admin_agency_edit');
$router->map('GET', '/admin/agencies/delete/[i:id]', 'App\Controllers\AdminController#deleteAgency', 'admin_agency_delete');

// Gestion des Trajets (Admin)
$router->map('GET', '/admin/trips', 'App\Controllers\AdminController#listTrips', 'admin_trip_list');
$router->map('GET', '/admin/trips/delete/[i:id]', 'App\Controllers\AdminController#deleteTrip', 'admin_trip_delete');

// Gestion des Utilisateurs (Admin)
$router->map('GET', '/admin/users', 'App\Controllers\AdminController#listUsers', 'admin_user_list');


// ==============================
// 2. DISPATCH (Traitement)
// ==============================
$match = $router->match();

if ($match) {
    list($controllerName, $methodName) = explode('#', $match['target']);
    
    if (class_exists($controllerName)) {
        $controller = new $controllerName($router); 
        if (method_exists($controller, $methodName)) {
            call_user_func_array([$controller, $methodName], $match['params']); 
        } else { 
            echo "Méthode '$methodName' introuvable dans le contrôleur '$controllerName'"; 
        }
    } else { 
        echo "Contrôleur '$controllerName' introuvable. Vérifiez que le fichier existe dans src/Controllers/"; 
    }
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "<h1>404 - Page introuvable</h1>";
    echo "<p>La route demandée n'existe pas.</p>";
}