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
            border-radius: 15px 15px 15px 5px; /* Petit effet style dessin comme sur la maquette */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .table-header {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body class="container py-4">

    <div class="header-custom">
        <h3 class="m-0">Touche pas au klaxon</h3>
        <a href="/login" class="btn btn-dark">Connexion</a>
    </div>

    <h4 class="mb-4">Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Départ</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Places</th>
                    <th>Actions</th> </tr>
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
                        <i class="bi bi-eye-fill"></i>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer class="text-center mt-5 text-muted">
        © 2024 - CENEF - MVC PHP
    </footer>

</body>
</html>