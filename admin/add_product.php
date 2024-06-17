<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $club = sanitize_input($_POST['club']);
    $description = sanitize_input($_POST['description']);
    $price = sanitize_input($_POST['price']);
    $category = sanitize_input($_POST['category']);

    $sql = "INSERT INTO Produit_ (club, description_, Prix_, _ID_Categorie) VALUES ('$club', '$description', '$price', '$category')";
    if ($conn->query($sql) === TRUE) {
        header("Location: products.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'include/header.php'; ?>

<h1>Add Product</h1>
<form action="add_product.php" method="post">
    <label for="club">Club:</label>
    <input type="text" id="club" name="club" required>
    <br>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>
    <br>
    <label for="category">Category:</label>
    <input type="number" id="category" name="category" required>
    <br>
    <button type="submit">Add Product</button>
</form>

<?php include 'include/footer.php'; ?>