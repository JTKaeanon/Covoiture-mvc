<?php
namespace App\Models;

class Agency extends Database {

    /** recupere agence */
    public function findAll() {
        $pdo = $this->getPDO();
        $stmt = $pdo->query("SELECT * FROM agency ORDER BY name ASC");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM agency WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    /** creer agence */
    public function create($name) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("INSERT INTO agency (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
    }

    /** modifer agence */
    public function update($id, $name) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("UPDATE agency SET name = :name WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name]);
    }

    /** suppr agence */
    public function delete($id) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("DELETE FROM agency WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}