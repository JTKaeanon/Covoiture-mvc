<?php
use PHPUnit\Framework\TestCase;
use App\Models\Trip;

class TripTest extends TestCase {

    public function testCreateTrip() {
        // 1. Instanciation du modèle
        $tripModel = new Trip();
        
        // 2. Données factices pour le test
        $driverId = 3; // ID de l'admin (doit exister en BDD)
        $depId = 1;
        $arrId = 2;
        $date = '2030-01-01';
        $time = '10:00';
        $price = 50;
        $seats = 3;

        // 3. Action : Création (Écriture en BDD)
        $tripModel->create($driverId, $depId, $arrId, $date, $time, $price, $seats);

        // 4. Vérification : On relit la BDD pour voir si le trajet existe
        $pdo = $tripModel->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM trip WHERE date_trip = :date AND driver_id = :driver");
        $stmt->execute(['date' => $date, 'driver' => $driverId]);
        $result = $stmt->fetch();

        // On vérifie que le résultat n'est pas vide et que le prix correspond
        $this->assertIsArray($result, "Le trajet aurait dû être créé en base de données.");
        $this->assertEquals($price, $result['price']);

        // 5. Nettoyage : On supprime le trajet de test pour ne pas polluer la base
        if ($result) {
            $tripModel->delete($result['id']);
        }
    }
}