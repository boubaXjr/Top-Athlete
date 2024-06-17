<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

$sql = "SELECT * FROM Produit_";
$result = $conn->query($sql);
?>

<?php include 'include/header.php'; ?>

<h1>Products</h1>
<a href="add_product.php">Add New Product</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Club</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['ID_Produit']; ?></td>
            <td><?php echo $row['club']; ?></td>
            <td><?php echo $row['description_']; ?></td>
            <td><?php echo $row['Prix_']; ?></td>
            <td><?php echo $row['_ID_Categorie']; ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $row['ID_Produit']; ?>">Edit</a>
                <a href="delete_product.php?id=<?php echo $row['ID_Produit']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'include/footer.php'; ?>