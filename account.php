<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
            <a href="account.php"><button>Account</button></a>
            <a href="logout.php"><button>Logout</button></a>



        </div>
    </div>
</header>

<main class="container">
    <h2>Welcome, <?= htmlspecialchars($user_name) ?>!</h2>

    <section class="account-details">
        <h3>Your Account Info:</h3>
        <p><strong>Email:</strong> <?= htmlspecialchars($user_email) ?></p>
        <p><strong>Name:</strong> <?= htmlspecialchars($user_name) ?></p>

        <a href="update_password.php" class="btn">Change Password</a>
    </section>
</main>

<footer>
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
