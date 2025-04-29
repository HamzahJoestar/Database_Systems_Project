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
    <title>Order History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- HEADER -->
<header>
    <div class="container header-content">
        <div class="title-section">
            <h1>Order History</h1>
            <p>View your order history!</p>
        </div>
    </div>
</header>

<!-- MAIN ORDER DETAILS SECTION -->
<main class="home-page">
    <div class="container content">
        <?php
            // Fetch general order info
            $userid = $_SESSION['user_id'];
            $orderQuery = "SELECT * FROM Orders WHERE UserID = $userid";
            $orderResult = $conn->query($orderQuery);

   
        ?>
        <?php if ($orderResult && $orderResult->num_rows > 0): ?>
            <?php 
            while($orderInfo = $orderResult->fetch_array(MYSQLI_ASSOC)){
            $orderID = $orderInfo["OrderID"]; 
            
            
            echo "
            <h2>Order #: ".htmlspecialchars($orderID)."</h2>
            <p>Order Date: ".htmlspecialchars($orderInfo['OrderDate'])."</p>
            <p>Status: ".htmlspecialchars($orderInfo['Status'])."</p>";
            
                
                $orderInfo = [];     // stores general order info
                $orderItems = [];    // stores products in the order
                $total = 0.0;        // total price

                
                $detailsQuery = "
        SELECT od.*, p.Name AS ProductName 
        FROM OrderDetails od
        JOIN Products p ON p.ProductID = od.ProductID
        WHERE od.OrderID = $orderID
    ";
            $detailsResult = $conn->query($detailsQuery);
            if ($detailsResult && $detailsResult->num_rows > 0) {
                while ($row = $detailsResult->fetch_assoc()) {
                    $orderItems[] = $row;
                    $total += $row['Quantity'] * $row['Price'];
                }
            }
            
            
            
            echo "<h3>Items in your order:</h3>";
            echo "<ul class='teammates-list'>";
                foreach ($orderItems as $item){
                    echo "<li>
                        <strong>".htmlspecialchars($item['ProductName']) ."</strong><br>
                        Quantity: ".intval($item['Quantity'])."<br>
                        Price: $".number_format($item['Price'], 2)."
                    </li>";
                }
            echo "</ul>";
            
            
            echo "<h3>Total: $".number_format($total, 2)."</h3>";
            }
            ?>
        <?php else: ?>
            <p>You haven't made any orders yet!</p>
        <?php endif; ?>
    </div>
</main>

<!-- FOOTER -->
<footer>
</footer>

</body>
</html>
