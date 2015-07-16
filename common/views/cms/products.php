<?php
require_once('includes/header.php');
?>
<h2>products</h2>
<table border="1">
<tr>
<th>id</th>
<th>product</th>
<th>deystviq</th>
</tr>
<?php foreach($products as $value) { ?>
<tr>
<td><?php echo $value->getId();?></td>
<td><?php echo $value->getTitle();?></td>
<td><a href="index.php?controller=products&action=edit&id=<?php echo $value->getId();?>">redaktiray</a>
<a href="index.php?controller=products&action=gallery&id=<?php echo $value->getId(); ?>">Gallery</a>
<a href="index.php?controller=products&action=delete&id=<?php echo $value->getId(); ?>">iztriy</a>
</td>
</tr>
<?php } ?>
</table>
<br><br>
<a href="index.php?controller=products&action=add">Dobavi</a>
<?php
require_once('includes/footer.php');
?>