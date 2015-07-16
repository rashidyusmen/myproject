<?php require_once('includes/header.php'); ?>


<table border="1" cellpadding="5" width="100%">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Deistviq</th>
    </tr>
    <?php foreach ($users as $value) { ?>
    <tr>
        <td><?php echo $value->getId();?></td>
        <td><?php echo $value->getUsername();?></td>
        <td>
            <a href="index.php?controller=users&action=delete&id=<?php echo $value->getId();?>">Iztriy</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br>
<a href="index.php?controller=users&action=add">Dobavi</a>


<?php require_once('includes/footer.php'); ?>