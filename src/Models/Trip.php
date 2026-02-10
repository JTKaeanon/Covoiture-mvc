<?php
namespace App\Models;

use PDO;

class Trip extends Database {

    // Récupérer les trajets (FILTRE : Uniquement futurs et avec places dispo)
    public function findAll() {
        $pdo = $this->getPDO();
        
        // On filtre : date >= aujourd'hui ET places > 0
        $sql = "
            SELECT 
                t.*, 
                u.firstname, u.lastname,
                dep.name AS departure_city,
                arr.name AS arrival_city
            FROM trip t
            INNER JOIN user u ON t.driver_id = u.id
            INNER JOIN agency dep ON t.departure_agency_id = dep.id
            INNER JOIN agency arr ON t.arrival_agency_id = arr.id
            WHERE t.date_trip >= CURDATE() 
            AND t.available_seats > 0
            ORDER BY t.date_trip ASC
        ";

        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    // Créer un nouveau trajet
    public function create($driver_id, $dep_id, $arr_id, $date, $time, $price, $seats) {
        $pdo = $this->getPDO();
        $sql = "INSERT INTO trip (driver_id, departure_agency_id, arrival_agency_id, date_trip, time_trip, price, available_seats) 
                VALUES (:driver, :dep, :arr, :date, :time, :price, :seats)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'driver' => $driver_id,
            'dep' => $dep_id,
            'arr' => $arr_id,
            'date' => $date,
            'time' => $time,
            'price' => $price,
            'seats' => $seats
        ]);
    }

    // Supprimer un trajet
    public function delete($id) {
        $pdo = $this->getPDO();
        $sql = "DELETE FROM trip WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Récupérer un seul trajet (pour vérification ou édition)
    public function find($id) {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM trip WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Mettre à jour un trajet
    public function update($id, $dep_id, $arr_id, $date, $time, $price, $seats) {
        $pdo = $this->getPDO();
        $sql = "UPDATE trip SET 
                departure_agency_id = :dep,
                arrival_agency_id = :arr,
                date_trip = :date,
                time_trip = :time,
                price = :price,
                available_seats = :seats
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'dep' => $dep_id,
            'arr' => $arr_id,
            'date' => $date,
            'time' => $time,
            'price' => $price,
            'seats' => $seats
        ]);
    }
}