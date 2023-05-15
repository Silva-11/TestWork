<!DOCTYPE html>
<html>
<head>
	<title>Product List</title>
	<style>
		.product {
			display: inline-block;
			margin: 10px;
			padding: 10px;
			border: 1px solid #ccc;
			text-align: center;
		}

		.product img {
			max-width: 200px;
			max-height: 200px;
		}
	</style>
</head>
<body>
	<h1>Product List</h1>

	<?php
	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "loginyt";
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Retrieve products from the database
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // Output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo '<div class="product">';
	        echo '<img src="uploads/' . $row["image"] . '" alt="' . $row["name"] . '">';
	        echo '<h3>' . $row["name"] . '</h3>';
	        echo '<p>' . $row["description"] . '</p>';
	        echo '</div>';
	    }
	} else {
	    echo "No products found.";
	}

	// Close the database connection
	$conn->close();
	?>
</body>
</html>
