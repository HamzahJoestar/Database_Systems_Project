<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'db_connect.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $sql_id = "SELECT MAX(OrderID) as ID FROM Orders";
    $result = $conn->query($sql_id);
    
    $id = $result->fetch_assoc()['ID']+1;

    $paymentmethod = trim($_POST["paymentmethod"]);

    $user_id = $_SESSION["user_id"]?$_SESSION["user_id"]:-1;
    
    if (empty($paymentmethod) || empty($id)) {
    $success = "Please fill in all fields.";
    }
    else{
        
    $sql = "INSERT INTO Orders VALUES (?, ?, -1, NOW(), 'PROCESSING')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $user_id);
    $stmt->execute();
    $stmt->close();
    $total  = 0.0;
    foreach ($cart as $product_id => $quantity) {
        $stmt = $conn->prepare("SELECT Name, Price FROM Products WHERE ProductID = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($product = $result->fetch_assoc()) {
            $price = $product['Price'];
            $subtotal = $price * $quantity;
            $total += $subtotal;
            
            $stmt->close();
            
            $sql = "INSERT INTO OrderDetails (OrderID, OrderConfirmationID, ProductID, Quantity, Price) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiiid", $id, $id,$product_id,$quantity,$price);
            $stmt->execute();
            $stmt->close();
            
        }
        

    }
            $sql = "INSERT INTO Payments (OrderID, PaymentDate, Amount, PaymentMethod) VALUES (?, NOW(), ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ids", $id, $total,$paymentmethod);
            $stmt->execute();
            $stmt->close();
    header("Location: order_confirmation.php");

    exit();
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Marigold Memories</title>
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
    <div class="content">


        <?php if (!isset($_SESSION["user_id"])) : ?>
             <p style="text-align:center;">You are not logged in.</p>
            <div class="center">
                <a href="login.php" class="btn">Log In</a>
            </div>
        
        <?php elseif (empty($cart)) : ?>
            <h2 style="text-align:center;">Your cart is empty!</h2>
            <div class="center">
                <a href="shop.php" class="btn">Continue Shopping</a>
            </div>
        <?php else : ?>
                <h2 style="text-align:center;">Order details:</h2>
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
            <section class='form-section' id='checkout'>
            <form method='POST' action='checkout.php' class='form'>
                <label for="paymentmethod">Payment Method: </label>
                <select id="paymentmethod" name="paymentmethod">
                <option value="paypal">Paypal</option>
                <option value="creditcard">Credit Card</option>
                </select>
                <button type='submit' name='checkout'>Checkout</button>
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
