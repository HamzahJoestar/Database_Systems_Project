<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'db_connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marigold Memories - Shop</title>
    <link rel="stylesheet" href="style.css">
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
            <a href="shop_update.php"><button>Shop</button></a>
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
 <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
<?php
        session_start();
        include 'db_connect.php';
        $error = "";
        
        $sql = "SELECT * FROM Products";
        $result = $conn->query($sql);
        
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach($rows as $row){
            $product = $row["ProductID"];
            $name = $row["Name"];
            $price = $row["Price"];
             echo "<tr>
                                <td>{$name}</td>
                                <td>\${$price}</td>
                                                <td><form method='post' action = 'add_to_cart.php'>
                <input type='hidden' name='product' value='$product'/>
                <input type='submit' name='add_to_cart'
                value='Add to Cart'/>
                
                </form></td>";
                if(isset($_SESSION["admin_id"]) || TRUE){
                    echo "<td><a href='edit_product.php?product=$product'>Edit Product</a></td>";
                }
                echo "</tr>";
          

        }
            


        
?>
            </table>
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
