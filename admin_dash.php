<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Marigold Memories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-dashboard {
            text-align: center;
            margin: 40px auto;
            padding: 20px;
        }

        .admin-dashboard h2 {
            color: #ffa500;
            margin-bottom: 30px;
        }

        .admin-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .admin-buttons a {
            text-decoration: none;
        }

        .admin-buttons button {
            padding: 15px 30px;
            font-size: 16px;
            background-color: #ffa500;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .admin-buttons button:hover {
            background-color: #e69500;
        }
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
            <a href="contact.php"><button>Contact</button></a>

            <!-- Customer dropdown -->
            <div class="dropdown">
                <button class="dropbtn">Customer</button>
                <div class="dropdown-content">
                    <a href="login.php">Sign In</a>
                    <a href="register.php">Sign Up</a>
                </div>
            </div>

            <!-- Admin dropdown -->
            <div class="dropdown">
                <button class="dropbtn">Admin</button>
                <div class="dropdown-content">
                    <a href="admin_login.php">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="admin-dashboard">
    <h2>Admin Dashboard</h2>

    <div class="admin-buttons">
        <a href="addproduct.php"><button>Add Products</button></a>
        <a href="updateproducts.php"><button>Update Products</button></a>
        <a href="deleteproducts.php"><button>Delete Products</button></a>
        <a href="manageorders.php"><button>Manage Orders</button></a>
        <a href="manageusers.php"><button>Manage Users</button></a>
    </div>
</main>

<footer>
    <div class="footer-content">
        <p style="text-align:center; margin-top: 20px;">Admin access
only. Unauthorized access is prohibited.</p>
    </div>
</footer>

</body>
</html>
