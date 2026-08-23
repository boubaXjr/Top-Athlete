<?php
session_start();
require_once __DIR__ . '/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    if (isset($_SESSION['id_client'])) {
        $id_client = $_SESSION['id_client'];
        $product_id = $conn->real_escape_string($_POST['product_id']);

        // Vérifiez si le produit est déjà dans les favoris
        $sql_check = "SELECT * FROM favoris WHERE id_client = $id_client AND ID_Produit = $product_id";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows == 0) {
            $sql = "INSERT INTO favoris (id_client, ID_Produit) VALUES ($id_client, $product_id)";
            if ($conn->query($sql) === TRUE) {
                echo "Produit ajouté aux favoris avec succès";
            } else {
                echo "Erreur: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Le produit est déjà dans les favoris";
        }
    } else {
        echo "Vous devez être connecté pour ajouter un produit aux favoris";
    }
}

$conn->close();
?>
