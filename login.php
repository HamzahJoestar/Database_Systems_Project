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

    <!-- Header Section -->
    <header>
        <div class="container header-content">
            <div class="title-section">
                <h1>Marigold Memories</h1>
                <p>What would you like to buy?</p>
            </div>

            <nav class="nav-links">
                <button onclick="location.href='shop.php'">Shop</button>
                <button onclick="location.href='shop.php#new'">New Arrivals</button>
                <button onclick="location.href='contact-us.php'">Contact Us</button>
                <button onclick="location.href='about-us.php'">About</button>

                <div class="dropdown">
                    <button class="dropbtn">Account ▾</button>
                    <div class="dropdown-content">
                        <a href="login.php">Sign In</a>
                        <a href="register.php">Sign Up</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    
    <!-- Login Section -->
    <div class="login-page" id="login-page">
        <section class="login-content">
        <h2>Login</h2>
        <form action="login-process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />
            
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