<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>👥 Liste des Utilisateurs</h2>
            <a href="/admin" class="btn btn-outline-secondary">Retour Dashboard</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['lastname']) ?></td>
                            <td><?= htmlspecialchars($user['firstname']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td>
                                <?php 
                                    // On décode le JSON des rôles (ex: ["ROLE_USER", "ROLE_ADMIN"])
                                    $roles = json_decode($user['roles']);
                                    if(is_array($roles)) {
                                        foreach($roles as $role) {
                                            if($role === 'ROLE_ADMIN') echo '<span class="badge bg-danger me-1">Admin</span>';
                                            else echo '<span class="badge bg-secondary me-1">User</span>';
                                        }
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>