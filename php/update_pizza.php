<?php
include 'config.php';

if(isset($_GET['pizza_id'])) {
    $pizza_id = $_GET['pizza_id'];


    $selectQuery = "SELECT * FROM pizza WHERE NROPIZZ = '$pizza_id'";
    $selectResult = mysqli_query($mysqli, $selectQuery);

    if(mysqli_num_rows($selectResult) > 0) {
        $row = mysqli_fetch_assoc($selectResult);
        $design = $row['DESIGNPIZZ'];
        $prix = $row['TARIFPIZZ'];
    } else {
        echo '<div class="error-message">Pizza non trouvée.</div>';
        exit();
    }
} else {
    echo '<div class="error-message">ID de pizza non spécifié.</div>';
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_design = mysqli_real_escape_string($mysqli, $_POST['design']);
    $new_prix = mysqli_real_escape_string($mysqli, $_POST['prix']);

    $updateQuery = "UPDATE pizza SET DESIGNPIZZ = '$new_design', TARIFPIZZ = '$new_prix' WHERE NROPIZZ = '$pizza_id'";
    $result = mysqli_query($mysqli, $updateQuery);

    if ($result) {
        echo '<div class="success-message">Pizza mise à jour avec succès.</div>';
        
    } else {
        echo '<div class="error-message">Erreur lors de la mise à jour de la pizza : ' . mysqli_error($mysqli) . '</div>';
    }
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Pizza</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_add_pizza.css">
</head>
<body>

<form action="./update_pizza.php?pizza_id=<?php echo $pizza_id; ?>" method="post">
    <label for="design">Nom de la pizza :</label>
    <input type="text" name="design" value="<?php echo $design; ?>" required>

    <label for="prix">Nouveau prix de la pizza :</label>
    <input type="text" name="prix" value="<?php echo $prix; ?>" required>

    <button type="submit">Mettre à jour la Pizza</button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
