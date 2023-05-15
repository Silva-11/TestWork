<?php

$conn = mysqli_connect('localhost', 'root', '', 'loginyt');
if (!$conn) {
  die('Database connection error: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $image = $_FILES['image']['name'];

  $targetDir = 'uploads/';
  $targetFile = $targetDir . basename($image);
  move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

  
  $sql = "INSERT INTO products (name, description, image) VALUES ('$name', '$description', '$image')";
  if (mysqli_query($conn, $sql)) {
    echo 'Product added successfully.';
  } else {
    echo 'Error adding product: ' . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Add Product</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
        <h1>Add Product</h1>

  <form method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required>

    <label for="description">Product Description:</label>
    <textarea name="description" required></textarea>

    <label for="image">Product Image:</label>
    <input type="file" name="image" required>

    <button type="submit">Add Product</button>
  </form>
  </div>
</body>
</html>