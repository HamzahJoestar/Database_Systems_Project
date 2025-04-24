<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
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
            <?php
            if (isset($_SESSION['login_success'])) {
                echo "<p style='color: green; font-weight: bold;'>" . $_SESSION['login_success'] . "</p>";
                unset($_SESSION['login_success']);
            }
            ?>
        </div>

        <div class="nav-links">
            <a href="index.php"><button>Home</button></a>
            <a href="shop_update.php"><button>Shop</button></a>
            <a href="cart.php"><button>Cart</button></a>
            <a href="about.php"><button>About Us</button></a>
            <a href="contactus.html"><button>Contact Us</button></a>


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
                <!--Logout option -->
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
