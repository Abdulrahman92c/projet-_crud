<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $design = mysqli_real_escape_string($mysqli, $_POST['design']);
    $prix = mysqli_real_escape_string($mysqli, $_POST['prix']);

    $targetDir = "asset/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetPath = $targetDir . $imageName;

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $checkQuery = "SELECT * FROM pizza WHERE DESIGNPIZZ = '$design'";
    $checkResult = mysqli_query($mysqli, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo '<div class="error-message">Erreur :la pizza existe déjà.</div>';
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
            $insertQuery = "INSERT INTO pizza (DESIGNPIZZ, TARIFPIZZ, NROPIZZ) VALUES ('$design', '$prix', '$imageName')";
            $result = mysqli_query($mysqli, $insertQuery);

            if ($result) {
                echo '<div class="success-message">Nouvelle pizza ajoutée avec succès.</div>';

                header("refresh:3;url=../pizza.php");
                exit();
                
            } else {
                echo '<div class="error-message">Erreur lors de l\'ajout de la pizza : ' . mysqli_error($mysqli) . '</div>';
            }
        } else {
            echo '<div class="error-message">Erreur lors de l\'upload de l\'image.</div>';
        }
    }
}

mysqli_close($mysqli);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Pizza</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_add_pizza.css">
</head>

<body>

    <form action="./add_pizza.php" method="post" enctype="multipart/form-data">
        <label for="design">Nom de la pizza:</label>
        <input type="text" name="design" required>

        <label for="prix">Prix de la pizza:</label>
        <input type="text" name="prix" required>

        <label for="image">Image de la pizza:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Ajouter Pizza</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>