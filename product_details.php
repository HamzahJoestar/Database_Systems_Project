<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $sql = "SELECT * FROM Products WHERE ProductID = $productId";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
} else {
    echo "No product found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Product Details</title>
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

<main class="product-details-container">
    <div class="product-image">
<img src="<?= $product['Image'] ?>" alt="<?= $product['Name'] ?>" style="width: 300px; height: 200px;">

    </div>

    <div class="product-info">
        <h2 class="product-name"><?= $product['Name'] ?></h2>
        <p class="product-price">$<?= $product['Price'] ?></p>
        <p class="product-description"><?= $product['Description'] ?></p>

        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product" value="<?= $product['ProductID'] ?>"/>
            <input type="submit" name="add_to_cart" value="Add to Cart"/>
        </form>

        <?php if (isset($_SESSION["admin_id"])): ?>
            <p><a href="edit_product.php?product=<?= $product['ProductID'] ?>">Edit Product</a></p>
        <?php endif; ?>
    </div>
</main>

</body>
</html>

