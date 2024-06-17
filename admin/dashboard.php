<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();
?>

<?php include 'include/header.php'; ?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['admin']; ?>!</p>
<!-- Display statistics, charts, and notifications here -->

<?php include 'include/footer.php'; ?>