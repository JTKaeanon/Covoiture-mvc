<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - Touche pas au klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-dark bg-danger mb-4">
        <div class="container">
            <span class="navbar-brand">Administration</span>
            <a href="/" class="btn btn-outline-light btn-sm">Retour au site</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Tableau de bord</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body text-center">
                        <h3 class="card-title">🏢 Agences</h3>
                        <p class="card-text">Gérer les villes de départ/arrivée.</p>
                        <a href="/admin/agencies" class="btn btn-primary">Gérer</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body text-center">
                        <h3 class="card-title">🚗 Trajets</h3>
                        <p class="card-text">Voir et supprimer les trajets.</p>
                        <a href="/admin/trips" class="btn btn-primary">Gérer</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body text-center">
                        <h3 class="card-title">👥 Utilisateurs</h3>
                        <p class="card-text">Liste des employés inscrits.</p>
                        <a href="/admin/users" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>