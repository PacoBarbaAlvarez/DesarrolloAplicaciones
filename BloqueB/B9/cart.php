<?php
session_start();

$producto = $_POST['producto'];
$precio = $_POST['precio'];

if (!isset($_SESSION['carrito'][$producto])) {
    $_SESSION['carrito'][$producto] = ['cantidad' => 1, 'precio' => $precio];
} else {
    $_SESSION['carrito'][$producto]['cantidad']++;
}

header("Location: cart.php");
exit;
?>