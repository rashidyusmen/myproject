<?php require_once('includes/header.php'); ?>

<table border="1" cellpadding="5" width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Product</th>
        <th>Complete</th>
    </tr>
    <?php foreach ($orders as $value) { ?>
    <tr <?php if ($value->getIsComplete()) { ?> style="background: lightGreen" <?php } ?>>
        <td><?php echo $value->getId();?></td>
        <td><?php echo $value->getName();?></td>
        <td><?php echo $value->getEmail();?></td>
        <td><?php echo $value->getDate()?></td>
        <td><?php echo $value->getProductTitle()?></td>
        <td><input type="checkbox" class="complete" <?php if ($value->getIsComplete()) { ?> checked="checked" <?php } ?> value="<?php echo $value->getId(); ?>"></td>
    </tr>
    <?php } ?>
</table>
<br>


<?php require_once('includes/footer.php'); ?>