<?php 
require 'functions.php';

// Mengambil id dari url
$id = $_GET['id'];

if(delete($id) >0) {
    echo "<script>
    alert('Data has been deleted');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('Deleting data failed');
    document.location.href = 'index.php';
    </script>";
}
?>