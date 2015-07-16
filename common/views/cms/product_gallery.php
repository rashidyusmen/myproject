<?php
require_once('includes/header.php');
?>

<?php
if ($no_file == 1) {
    echo 'kachete file';
}

?>

<h2>Gallery</h2>

<table border="1" cellpadding="5" width="100%">
    <tr>
        <th>ID</th>
        <th>Product ID</th>
        <th>Image</th>
        <th>Deistviq</th>
        
    </tr>
    <?php foreach ($gallery as $value) { ?>
    <tr>
        <td><?php echo $value->getId(); ?></td>
        <td><?php echo $value->getProductId(); ?></td>
        <td><img src="../storage/<?php echo $value->getImage(); ?>" width="200"></td>
        <td>
            <a href="index.php?controller=products&action=gallery_delete&id=<?php echo $value->getId(); ?>&product_id=<?php echo $value->getProductId();?>">Iztriy</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <br><br>
    <button type="submit">kachi</button>
</form>


<?php require_once('includes/footer.php'); ?>