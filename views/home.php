<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Touche pas au klaxon</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .header { border: 2px solid #333; padding: 10px; border-radius: 10px; display: flex; justify-content: space-between; }
        .btn { background-color: #333; color: white; padding: 5px 15px; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Touche pas au klaxon</h2>
        <a href="#" class="btn">Connexion</a>
    </div>

    <h3>Test technique :</h3>
    <p><?= $message ?></p>
    <p><strong><?= $status_bdd ?></strong></p>

</body>
</html>