<?php 
require 'functions.php';

// Ambil id dari url
$id = $_GET['id'];

// query product berdasarkan id
$prod = querydetail($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
</head>
<body>
    <h3>Detail Product</h3>
    <ul>
        <li><img src="img/<?= $prod['picture']; ?>" width = "250px"></li>
        <li>Name : <?= $prod['name']; ?></li>
        <li>Type : <?= $prod['type']; ?></li>
        <li>Price: <?= $prod['price']; ?></li>
        <li><a href="update.php?id=<?= $prod['id']; ?>">Update</a> | <a href="delete.php?id=<?= $prod['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a></li>
    
        <li><a href="index.php">Back to Product List</a></li>
    </ul>
    
</body>
</html>