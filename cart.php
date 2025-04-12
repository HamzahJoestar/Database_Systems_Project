<?php
session_start();
include 'db_connect.php'; // Connect to your database

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart - Marigold Memories</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        table { width: 80%; margin: auto; border-collapse: collapse; background: white; box-shadow: 0 0 10px #ccc; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #ffa500; color: white; }
        .total { font-weight: bold; }
        .btn { padding: 10px 15px; background: #ffa500; color: white; border: none; cursor: pointer; margin: 10px; border-radius: 5px; }
        .center { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>

<h2 style="text-align:center;">🛒 Your Shopping Cart</h2>

<?php if (empty($cart)) : ?>
    <p style="text-align:center;">Your cart is empty.</p>
    <div class="center">
        <a href="shop.php" class="btn">Continue Shopping</a>
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
    <a href="shop.php" class="btn">Continue Shopping</a>
    <a href="checkout.php" class="btn">Proceed to Checkout</a>
</div>

<?php endif; ?>

</body>
</html>
