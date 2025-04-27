<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
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

        </div>
    </div>
</header>

<!-- MAIN ABOUT CONTENT -->
<main class="home-page">
    <div class="container content">
        <!-- Company Mission -->
        <h2>Our Goal</h2>
        <p>For classroom fun to party favors, these marigold-themed
toys are designed for parents, kids, teachers, and anyone with a love
for marigolds!</p>

        <!-- Team Member List -->
        <h2>Meet the Team</h2>
        <ul class="teammates-list">
            <li>Kylie Maddaluna</li>
            <li>Ula Dasouqi</li>
            <li>Hamzah Muhammad</li>
            <li>Daniel Shemesh</li>
            <li>Amnah Javed</li>
        </ul>
    </div>
</main>

<!-- FOOTER SECTION -->
<footer>
 <p style="margin-top: 20px;">
            <a href="contactus.html" style="color: white; text-decoration: underline;">Contact Us!</a>
        </p>
    </div>
</footer>

</body>
</html>
