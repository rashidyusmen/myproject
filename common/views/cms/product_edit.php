<?php require_once('includes/header.php'); ?>

<h2>Redaktirane na product</h2>
<form action="" method="post" enctype="multipart/form-data">
<label>
ime na produkta
<input type="text" name="title" value="<?php echo $value->getTitle();?>">
</label>
<br><br>
<label>
opisanie
<input type="text" name="description" value="<?php echo $value->getDescription();?>">
</label>
<br><br>
<label>
cena
<input type="text" name="price" value="<?php echo $value->getPrice();?>">
</label>
<br><br>
<label>
kartinka
<input type="file" name="image">
<br><br>
</label>
	<img src="../storage/<?php echo $data->getImage(); ?>">
<br><br><br>
<button type="submit">izprati</button>
</form>

<?php require_once('includes/footer.php'); ?>