<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .header-custom {
            border: 2px solid #333;
            border-radius: 15px 15px 15px 5px;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="container py-4">

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= $_SESSION['error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="header-custom">
        <h3 class="m-0">Touche pas au klaxon</h3>
        <div>
            <?php if(isset($_SESSION['user'])): ?>
                <span class="me-3 fw-bold">Bonjour <?= htmlspecialchars($_SESSION['user']['firstname']) ?> !</span>
                
                <?php if(isset($_SESSION['user']['roles']) && in_array('ROLE_ADMIN', $_SESSION['user']['roles'])): ?>
                    <a href="/admin" class="btn btn-danger btn-sm me-2" title="Accéder à l'administration">
                        <i class="bi bi-gear-fill"></i> Administration
                    </a>
                <?php endif; ?>
                <a href="/logout" class="btn btn-outline-danger btn-sm">Déconnexion</a>
            <?php else: ?>
                <a href="/login" class="btn btn-dark">Connexion</a>
            <?php endif; ?>
        </div>
    </div>

    <?php if(isset($_SESSION['user'])): ?>
        <div class="mb-3 text-end">
            <a href="/trip/add" class="btn btn-success"><i class="bi bi-plus-circle"></i> Ajouter un trajet</a>
        </div>
    <?php else: ?>
        <h4 class="mb-4">Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</h4>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Départ</th><th>Date</th><th>Heure</th><th>Destination</th><th>Date</th><th>Heure</th><th>Places</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($trips as $trip): ?>
                <tr>
                    <td><?= htmlspecialchars($trip['departure_city']) ?></td>
                    <td><?= date('d/m/Y', strtotime($trip['date_trip'])) ?></td>
                    <td><?= substr($trip['time_trip'], 0, 5) ?></td>
                    <td><?= htmlspecialchars($trip['arrival_city']) ?></td>
                    <td><?= date('d/m/Y', strtotime($trip['date_trip'])) ?></td>
                    <td><?= date('H:i', strtotime($trip['time_trip']) + 7200) ?></td>
                    <td><?= htmlspecialchars($trip['available_seats']) ?></td>
                    <td>
                        <?php if(isset($_SESSION['user'])): ?>
                            
                            <button type="button" class="btn btn-sm text-primary mx-1" data-bs-toggle="modal" data-bs-target="#modalTrip<?= $trip['id'] ?>" title="Détails du conducteur">
                                <i class="bi bi-eye-fill"></i>
                            </button>

                            <?php if($trip['driver_id'] == $_SESSION['user']['id']): ?>
                                <a href="/trip/edit/<?= $trip['id'] ?>" class="text-warning mx-1" title="Modifier">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="/trip/delete/<?= $trip['id'] ?>" class="text-danger mx-1" onclick="return confirm('Supprimer ce trajet ?')">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            <?php endif; ?>
                            
                        <?php else: ?>
                            <i class="text-muted bi bi-eye-fill" title="Connectez-vous pour voir"></i>
                        <?php endif; ?>
                    </td>
                </tr>

                <div class="modal fade" id="modalTrip<?= $trip['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title">Détails du trajet</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <p><strong>Conducteur :</strong> <?= htmlspecialchars($trip['firstname'] . ' ' . $trip['lastname']) ?></p>
                                <hr>
                                <p><i class="bi bi-envelope-fill me-2"></i> <?= htmlspecialchars($trip['email']) ?></p>
                                <p><i class="bi bi-telephone-fill me-2"></i> <?= htmlspecialchars($trip['phone']) ?></p>
                                <hr>
                                <div class="alert alert-info mb-0">
                                    <small>Il reste <strong><?= $trip['available_seats'] ?></strong> places disponibles pour ce trajet.</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <?php if(empty($trips)): ?>
                    <tr><td colspan="8" class="text-muted py-4">Aucun trajet disponible pour le moment.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <footer class="text-center mt-5 text-muted">© 2024 - CENEF - MVC PHP</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>