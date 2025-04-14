<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Register for Marigold Memories" />
    <title>Sign Up | Marigold Memories</title>
    <link href="style.css" rel="stylesheet" />
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

    <!-- Main Content -->
    <main class="home-page">
        <section class="content">
            <h2>Create Your Account</h2>
            <form action="process_register.php" method="POST" class="form">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required />

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required />

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required />

                <button type="submit">Sign Up</button>
            </form>
        </section>
    </main>

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
