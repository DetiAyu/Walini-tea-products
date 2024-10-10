<?php 
require '../functions.php';
$products = search($_GET['keyword']);
?>

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