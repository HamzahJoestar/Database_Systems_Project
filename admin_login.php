<?php
session_start();
include 'db_connect.php';

$success = "";
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_admin'])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Check if admin already exists
    $check = $conn->prepare("SELECT * FROM Admin WHERE Email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $error = "An admin with this email already exists.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO Admin (Email, Password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashed_password);

        if ($stmt->execute()) {
            $success = "Admin registered successfully!";
        } else {
            $error = "Registration failed: " . $conn->error;
        }
        $stmt->close();
    }

    $check->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Admin - Marigold Memories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .register-container {
            max-width: 400px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .register-container h2 {
            text-align: center;
            color: #EAA221;
            margin-bottom: 20px;
        }

        .register-container input {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-container button {
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
    </div>
</header>

<main class="home-page">
    <div class="register-container">
        <h2>Register New Admin</h2>
        <?php if ($success) echo "<div class='message success'>$success</div>"; ?>
        <?php if ($error) echo "<div class='message error'>$error</div>"; ?>

        <form method="POST" action="admindash.html">
            <input type="email" name="email" placeholder="Admin Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register_admin">Register Admin</button>
        </form>
    </div>
</main>

<footer>
    <div class="footer-content">
        <p style="text-align:center;">Only use this page for secure admin setup.</p>
    </div>
</footer>

</body>
</html>
