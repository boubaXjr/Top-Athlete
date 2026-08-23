<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['email'])) {
    echo json_encode(['logged_in' => true, 'email' => $_SESSION['email']]);
} else {
    echo json_encode(['logged_in' => false, 'email' => 'guest']);
}
?>
