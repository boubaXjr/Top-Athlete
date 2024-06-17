<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

$id = $_GET['id'];
$sql = "SELECT * FROM Commande WHERE __ID_Commande='$id'";
$result = $conn->query($sql);
$order = $result->fetch_assoc();
?>

<?php include 'include/header.php'; ?>

<h1>Order Details</h1>
<p>Order ID: <?php echo $order['__ID_Commande']; ?></p>
<p>Status: <?php echo $order['Statut_Commande'] ? 'Completed' : 'Pending'; ?></p>
<p>Date: <?php echo $order['_Date_Commande']; ?></p>
<p>Client ID: <?php echo $order['id_client']; ?></p>
<!-- Add more details as needed -->

<?php include 'include/footer.php'; ?>