<?php
require_once('includes/header.php');
?>

<h2>news</h2>
<table border="1">
<tr>
<th>ID</th>
<th>zaglavie</th>
<th>Comentari</th>
<th>deystviq</th>
</tr>
<?php foreach($news as $value) { ?>
<tr>
<td><?php echo $value->getId();?></td>
<td><?php echo $value->getTitle();?></td>
<td><a href="index.php?controller=news&action=comments&id=<?php echo $value->getId();?>"><?php echo $value->getCommentCount();?></a></td>
<td><a href="index.php?controller=news&action=edit&id=<?php echo $value->getId();?>">redaktiray</a>
<a href="index.php?controller=news&action=delete&id=<?php echo $value->getId();?>">iztriy</a>
</td>
</tr>
<?php } ?>
</table>
<br><br>
<a href="index.php?controller=news&action=add">dobavi</a>
<?php
require_once('includes/footer.php');
?>