<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
?>
<p>Welcome back, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!</p>
