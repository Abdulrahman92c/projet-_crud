<?php
include 'config.php';

if(isset($_POST['pizza_id'])) {
    $id = $_POST['pizza_id'];

    $deleteComposerQuery = "DELETE FROM composer WHERE NROPIZZ = $id";
    $resultComposer = mysqli_query($mysqli, $deleteComposerQuery);

    if($resultComposer) {
        $deletePizzaQuery = "DELETE FROM pizza WHERE NROPIZZ = $id";
        $resultPizza = mysqli_query($mysqli, $deletePizzaQuery);

        if ($resultPizza) {
            echo "Pizza supprimée avec succès. vous allez être redirigé vers la page d'accueil des pizzas";

    
            header("refresh:3;url=../pizza.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de la pizza : " . mysqli_error($mysqli);
        }
    } else {
        echo "Erreur lors de la suppression des enregistrements liés dans la table composer : " . mysqli_error($mysqli);
    }
} else {
    echo "ID de pizza non spécifié.";
}

mysqli_close($mysqli);
?>
