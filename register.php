<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register.css">
</head>
<body>

    <!-- Header Section -->
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

<div class="login-page">
  <div class="login-content">
    <h2>Register</h2>
    <form action="process_register" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password">

      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone">

      <button type="submit">Register</button>
    </form>
  </div>
</div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p class="footer-title">Meet the Team</p>
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
