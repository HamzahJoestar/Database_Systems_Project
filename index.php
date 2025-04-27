<?php
session_start();
if (!isset($_SESSION['user_email']) && !isset($_SESSION['admin_id'])) {    header("Location: login.php");
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

<!-- HEADER SECTION -->
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
            <a href="account.php"><button>Account</button></a>
            <!--Logout option -->
            <a href="logout.php"><button>Logout</button></a>
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
            <a href="contactus.html" style="color: white; text-decoration: underline;">Contact Us!</a>
        </p>
    </div>
</footer>

</body>
</html>
