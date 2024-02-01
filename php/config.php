<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pizzaboxinodb";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

