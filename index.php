<?php 
require 'functions.php';

// tampung rows ke variabel products
$products = queryAll();

//ketika tombol search diklik
if(isset($_POST['search'])){
    $products = search($_POST['keyword']);
}
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

    <a href="add.php">Add Product</a>
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="30" placeholder="type your search..." autocomplete="off" autofocus class="keyword">
        <button type="submit" name="search" class="search-button">Search</button>
    </form>
    <br>

    <div class="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Action</th>
        </tr>

        <?php if(empty($products)) { ?>
            <tr>
                <td colspan="4">
                    <p>The data is not found</p>
                </td>
            </tr>
        <?php }; ?>

        <?php $i=1;
        foreach ($products as $prod) { ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $prod['picture']; ?>" width="100px" ></td>
            <td><?= $prod['name']; ?></td>
            <td>
                <a href="detail.php?id=<?= $prod['id']; ?> ">Detail</a> 
            </td>
        </tr>
        <?php } ?>

    </table>
    </div>
    <script src="js/script.js"></script>
</body>
</html>