<?php


// Handle updating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
	session_start();
	include 'db_connect.php';

	$success = "true";
    

	$id = trim($_POST["id"]);

	if(empty($_FILES)){
	$name = trim($_POST["name"]);
	$desc = trim($_POST["desc"]);
	$category = trim($_POST["category"]);
	$price = trim($_POST["price"]);
    
	if (empty($name) || empty($desc) || empty($category) || empty($price) || empty($id)) {
	$success = "Error: Please fill in all fields.";
	}
	else{
	$sql = "UPDATE Products SET Name = ? , Description = ? , Category = ? , Price = ? WHERE ProductID = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sssdi", $name, $desc, $category, $price, $id);
	$stmt->execute();
    
   	 
	}
	}
	else{
    	$target_dir = "uploads/";
    	if (!file_exists($target_dir)) {
        	mkdir($target_dir, 0777, true);
    	}
    	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    	$uploadOk = 1;
    	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    	$success = "Got to file portion";
    	// Check if image file is a actual image or fake image
    	if(isset($_POST["submit"])) {
        	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        	if($check !== false) {
            	$uploadOk = 1;
        	} else {
            	$success = "Sorry, your file was not uploaded.";
            	$uploadOk = 0;
        	}
    	}
   	 
    	// Check if file already exists
    	if (file_exists($target_file)) {
        	$success = "Sorry, file already exists.";
        	$uploadOk = 0;
    	}

    	// Check file size
    	if ($_FILES["fileToUpload"]["size"] > 500000) {
        	$success = "Sorry, your file is too large.";
        	$uploadOk = 0;
    	}

    	// Allow certain file formats
    	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    	&& $imageFileType != "gif" ) {
        	$success = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        	$uploadOk = 0;
    	}

    	// Check if $uploadOk is set to 0 by an error
    	if ($uploadOk == 0) {
       	 
    	// if everything is ok, try to upload file
    	} else {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        	$success = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
       	 
            	$sql = "UPDATE Products SET Image = ? WHERE ProductID = ?";
            	$stmt = $conn->prepare($sql);
            	$stmt->bind_param("si", $target_file, $id);
            	$stmt->execute();
    
    	} else {
        	$success = "Sorry, there was an error uploading your file.";
    	}
    	}
	}
    
	header("Location: edit_product.php?product=$id&success=$success");

	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Marigold Memories - Edit Product</title>
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

<?php

    	if(!isset($_GET['product'])){
        	echo "ERROR: NO PRODUCT SELECTED FOR EDITING";
        	exit();
    	}
   	 
    	if(isset($_GET['success'])){
        	echo "<div id='editing-response'><p>";
        	if($_GET['success']=='true'){
            	echo("Editing Successful!");
        	}
        	else{
            	echo($_GET['success']);
        	}
        	echo "</p></div>\n";
        	echo "<script>
  setTimeout(function() {
	const element = document.getElementById('editing-response');
	if (element) {
  	element.remove();
	}
  }, 3000); </script>";
    	}
   	 
    	session_start();
    	include 'db_connect.php';
    	$error = "";
   	 
    	$product = $_GET["product"];

    	$sql = "SELECT * FROM Products WHERE ProductID = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->bind_param("i", $product);
    	$stmt->execute();
    	$result = $stmt->get_result();

    	if ($result->num_rows == 1) {
        	$row = $result->fetch_assoc();
        	$name = $row["Name"];
        	$desc = $row["Description"];
        	$price = $row["Price"];
        	$category = $row["Category"];
        	$image = $row["Image"];
       	 
        	echo "
                	<section class='form-section' id='edit-product'>
        	<form method='POST' action='edit_product.php' class='form'>
            	<input type='hidden' name='id' value='$product'/>
            	<label for='name'>Name: </label>
            	<input type='text' name = 'name' value='$name'/>
            	<label for='desc'>Description: </label>
            	<input type='text' name = 'desc' value='$desc'/>
            	<label for='price'>Price: </label>
            	<input type='number' name = 'price' value='$price' min=0 step='0.01'/>
            	<label for='desc'>Category: </label>
            	<input type='text' name = 'category' value='$category'/>
            	<label>Image: $image</label>
            	<button type='submit' name='edit_product'>Edit</button>
        	</form>
        	<form method='POST' action='edit_product.php' class='form' enctype='multipart/form-data'>
            	<input type='hidden' name='id' value='$product'/>
            	<input type='file' name='fileToUpload' id='fileToUpload'>
            	<button type='submit' name='product'>Upload Image</button>
        	</form>
        	<form method='POST' action='delete_product.php' class='form'>
            	<input type='hidden' name='id' value='$product'/>
            	<button type='submit' name='delete_product'>Delete</button>
        	</form>
        	</section>";
    	}
    	else{
        	echo "ERROR: INVALID PRODUCT ID: ".$product;
    	}
    	$stmt->close();
    	$conn->close();
   	 
   	 
    	exit();
   	 
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
	</div>
</footer>

</body>
</html>
