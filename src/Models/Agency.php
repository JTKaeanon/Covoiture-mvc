<?php
namespace App\Models;

class Agency extends Database {

    // Récupérer toutes les agences
    public function findAll() {
        $pdo = $this->getPDO();
        $stmt = $pdo->query("SELECT * FROM agency ORDER BY name ASC");
        return $stmt->fetchAll();
    }

    // Récupérer une agence par ID
    public function find($id) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM agency WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Créer une agence
    public function create($name) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("INSERT INTO agency (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
    }

    // Modifier une agence
    public function update($id, $name) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("UPDATE agency SET name = :name WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name]);
    }

    // Supprimer une agence
    public function delete($id) {
        $pdo = $this->getPDO();
        // Attention : Idéalement, il faudrait vérifier qu'aucun trajet n'utilise cette agence avant de supprimer
        // Mais pour l'exercice, on fait au plus simple.
        $stmt = $pdo->prepare("DELETE FROM agency WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}