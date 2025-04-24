<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";
$password = "";
$dbname = "muhammh3_marigold";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email and password are provided
if (isset($_POST['email'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die("Please fill in all fields.");
    }

    // Check if user exists
    $stmt = $conn->prepare("SELECT UserID, Password, FirstName FROM Users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['Password'])) {
            // Password is correct, log user in
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $user['FirstName'];

            // Set a session variable for the success message
            $_SESSION['login_success'] = "Welcome back, " . htmlspecialchars($email) . "!";

            // Redirect to index.php
            header("Location: index.php");
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
} else {
    echo "Email or password not set.";
}

$conn->close();
?>
