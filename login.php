<!-- header.php -->
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Marigold Memories</title>
    <link href="header.css" rel="stylesheet" />
    <link href="login.css" rel="stylesheet" />
    <link href="homepage.css" rel="stylesheet" />
    <link href="footer.css" rel="stylesheet" />
</head>
<body>
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
    
    <?php include 'footer.php'; ?>
</body>
</html>