<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['productId'])) {
    $productId = intval($data['productId']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!in_array($productId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productId;
    }

    echo json_encode(['success' => true, 'cartCount' => count($_SESSION['cart'])]);
} else {
    echo json_encode(['success' => false]);
}
?>
