<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= isset($agency) ? 'Modifier' : 'Ajouter' ?> une Agence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0"><?= isset($agency) ? 'Modifier' : 'Ajouter' ?> une Agence</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nom de la ville</label>
                                <input type="text" name="name" class="form-control" value="<?= isset($agency) ? htmlspecialchars($agency['name']) : '' ?>" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="/admin/agencies" class="btn btn-outline-secondary">Annuler</a>
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>