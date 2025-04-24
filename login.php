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
