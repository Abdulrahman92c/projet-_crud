<?php

include 'config.php';

$query = "SELECT * FROM pizza";

$result = mysqli_query($mysqli, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {

        $imagePath = 'asset/' . $row['NROPIZZ'];


        echo '<div class="card">';
        echo '<img src="' . $imagePath . '.jpg" class="card-img-top" alt="' . $row['NROPIZZ'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['DESIGNPIZZ'] . '</h5>';
        echo '<p class="card-text">Prix: ' . $row['TARIFPIZZ'] . ' €</p>';
        echo '<form action="./php/delete_pizza.php" method="post" style="display:inline;">';
        echo '<input type="hidden" name="pizza_id" value="' . $row['NROPIZZ'] . '">';
        echo '<input type="hidden" name="pizza_designation" value="' . $row['DESIGNPIZZ'] . '">';
        echo '<button type="submit" class="button-delete" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette pizza ?\')">Supprimer</button>';
        echo '</form>';
        echo '<form action="./php/update_pizza.php?pizza_id=' . $row['NROPIZZ'] . '" method="post" style="display:inline;">';
        echo '<input type="hidden" name="design" value="' . $row['DESIGNPIZZ'] . '">';
        echo '<input type="hidden" name="prix" value="' . $row['TARIFPIZZ'] . '">';
        echo '<button type="submit" class="button-update">Mettre à jour</button>';
        echo '</form>';

        echo '</div></div>';
    }
    echo '<a class="btn-add" href="./php/add_pizza.php">Ajouter une pizza</a>';


    mysqli_free_result($result);
} else {

    echo 'Erreur de requête : ' . mysqli_error($mysqli);
}


mysqli_close($mysqli);
?>