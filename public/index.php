<?php
// 1. On charge l'autoloader de Composer (pour charger tes classes automatiquement)
require '../vendor/autoload.php';

// 2. On démarre la session (pour les messages flash et la connexion utilisateur plus tard)
session_start();

// 3. On instancie le Routeur
$router = new AltoRouter();

// Si ton projet est dans un sous-dossier (ex: localhost/covoiturage-mvc/public), 
// il faut parfois configurer le basePath. Pour l'instant, on laisse vide.
// $router->setBasePath('/covoiturage-mvc/public'); 

// --- DÉFINITION DES ROUTES ---
// (Méthode, URL, Cible, Nom de la route)

// Route pour la page d'accueil
$router->map('GET', '/', 'App\Controllers\MainController#home', 'home');

// --- FIN DES ROUTES ---

// 4. On vérifie si l'URL demandée correspond à une route
$match = $router->match();

// 5. Dispatch (On appelle le bon contrôleur)
if ($match) {
    // On sépare le nom du contrôleur et la méthode (ex: MainController#home)
    list($controllerName, $methodName) = explode('#', $match['target']);
    
    // On crée une instance du contrôleur
    if (class_exists($controllerName)) {
        $controller = new $controllerName($router); // On passe le routeur au contrôleur si besoin
        
        if (method_exists($controller, $methodName)) {
            // On appelle la méthode (ex: $controller->home())
            // call_user_func_array est une façon propre d'appeler une méthode avec des paramètres
            call_user_func_array([$controller, $methodName], $match['params']); 
        } else {
            echo "Erreur : Méthode '$methodName' introuvable dans le contrôleur.";
        }
    } else {
        echo "Erreur : Contrôleur '$controllerName' introuvable.";
    }
} else {
    // Route non trouvée (404)
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "<h1>404 - Page introuvable</h1>";
}