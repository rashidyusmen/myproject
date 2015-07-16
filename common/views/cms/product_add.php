<?php require_once('includes/header.php'); ?>

<h2>Dobavqne na product</h2>
<form action="" method="post" enctype="multipart/form-data">

<label>
ime na produkta
<input type="text" name="title">
</label>
<br><br>
<label>
opisanie
<input type="text" name="description">
</label>
<br><br>
<label>
cena
<input type="text" name="price">
</label>
<br><br>
kartinka
<br>
<input type="file" name="image">
<br><br><br>
<button type="submit">Dobavi</button>
</form>

<?php require_once('includes/footer.php'); ?>