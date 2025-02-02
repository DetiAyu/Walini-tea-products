<?php 
require 'functions.php';

// Mengambil id dari url
$id = $_GET['id'];

// Query product berdasarkan id
$prod = queryById($id);

// cek apakah tombol update sudah ditekan
if(isset($_POST['update'])){
    if(update($_POST) >0) {
        echo "<script>
        alert('Data has been updated');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Updating data failed');
        document.location.href = 'index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h3>Update Product Form</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $prod['id']; ?>">
        <ul>
            <li>
                <label>
                    Name :
                    <input type="text" name="name" autofocus required value="<?= $prod['name']; ?>">
                </label>
            </li>
            <li>
                <label>
                    Type :
                    <input type="text" name="type" required value="<?= $prod['type']; ?>">
                </label>
            </li>
            <li>
                <label>
                    Price :
                    <input type="text" name="price" required value="<?= $prod['price']; ?>">
                </label>
            </li>
            <li>
                <input type="hidden" name="old_picture" value="<?= $prod['picture']; ?>">
                <label>
                    Picture :
                    <input type="file" name="picture" class="picture" onchange="previewImage()">
                </label>
                <img src="img/<?= $prod['picture']; ?>" width="120" style="display: block" class="img-preview">
            </li>
            <li>
                <button type="submit" name="update">Update Product</button>
            </li>
        </ul>
    </form>
    <script src="js/script.js"></script>
</body>
</html>