<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <h1>Ajouter un nouveau client</h1>
    <form action="./php/add_client.php" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>

        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
        </div>

        <div class="form-group">
            <label for="codepostal">Code Postal :</label>
            <input type="text" class="form-control" id="codepostal" name="codepostal" required>
        </div>

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>

        <div class="form-group">
            <label for="telephone">Numéro de téléphone :</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter Client</button>
    </form>

    <script src="bootstrap/css/bootstrap.min.css"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
