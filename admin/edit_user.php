<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

$id = $_GET['id'];
$sql = "SELECT * FROM client WHERE id_client='$id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $name = sanitize_input($_POST['name']);
    $first_name = sanitize_input($_POST['first_name']);

    $sql = "UPDATE client SET mail='$email', _Mot_De_Passe='$password', nom='$name', prénom='$first_name' WHERE id_client='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: users.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'include/header.php'; ?>

<h1>Edit User</h1>
<form action="edit_user.php?id=<?php echo $id; ?>" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['mail']; ?>" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?php echo $user['_Mot_De_Passe']; ?>" required>
    <br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $user['nom']; ?>" required>
    <br>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo $user['prénom']; ?>" required>
    <br>
    <button type="submit">Update User</button>
</form>

<?php include 'include/footer.php'; ?>