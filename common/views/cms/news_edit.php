<?php
require_once('includes/header.php');
?>
<h2>redaktirane na novina</h2>
<form action="" method="post">
<label>avtor<input type="text" name="author" value="<?php echo $data->getAuthor();?>"></label>
<br><br>
<label>zaglavie<input type="text" name="title" value="<?php echo $data->getTitle();?>"></label>
<br><br>
<label>data<input type="text" name="date_added" value="<?php echo $data->getDate();?>"></label>
<br><br>
<label>kartinka	
<?php if ($data->getImage() != '') { ?>
	<img src="../storage/<?php echo $data->getImage();?>" width="300">
<?php } ?>
<input type="file" name="image">
</label>
<label>sadarjanie<textarea rpws="10" cols="50" name="content"><?php echo $data->getContent();?></textarea></label>
<br><br>
<button type="submit">redaktiray</button>
</form>
<?php
require_once('includes/footer.php');
?>