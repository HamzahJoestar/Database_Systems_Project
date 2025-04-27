<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}
include 'db_connect.php';


// Handle creating

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    
    $sql_id = "SELECT MAX(ProductID) as ID FROM Products";
    $result = $conn->query($sql_id);
    
    $id = $result->fetch_assoc()['ID']+1;

    $success = "Added Product ".$id." Successfully!";
    $name = trim($_POST["name"]);
    $desc = trim($_POST["desc"]);
    $category = trim($_POST["category"]);
    $price = trim($_POST["price"]);
    $_SESSION['admin_id'] = $AdminID;
    
    if (empty($name) || empty($desc) || empty($category) || empty($price) || empty($id)) {
    $success = "Please fill in all fields.";
    }
    else{
        
    $sql = "INSERT INTO Products VALUES (?, ?, ?, ?, ?, 'default.png',?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdsi", $id, $name, $desc, $price, $category, $admin_id);
    $stmt->execute();
    
        
    }
    
    header("Location: edit_product.php?product=$id&success=$success");

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Create Product</title>
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

                <section class='form-section' id='create-product'>
            <form method='POST' action='create_product.php' class='form'>
                <label for='name'>Name: </label>
                <input type='text' name = 'name'/>
                <label for='desc'>Description: </label>
                <input type='text' name = 'desc'/>
                <label for='price'>Price: </label>
                <input type='number' name = 'price' min=0 step='0.01'/>
                <label for='desc'>Category: </label>
                <input type='text' name = 'category'/>
                <button type='submit' name='create_product'>Create</button>

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

</body>
</html>
