<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="container header-content">
        <div class="title-section">
            <h1>🌼 Marigold Memories</h1>
            <p>Your one-stop shop for flower-themed joy!</p>
        </div>

        <div class="nav-links">
            <a href="index.php"><button>Home</button></a>
            <a href="shop.php"><button>Shop</button></a>
            <a href="cart.php"><button>Cart</button></a>
            <a href="projecttest/contactus.html"><button>Contact</button></a>
          

            <!-- Customer dropdown (Sign In + Sign Up) -->
            <div class="dropdown">
                <button class="dropbtn">Customer</button>
                <div class="dropdown-content">
                    <a href="login.php">Sign In</a>
                    <a href="register.php">Sign Up</a>
                </div>
            </div>

            <!-- Admin dropdown (Sign In only) -->
            <div class="dropdown">
                <button class="dropbtn">Admin</button>
                <div class="dropdown-content">
                    <a href="admin_login.php">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="contactus-page">
    <div class="content">
        <h2>Contact Us!</h2>
        <p>Phone Number: </p>
        <p>(225)-617-4653 </p>
        <p>Email: </p>
        <p> marigoldmems@pmail.com</p>

	
    </div>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-title">Hours of Operation:</div>
        <ul class="hours-list">
            <li>MON-FRI: 9am - 5pm ET</li>
            <li>SAT-SUN: 10am - 2pm ET</li>
           
        </ul>
    </div>
</footer>

</body>
</html>
