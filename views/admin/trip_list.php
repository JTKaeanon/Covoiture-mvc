<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Trajets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🚗 Gestion des Trajets</h2>
            <a href="/admin" class="btn btn-outline-secondary">Retour Dashboard</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped mb-0 text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Date</th>
                            <th>Départ</th>
                            <th>Arrivée</th>
                            <th>Conducteur</th>
                            <th>Places</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($trips as $trip): ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($trip['date_trip'])) ?></td>
                            <td><?= htmlspecialchars($trip['departure_city']) ?></td>
                            <td><?= htmlspecialchars($trip['arrival_city']) ?></td>
                            <td><?= htmlspecialchars($trip['firstname'] . ' ' . $trip['lastname']) ?></td>
                            <td><?= $trip['available_seats'] ?></td>
                            <td>
                                <a href="/admin/trips/delete/<?= $trip['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('ADMIN : Supprimer ce trajet définitivement ?')">
                                    <i class="bi bi-trash"></i> Supprimer
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php if(empty($trips)): ?>
                            <tr><td colspan="6" class="text-muted p-3">Aucun trajet trouvé.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>