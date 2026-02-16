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

#### 3. Installation des dépendances
Installez les bibliothèques nécessaires (AltoRouter, PHPUnit...) :
