<?php
session_start();
include 'db_connect.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product"])) {
    $product = $_POST["product"];
    $quantity = 1;

    $sql = "SELECT * FROM Products WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $name = $row["Name"];
<<<<<<< HEAD
        
        $cart[$product] = isset($cart[$product])?$cart[$product]+$quantity:$quantity;
        
        $_SESSION["cart"] = $cart;
        $success = "Added ".$quantity." of ".$name." to your cart!"; 
=======
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        $_SESSION["cart"][$product] = ($_SESSION["cart"][$product] ?? 0) + $quantity;

        $success = "Added $quantity of <strong>$name</strong> to your cart!";
    } else {
        $error = "Product not found.";
    }
>>>>>>> fe82eea124fc912ff1b78ed6d4f8e45eab5efce7
}

$cart = $_SESSION["cart"] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - Marigold Memories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .cart-box {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .cart-box h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #F4A300;
            color: white;
            padding: 12px;
            font-size: 1rem;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        tfoot td {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .btn-group {
            text-align: center;
        }

        .btn-group a button {
            padding: 12px 24px;
            margin: 0 10px;
            background-color: #F4A300;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-group a button:hover {
            background-color: #e39300;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .success { color: green; }
        .error { color: red; }
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
    <div class="cart-box">
        <h2>🛒 Your Shopping Cart</h2>

        <?php if ($error): ?>
            <div class="message error"><?= $error ?></div>
        <?php elseif ($success): ?>
            <div class="message success"><?= $success ?></div>
        <?php endif; ?>

        <?php if (empty($cart)): ?>
            <p class="message">Your cart is currently empty.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($cart as $productID => $qty) {
                        $query = $conn->prepare("SELECT Name, Price FROM Products WHERE ProductID = ?");
                        $query->bind_param("i", $productID);
                        $query->execute();
                        $result = $query->get_result();
                        $product = $result->fetch_assoc();
                        $subtotal = $product["Price"] * $qty;
                        $total += $subtotal;
                        echo "<tr>
                                <td>{$product['Name']}</td>
                                <td>$" . number_format($product["Price"], 2) . "</td>
                                <td>$qty</td>
                                <td>$" . number_format($subtotal, 2) . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td><strong>$<?= number_format($total, 2) ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <div class="btn-group">
                <a href="shop.php"><button>Continue Shopping</button></a>
                <a href="checkout.php"><button>Proceed to Checkout</button></a>
            </div>
        <?php endif; ?>
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
