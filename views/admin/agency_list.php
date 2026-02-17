<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Agences</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    
    <div class="container mt-5">
        
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🏢 Gestion des Agences</h2>
            <div>
                <a href="/admin" class="btn btn-outline-secondary me-2">Retour Dashboard</a>
                <a href="/admin/agencies/add" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Nouvelle Agence</a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom de la ville</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($agencies as $agency): ?>
                        <tr>
                            <td><?= $agency['id'] ?></td>
                            <td><?= htmlspecialchars($agency['name']) ?></td>
                            <td class="text-end">
                                <a href="/admin/agencies/edit/<?= $agency['id'] ?>" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="/admin/agencies/delete/<?= $agency['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Attention : Supprimer cette agence pourrait casser les trajets liés. Continuer ?')">
                                    <i class="bi bi-trash"></i>
                                </a>
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