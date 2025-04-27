<?php
session_start();
if (isset($_SESSION['password_updated'])) {
    echo "<p style='color: green;'>" . $_SESSION['password_updated'] . "</p>";
    unset($_SESSION['password_updated']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Selling toys themed around Marigolds" />
    <title>Marigold Memories</title>
    <link href="style.css" rel="stylesheet" />
    <link href="login.css" rel="stylesheet" />
</head>
<body>

<header>
    <div class="container header-content">
        <div class="title-section">
            <h1>🌼 Marigold Memories</h1>
            <p>Your one-stop shop for flower-themed joy!</p>
        </div>

        <div class="nav-links">

            <!-- Customer dropdown (Sign In + Sign Up) -->
            <div class="dropdown">
                <button class="dropbtn">Customer</button>
                <div class="dropdown-content">
                    <a href="login.php">Sign In</a>
                    <a href="register.php">Sign Up</a>
                </div>
            </div>

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
    
    <!-- Login Section -->
    <div class="login-page" id="login-page">
        <section class="login-content">
            <h2>Login</h2>
            <form action="process_login.php" method="POST">
                <label for="email">User Email:</label>
                <input type="email" id="email" name="email" required />
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />
                
                <button type="submit">Login</button>
            </form>
        </section>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container footer-content">
            <p class="footer-title">Teammates:</p>
            <ul class="teammates-list">
                <li>Ula Dasouqi</li>
                <li>Kylie Maddaluna</li>
                <li>Hamzah Muhammad</li>
                <li>Amnah Javed</li>
                <li>Daniel Shemesh</li>
            </ul>
        </div>
    </footer>    
</body>
</html>
