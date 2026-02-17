<?php

use PHPUnit\Framework\TestCase;
use App\Models\Trip;

/**
 * Test de la classe Trip
 * On vérifie ici que la création d’un trajet fonctionne bien.
 */
class TripTest extends TestCase {

    /**
     * Test pour créer un trajet
     * On crée un trajet puis on vérifie qu’il est bien enregistré en base.
     */
    public function testCreateTrip() {
        
        /**  On crée une instance du modèle Trip */
        $tripModel = new Trip();
        
        /** Données de test pour le trajet */
        $driverId = 3;
        $depId = 1;
        $arrId = 2;
        $date = '2030-01-01';
        $time = '10:00';
        $price = 50;
        $seats = 3;

        /** On appelle la méthode create pour insérer le trajet */
        $tripModel->create($driverId, $depId, $arrId, $date, $time, $price, $seats);

        /**  On récupère la connexion à la base */
        $pdo = $tripModel->getPDO();

        /**  On vérifie que le trajet a bien été ajouté */
        $stmt = $pdo->prepare("SELECT * FROM trip WHERE date_trip = :date AND driver_id = :driver");
        $stmt->execute([
            'date' => $date, 
            'driver' => $driverId
        ]);

        $result = $stmt->fetch();

        /**  On vérifie que la requête retourne bien un résultat */
        $this->assertIsArray($result, "Le trajet n'a pas été créé correctement.");

        /**  On vérifie que le prix correspond à celui qu’on a mis */
        $this->assertEquals($price, $result['price']);

        /**  On supprime le trajet créé pour ne pas laisser de données de test */
        if ($result) {
            $tripModel->delete($result['id']);
        }
    }
}
