<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un trajet - Touche pas au klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Publier une annonce</h4>
                    </div>
                    <div class="card-body p-4">

                        <form action="/trip/add" method="POST">
                            
                            <div class="mb-3">
                                <label for="departure" class="form-label">Départ</label>
                                <select name="departure" id="departure" class="form-select" required>
                                    <option value="">Choisir une ville...</option>
                                    <?php foreach($agencies as $agency): ?>
                                        <option value="<?= $agency['id'] ?>"><?= htmlspecialchars($agency['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="arrival" class="form-label">Destination</label>
                                <select name="arrival" id="arrival" class="form-select" required>
                                    <option value="">Choisir une ville...</option>
                                    <?php foreach($agencies as $agency): ?>
                                        <option value="<?= $agency['id'] ?>"><?= htmlspecialchars($agency['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="time" class="form-label">Heure</label>
                                    <input type="time" name="time" id="time" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Prix par place (€)</label>
                                    <input type="number" name="price" id="price" class="form-control" min="0" step="0.5" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="seats" class="form-label">Places dispo</label>
                                    <input type="number" name="seats" id="seats" class="form-control" min="1" max="8" value="1" required>
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-outline-secondary">Annuler</a>
                                <button type="submit" class="btn btn-success">Publier le trajet</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>