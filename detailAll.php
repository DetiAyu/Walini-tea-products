<?php 
require 'functions.php';
// tampung rows ke variabel products
$products = querydata("SELECT * FROM walini");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walini Tea Products</title>
</head>
<body>
    <h3>List of Walini Tea</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php $i=1;
        foreach ($products as $prod) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $prod['picture']; ?>" width="100px" ></td>
            <td><?= $prod['name']; ?></td>
            <td><?= $prod['type']; ?></td>
            <td><?= $prod['price']; ?></td>
            <td>
                <a href="">Edit</a> | <a href="">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>
</body>
</html>