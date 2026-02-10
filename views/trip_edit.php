<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Modifier mon annonce</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="/trip/edit/<?= $trip['id'] ?>" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label">Départ</label>
                                <select name="departure" class="form-select" required>
                                    <?php foreach($agencies as $agency): ?>
                                        <option value="<?= $agency['id'] ?>" <?= ($trip['departure_agency_id'] == $agency['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($agency['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Destination</label>
                                <select name="arrival" class="form-select" required>
                                    <?php foreach($agencies as $agency): ?>
                                        <option value="<?= $agency['id'] ?>" <?= ($trip['arrival_agency_id'] == $agency['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($agency['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" value="<?= $trip['date_trip'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Heure</label>
                                    <input type="time" name="time" class="form-control" value="<?= $trip['time_trip'] ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Prix (€)</label>
                                    <input type="number" name="price" class="form-control" value="<?= $trip['price'] ?>" step="0.5" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Places</label>
                                    <input type="number" name="seats" class="form-control" value="<?= $trip['available_seats'] ?>" min="1" max="8" required>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-outline-secondary">Annuler</a>
                                <button type="submit" class="btn btn-warning">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>