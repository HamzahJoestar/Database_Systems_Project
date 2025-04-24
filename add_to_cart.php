<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
$success = "";
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$error = "";
        $product = $_POST["product"];
        $quantity = 1;//isset($_POST["quantity"])v?$_POST["quantity"] : 1;

        // get name of product
        $sql = "SELECT * FROM Products WHERE ProductID = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i",$product);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $row = $result->fetch_assoc();
        $name = $row["Name"];
        
        $cart[$product] = isset($cart[$product])?$cart[$product]+$quantity:$quantity;
        
        $_SESSION["cart"] = $cart;
        $success = "Added ".$quantity." of ".$name." to your cart!"; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Shop</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            text-align: center;
            color: #ffa500;
        }
        .form-container input {
            width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc;
        }
        .form-container button {
            width: 100%; padding: 10px; background: #ffa500; color: white; border: none; border-radius: 5px;
            font-weight: bold; cursor: pointer;
        }
        .message { text-align: center; font-weight: bold; margin: 10px 0; }
        .error { color: red; }
        .success { color: green; }
    </style>
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

            <div class="dropdown">
                <button class="dropbtn">Customer</button>
                <div class="dropdown-content">
                    <a href="login.php">Sign In</a>
                    <a href="register.php">Sign Up</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Admin</button>
                <div class="dropdown-content">
                    <a href="admin_login.php">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="home-page">
    <div class="form-container">
        <h2>Account Registration</h2>

        <?php if ($error): ?>
            <div class="message error"><?= $error ?></div>
        <?php elseif ($success): ?>
            <div class="message success"><?= $success ?></div>
        <?php endif; ?>

        <a href="shop.php"><button>Return to Shop</button></a>
    </div>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-title">Meet the Team</div>
        <ul class="teammates-list">
            <li>Ula Dasouqi</li>
            <li>Hamzah Muhammad</li>
            <li>Kylie Maddaluna</li>
            <li>Amnah Javed</li>
            <li>Daniel Shemesh</li>
        </ul>
    </div>
</footer>

</body>
</html>
