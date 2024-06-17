<?php
$hostname = "localhost";
$username = "root";
$password = "mamadou";
$database = "maillot_nouvelle";

// Connexion à la base de données
$con = mysqli_connect($hostname, $username, $password, $database);

// Vérification de la connexion
if (!$con) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Affichage d'un message de succès
echo "Connexion réussie à la base de données !";
?>
