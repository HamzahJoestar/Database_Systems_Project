<?php
session_start();
include 'db_connect.php';

$error = "";

// Handle admin login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_login'])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Check if admin exists
    $check = $conn->prepare("SELECT * FROM Admin WHERE Email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        // Direct comparison because password is plain text in your database
        if ($admin['Password'] === $password) {
            $_SESSION["admin_id"] = $admin["AdminID"];
            $_SESSION["admin_email"] = $admin["Email"];
            header("Location: admindash.php");
            exit();
        } else {
            $error = "❌ Invalid password.";
        }
    } else {
        $error = "❌ Admin account not found.";
    }

    $check->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Marigold Memories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .login-container h2 {
            text-align: center;
            color: #EAA221;
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #EAA221;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .message {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .success { color: green; }
        .error { color: red; }
    </style>
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
            <a href="shop.php"><button>Shop</button></a>
            <a href="cart.php"><button>Cart</button></a>
            <a href="about.php"><button>About</button></a>

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

<main class="home-page">
    <div class="login-container">
        <h2>Admin Login</h2>

        <?php if (!empty($error)) echo "<div class='message error'>$error</div>"; ?>

        <form method="POST" action="admin_login.php">
            <input type="email" name="email" placeholder="Admin Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="admin_login">Login</button>
        </form>
    </div>
</main>

<footer>
    <div class="footer-content">
        <p style="text-align:center;">Admin access only. Unauthorized access is prohibited.</p>
    </div>
</footer>

</body>
</html>
