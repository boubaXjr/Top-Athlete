<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

$sql = "SELECT * FROM Commande";
$result = $conn->query($sql);
?>

<?php include 'include/header.php'; ?>

<h1>Orders</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Date</th>
            <th>Client ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['__ID_Commande']; ?></td>
            <td><?php echo $row['Statut_Commande'] ? 'Completed' : 'Pending'; ?></td>
            <td><?php echo $row['_Date_Commande']; ?></td>
            <td><?php echo $row['id_client']; ?></td>
            <td>
                <a href="order_details.php?id=<?php echo $row['__ID_Commande']; ?>">View</a>
                <a href="update_order_status.php?id=<?php echo $row['__ID_Commande']; ?>">Update Status</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'include/footer.php'; ?>