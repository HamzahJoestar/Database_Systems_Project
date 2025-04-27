<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form {
            max-width: 400px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form button {
            width: 100%;
            padding: 10px;
            background-color: #ffa500;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
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

<!-- Ã¢Å“â€¦ Main Content Section -->
<main class="home-page">
    <div class="content">
        <h2>Welcome to Marigold Memories!</h2>
        <p>Explore our vibrant collection of marigold-themed products for families, teachers, and event planners.</p>

        <!-- Ã¢Å“â€¦ Registration Form -->
        <section class="form-section" id="register">
            <h2>Create Your Account</h2>
            <form action="process_register.php" method="POST" class="form">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required />

                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" required />

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required />

                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" required />

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required />

                <button type="submit">Sign Up</button>
            </form>
        </section>
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
    </div>
</footer>
