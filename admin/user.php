<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

$sql = "SELECT * FROM client";
$result = $conn->query($sql);
?>

<?php include 'include/header.php'; ?>

<h1>Users</h1>
<a href="add_user.php">Add New User</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>First Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id_client']; ?></td>
            <td><?php echo $row['mail']; ?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prénom']; ?></td>
            <td>
                <a href="edit_user.php?id=<?php echo $row['id_client']; ?>">Edit</a>
                <a href="delete_user.php?id=<?php echo $row['id_client']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'include/footer.php'; ?>