<?php require_once('includes/header.php'); ?>

<h2>komentari</h2>
<table border="1">
<tr>
<th>ID</th>
<th>name</th>
<th>content</th>
<th>date</th>
<th>news_id</th>
<th>deystviq</th>
</tr>
<?php foreach($data as $value) { ?>
<tr>
<td><?php echo $value->getId();?></td>
<td><?php echo $value->getName();?></td>
<td><?php echo $value->getContent();?></td>
<td><?php echo $value->getDate();?></td>
<td><?php echo $value->getNewsId();?></td>
<td>
<a href="index.php?controller=news&action=comment_delete&id=<?php echo $value->getId();?>&news_id=<?php echo $value->getNewsId();?>">iztriy</a>
</td>
</tr>
<?php } ?>
</table>
<?php
require_once('includes/footer.php');
?>