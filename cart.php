<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'db_connect.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart - Marigold Memories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { width: 80%; margin: auto; border-collapse: collapse; background: white; box-shadow: 0 0 10px #ccc; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #ffa500; color: white; }
        .total { font-weight: bold; }
        .btn { padding: 10px 15px; background: #ffa500; color: white; border: none; cursor: pointer; margin: 10px; border-radius: 5px; text-decoration: none; }
        .center { text-align: center; margin-top: 20px; }
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
            <a href="shop_update.php"><button>Shop</button></a>
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
    <div class="content">
        <h2 style="text-align:center;">🌼 Your Shopping Cart</h2>

        <?php if (empty($cart)) : ?>
            <p style="text-align:center;">Your cart is empty.</p>
            <div class="center">
                <a href="shop_update.php" class="btn">Continue Shopping</a>
            </div>
        <?php else : ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php
                foreach ($cart as $product_id => $quantity) {
                    $stmt = $conn->prepare("SELECT Name, Price FROM Products WHERE ProductID = ?");
                    $stmt->bind_param("i", $product_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($product = $result->fetch_assoc()) {
                        $name = $product['Name'];
                        $price = $product['Price'];
                        $subtotal = $price * $quantity;
                        $total += $subtotal;
                        echo "<tr>
                                <td>{$name}</td>
                                <td>\${$price}</td>
                                <td>{$quantity}</td>
                                <td>\$" . number_format($subtotal, 2) . "</td>
                              </tr>";
                    }
                    $stmt->close();
                }
                ?>
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td class="total">$<?= number_format($total, 2) ?></td>
                </tr>
            </table>

            <div class="center">
                <a href="shop_update.php" class="btn">Continue Shopping</a>
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
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
