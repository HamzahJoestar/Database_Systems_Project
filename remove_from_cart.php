<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'db_connect.php';
if (isset($_POST["remove"])) {
    $productID = $_POST["remove"];
    unset($_SESSION["cart"][$productID]);
}
header("Location: add_to_cart.php");
exit;
?>
