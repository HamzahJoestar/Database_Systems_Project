<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location: login.php");
	exit;
}
include 'db_connect.php';


$query = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["query"])) {
	$query = mysqli_real_escape_string($conn, $_POST["query"]);
	$sql = "SELECT * FROM Products WHERE Name LIKE '%$query%'";
} else {
	$sql = "SELECT * FROM Products";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shop - Marigold Memories</title>
	<link rel="stylesheet" href="style.css">
	<style>
    	.shop-container {
        	max-width: 1100px;
        	margin: 40px auto;
        	padding: 0 20px;
    	}

    	.products-grid {
        	display: grid;
        	grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        	gap: 20px;
        	margin-top: 30px;
    	}

    	.product-card {
        	background: #fff;
        	border: 1px solid #ddd;
        	border-radius: 8px;
        	padding: 16px;
        	text-align: center;
        	box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    	}

    	.product-card h3 {
        	font-size: 1.1rem;
        	margin: 10px 0;
    	}

    	.product-card p {
        	color: #666;
        	font-size: 0.9rem;
    	}

    	.product-card button {
        	margin-top: 10px;
        	background-color: #EAA221;
        	color: white;
        	border: none;
        	padding: 10px 15px;
        	border-radius: 6px;
        	font-weight: bold;
        	cursor: pointer;
    	}

    	.search-bar-wrapper {
        	max-width: 300px;
        	margin: 20px auto;
        	text-align: right;
    	}

    	.search-bar-wrapper input {
        	width: 100%;
        	height: 28px;
        	font-size: 0.85rem;
        	padding: 4px 6px;
        	border: 1px solid #ccc;
        	border-radius: 4px;
    	}

    	.search-bar-wrapper button {
        	height: 28px;
        	padding: 4px 8px;
        	font-size: 0.85rem;
        	border-radius: 4px;
        	background-color: #EAA221;
        	color: white;
        	border: none;
        	cursor: pointer;
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
        	<a href="shop_update.php"><button>Shop</button></a>
        	<a href="cart.php"><button>Cart</button></a>

        	<div class="dropdown">
            	<button class="dropbtn">Customer</button>
            	<div class="dropdown-content">
                	<a href="login.php">Sign In</a>
                	<a href="register.php">Sign Up</a>
            	</div>
        	</div>

        	<div class="dropdown">
            	<button class="dropbtn">Admin</button>
            	<div class="dropdown-content">
                	<a href="admin_login.php">Sign In</a>
            	</div>
        	</div>
    	</div>
	</div>
</header>

<main class="shop-container">
	<div class="search-bar-wrapper">
    	<form class="form" method="POST" action="shop_update.php">
        	<input type="text" name="query" placeholder="Search for marigold gifts..." value="<?= htmlspecialchars($query) ?>" required>
        	<button type="submit">Search</button>
    	</form>
	</div>

	<div class="products-grid">
    	<?php
    	if (mysqli_num_rows($result) > 0) {
        	while ($product = mysqli_fetch_assoc($result)) {
            	echo '<div class="product-card">';
            	echo '<h3>' . htmlspecialchars($product['Name']) . '</h3>';
            	echo '<p>' . htmlspecialchars($product['Description']) . '</p>';
            	echo '<p><strong>$' . number_format($product['Price'], 2) . '</strong></p>';
            	echo '<form method="POST" action="add_to_cart.php">';
            	echo '<input type="hidden" name="product" value="' . $product['ProductID'] . '">';
            	echo '<button type="submit">Add to Cart</button>';
            	echo '</form>';
            	if(isset($_SESSION["admin_id"])){
                	echo "<td><a href='edit_product.php?product={$product['ProductID']}'>Edit Product</a></td>";
            	}
            	echo '</div>';
        	}
    	} else {
        	echo "<p>No products found matching your search.</p>";
    	}
    	?>
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
    	<p style="margin-top: 20px;">
        	<a href="about.php" style="color: white; text-decoration: underline;">About Us</a>
    	</p>
	</div>
</footer>

</body>
</html>
