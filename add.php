<?php 
require 'functions.php';

// cek apakah tombol add sudah ditekan
if(isset($_POST['add'])){
    if(add($_POST) >0) {
        echo "<script>
        alert('Data has been added');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Adding data failed');
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
    <title>Add Product</title>
</head>
<body>
    <h3>Add Product Form</h3>
    <form action="" method="POST">
        <ul>
            <li>
                <label>
                    Name :
                    <input type="text" name="name" autofocus required>
                </label>
            </li>
            <li>
                <label>
                    Type :
                    <input type="text" name="type" required>
                </label>
            </li>
            <li>
                <label>
                    Price :
                    <input type="text" name="price" required>
                </label>
            </li>
            <li>
                <label>
                    Picture :
                    <input type="text" name="picture">
                </label>
            </li>
            <li>
                <button type="submit" name="add">Add Product</button>
            </li>
        </ul>
    </form>
    
</body>
</html>