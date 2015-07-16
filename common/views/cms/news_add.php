<?php
require_once('includes/header.php');
?>
<h2>Dobavqne na novina</h2>
<form action="" method="post" enctype="multipart/form-data">
<label>
avtor
<input type="text" name="author">
</label>
<br><br>
<label>
zaglavie
<input type="text" name="title">
</label>
<br><br>
<label>
data
<input type="text" name="date_added" value="<?php echo date('Y-m-d H:i:s');?>">
</label>
<br><br>
<label>
kartinka
<input type="file" name="image"><br><br>
</label>
<br><br>
<label>
sadarjanie
<br>
<textarea rows="10" cols="50" name="content"></textarea>
</label>
<br><br>
<button type="submit">dobavi</button>
</form>
<?php
require_once('includes/footer.php');
?>