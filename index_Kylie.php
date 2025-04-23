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
        
        <!-- Code for search bar by Kylie -->
        <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 10px;">
            <!-- Search bar -->
            <form class="form" method="POST" action="search.php" style="flex-shrink: 0; width: 265px;">
                <input type="text" name="query" placeholder="Search for marigold gifts..." required style="width: 100%; height: 20px; font-size: 0.8rem; border: 1px solid #ccc; border-radius: 4px; padding: 2px 6px">
                <button type="submit" style="height: 24px; padding: 2px 6px; font-size: 0.85rem; border-radius: 4px; margin-top: 4px;">Search</button>
            </form>

        <div class="nav-links">
            <a href="index.php"><button>Home</button></a>
            <a href="shop.php"><button>Shop</button></a>
            <a href="cart.php"><button>Cart</button></a>
            

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
        
        <!-- The About Us link added by Kylie -->
        <p style="margin-top: 20px;">
            <a href="about.php" sty;e="color: white; text-decoration: underline;">About Us</a>
        </p>
    </div>
    
</footer>

</body>
</html>
