<?php
include 'include/db_connect.php';
include 'include/functions.php';
check_login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $name = sanitize_input($_POST['name']);
    $first_name = sanitize_input($_POST['first_name']);

    $sql = "INSERT INTO client (mail, _Mot_De_Passe, nom, prénom) VALUES ('$email', '$password', '$name', '$first_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: users.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'include/header.php'; ?>

<h1>Add User</h1>
<form action="add_user.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required>
    <br>
    <button type="submit">Add User</button>
</form>

<?php include 'include/footer.php'; ?>