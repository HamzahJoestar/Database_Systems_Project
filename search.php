<?php
session_start();

// Connect to your actual database
$conn = new mysqli("localhost", "username", "password", "database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Add to cart logic 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])){
    $productID = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$productID])){
        $_SESSION['cart'][$productID]++;
    }else{
        $_SESSION['cart'][$productID] = 1;
    }
}

// Search Function
$results = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['query'])) {
    $query = $conn->real_escape_string($_POST['query']);
    $sql = "SELECT * FROM Products WHERE Name LIKE '%$query%' OR Category LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search - Marigold Memories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .search-bar-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .search-form input[type="text"] {
            width: 200px;
            height: 20px;
            padding: 4px 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 0.85rem;
        }

        .search-form button {
            margin-top: 6px;
            height: 26px;
            padding: 0 10px;
            background-color: #EAA221;
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .search-results {
            padding: 20px;
        }

        .product-card {
            background-color: #fff8e7;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .product-card h3 {
            margin-top: 0;
            color: #EAA221;
        }

        .product-card p {
            margin: 5px 0;
        }

    </style>
</head>
<body>

<header>
    <div class="container header-content" style="align-items: flex-start;">
        <!-- Title -->
        <div class="title-section" style="flex: 1;">
            <h1>🌼 Marigold Memories</h1>
            <p>Your one-stop shop for flower-themed joy!</p>
        </div>

        <!-- Search Bar -->
        <div class="search-bar-container">
            <form class="search-form" method="POST" action="search.php">
                <input type="text" name="query" placeholder="Search marigold gifts..." required>
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Navigation Buttons -->
        <div class="nav-links">
            <a href="index.php"><button>Home</button></a>
            <a href="shop.php"><button>Shop</button></a>
            <a href="cart.php"><button>Cart</button></a>
            <a href="about.php"><button>About Us</button></a>

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
    <div class="container content">
        <h2>Search Results</h2>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <?php if (count($results) > 0): ?>
                <div class="search-results">
                    <?php foreach ($results as $product): ?>
                        <div class="product-card">
                            <h3><?= htmlspecialchars($product['Name']) ?></h3>
                            <p><strong>Category:</strong> <?= htmlspecialchars($product['Category']) ?></p>
                            <p><strong>Price:</strong> $<?= number_format($product['Price'], 2) ?></p>
                            <p><strong>Description:</strong> <?= htmlspecialchars($product['Description']) ?></p>
                            <form method="POST" action="search.php" style="margin-top: 10px;">
            <input type="hidden" name="product_id" value="<?= $product['ProductID'] ?>">
            <input type="hidden" name="query" value="<?= htmlspecialchars($_POST['query'] ?? '') ?>">
            <button type="submit" style="background-color: #ffa500; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;">
                Add to Cart
            </button>
        </form>

                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No products found matching your search.</p>
            <?php endif; ?>
        <?php else: ?>
            <p>Type something in the search box above to get started!</p>
        <?php endif; ?>
    </div>
</main>

<footer>
    <div class="footer-content">
    </div>
</footer>

</body>
</html>
