<?php
session_start();

include 'db_connect.php';
if (isset($_POST["remove"])) {
    $productID = $_POST["remove"];
    unset($_SESSION["cart"][$productID]);
}

$host = "localhost";
$user = "root";
$password = "";
$dbname = "muhammh3_marigold";

$conn = new mysqli("localhost", "root", "", "muhammh3_marigold");
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
            
            // Redirect to index.php
            $_SESSION['login_success'] = "You are now logged in " . htmlspecialchars($user['FirstName']) . "!";
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
