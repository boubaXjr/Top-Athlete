<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

$id = $_GET['id'];
$sql = "SELECT * FROM Produit_ WHERE ID_Produit='$id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $club = sanitize_input($_POST['club']);
    $description = sanitize_input($_POST['description']);
    $price = sanitize_input($_POST['price']);
    $category = sanitize_input($_POST['category']);

    $sql = "UPDATE Produit_ SET club='$club', description_='$description', Prix_='$price', _ID_Categorie='$category' WHERE ID_Produit='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: products.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'include/header.php'; ?>

<h1>Edit Product</h1>
<form action="edit_product.php?id=<?php echo $id; ?>" method="post">
    <label for="club">Club:</label>
    <input type="text" id="club" name="club" value="<?php echo $product['club']; ?>" required>
    <br>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" value="<?php echo $product['description_']; ?>" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['Prix_']; ?>" required>
    <br>
    <label for="category">Category:</label>
    <input type="number" id="category" name="category" value="<?php echo $product['_ID_Categorie']; ?>" required>
    <br>
    <button type="submit">Update Product</button>
</form>

<?php include 'include/footer.php'; ?>