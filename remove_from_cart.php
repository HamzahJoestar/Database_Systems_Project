<?php
session_start();
if (isset($_POST["remove"])) {
    $productID = $_POST["remove"];
    unset($_SESSION["cart"][$productID]);
}
header("Location: add_to_cart.php");
exit;
