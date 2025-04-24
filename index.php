<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// Display the login success message if it exists
if (isset($_SESSION['login_success'])) {
    echo "<p>" . $_SESSION['login_success'] . "</p>";

    // Unset the message after displaying it, so it doesn't show again on page refresh
    unset($_SESSION['login_success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Include the header here -->
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

            <!-- Customer dropdown (Sign In + Sign Up) -->
            <?php if (!isset($_SESSION['user_email'])): ?>
                <div class="dropdown">
                    <button class="dropbtn">Customer</button>
                    <div class="dropdown-content">
                        <a href="login.php">Sign In</a>
                        <a href="register.php">Sign Up</a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Display Welcome Message and Logout option -->
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
                <a href="logout.php"><button>Logout</button></a>
            <?php endif; ?>

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


<main class="home-page">
    <div class="content">
        <h2>Welcome to Marigold Memories!</h2>
        <p>Explore our vibrant collection of marigold-themed products for families, teachers, and event planners.</p>
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
 <p style="margin-top: 20px;">
            <a href="about.php" style="color: white; text-decoration: underline;">About Us</a>
        </p>
    </div>
</footer>

</body>
</html>
