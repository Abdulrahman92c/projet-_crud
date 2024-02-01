<?php
include 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $codepostal = $_POST["codepostal"];
    $titre = $_POST["titre"];
    $telephone = $_POST["telephone"];


    $sql = "INSERT INTO client (NOMCLIE, PRENOMCLIE, ADRESSECLIE, VILLECLIE, CODEPOSTALCLIE, TITRECLIE, NROTELCLIE) 
        VALUES ('$nom', '$prenom', '$adresse', '$ville', '$codepostal', '$titre', '$telephone')";


    $result = $mysqli->query($sql);

    if ($result) {
        echo "Client ajouté avec succès!";

        header("refresh:3;url=../pizza.php");

    } else {
        echo "Erreur lors de l'ajout du client: " . $mysqli->error;
    }


    $mysqli->close();
}
?>