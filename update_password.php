<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "muhammh3_marigold");

    if ($conn->connect_error) die("Connection failed.");

    $new_pass = trim($_POST['new_password']);
    $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("UPDATE Users SET Password = ? WHERE UserID = ?");
    $stmt->bind_param("si", $hashed_pass, $user_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    session_unset();
    session_destroy();

    session_start();
    $_SESSION['password_updated'] = "Password updated successfully. Please log in again.";

    header("Location: login.php");
    exit;
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

<!-- Basic form -->
<form action="" method="POST">
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" id="new_password" required>
    <button type="submit">Update Password</button>
</form>

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
