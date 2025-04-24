<?php
// STEP 1: Connect to the database
$conn = new mysqli("localhost", "root", "yourpassword", "kyliedb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// STEP 2: Get order ID from URL (e.g., ?order_id=5)
$orderID = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

$orderInfo = [];     // stores general order info
$orderItems = [];    // stores products in the order
$total = 0.0;        // total price

// STEP 3: If we got a valid order ID, fetch details
if ($orderID > 0) {
    // Fetch general order info
    $orderQuery = "SELECT * FROM Orders WHERE OrderID = $orderID";
    $orderResult = $conn->query($orderQuery);
    if ($orderResult && $orderResult->num_rows > 0) {
        $orderInfo = $orderResult->fetch_assoc();
    }

    // Fetch individual product items for the order
    $detailsQuery = "
        SELECT od.*, p.name AS ProductName 
        FROM OrderDetails od
        JOIN products p ON p.id = od.ProductID
        WHERE od.OrderID = $orderID
    ";
    $detailsResult = $conn->query($detailsQuery);
    if ($detailsResult && $detailsResult->num_rows > 0) {
        while ($row = $detailsResult->fetch_assoc()) {
            $orderItems[] = $row;
            $total += $row['Quantity'] * $row['Price'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- HEADER -->
<header>
    <div class="container header-content">
        <div class="title-section">
            <h1>Order Confirmation</h1>
            <p>Thank you for your purchase!</p>
        </div>
    </div>
</header>

<!-- MAIN ORDER DETAILS SECTION -->
<main class="home-page">
    <div class="container content">
        <?php if ($orderID && !empty($orderInfo)): ?>
            <!-- STEP 4: Display basic order info -->
            <h2>Order #: <?= htmlspecialchars($orderID) ?></h2>
            <p>Order Date: <?= htmlspecialchars($orderInfo['OrderDate']) ?></p>
            <p>Status: <?= htmlspecialchars($orderInfo['Status']) ?></p>

            <!-- STEP 5: Display product list -->
            <h3>Items in your order:</h3>
            <ul class="teammates-list">
                <?php foreach ($orderItems as $item): ?>
                    <li>
                        <strong><?= htmlspecialchars($item['ProductName']) ?></strong><br>
                        Quantity: <?= intval($item['Quantity']) ?><br>
                        Price: $<?= number_format($item['Price'], 2) ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- STEP 6: Total -->
            <h3>Total: $<?= number_format($total, 2) ?></h3>
        <?php else: ?>
            <p>No order found. Please check your order ID.</p>
        <?php endif; ?>
    </div>
</main>

<!-- FOOTER -->
<footer>
</footer>

</body>
</html>
