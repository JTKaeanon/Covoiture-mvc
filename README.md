#  Touche pas au klaxon - Covoiturage MVC

projet **Touche pas au klaxon** application de covoiturage



##  Fonctionnalités

L'application permet de gérer des trajets entre différentes villes (Agences) :

* **Visiteurs** : Consultation des trajets disponibles 
* **Membres** :
    * Inscription et Connexion sécurisée.
    * Publication de nouveaux trajets
    * Modification et suppression de ses propres trajets.
* **Administrateur** :
    * Accès à un tableau de bord 
    * Gestion complète des utilisateurs 
    * Gestion des trajets .
    * Gestion des villes/agences 

##  Technique

* **Langage** : PHP
* **Architecture** : MVC
* **Base de données** : MySQL.
* **Routage** : [AltoRouter](https://github.com/dannyvankooten/AltoRouter).

* **Qualité & Tests** : PHPStan , PHPUnit 

##  Installation et Lancement

Suivez ces étapes pour lancer le projet sur votre machine locale.

### 1. Pré-requis
* PHP installé.
* Composer installé
* Un serveur MySQL (WAMP, XAMPP, Laragon...).

### 2. Récupération du projet
Clonez le dépôt GitHub :
```bash
git clone [METTRE_TON_LIEN_GITHUB_ICI]
cd covoiturage-mvc
```

#### 3. Installation des dépendances
Installez les bibliothèques nécessaires (AltoRouter, PHPUnit...) :
```bash
composer install
```

###### 4. 4. Configuration de la Base de Données
Ouvrez votre gestionnaire de base de données (ex: PhpMyAdmin).

Créez une nouvelle base de données nommée : covoiturage_mvc.

Importez le fichier de structure : structure.sql (fourni à la racine).

Importez le jeu de données : donnees.sql (fourni à la racine).

Important : Vérifiez vos identifiants de connexion dans le fichier src/Models/Database.php.

Par défaut configuré sur : User root, sans mot de passe, Port 3307.

Si vous utilisez XAMPP/WAMP standard, changez le port pour 3306.


###### 6. Lancement du serveur 
Ouvrez un terminal à la racine du projet et lancez le serveur interne de PHP :
``` bash
php -S localhost:8000 -t public
```
Rendez-vous ensuite sur votre navigateur à l'adresse : http://localhost:8000

Identifiants de test
Pour tester l'application immédiatement, vous pouvez utiliser ces comptes pré-configurés :

Administrateur             admin@klaxon.fr                   123456 | 
Utilisateur                sophie.dubois@email.fr            123456

Tests

Analyse Statique (PHPStan)
``` bash
vendor/bin/phpstan analyse
```

Tests Unitaires (PHPUnit)
``` bash
vendor/bin/phpunit
```
