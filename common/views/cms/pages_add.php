<?php require_once('includes/header.php'); ?>

<h2>Dobavqne na pages</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label>
        Zaglavie
        <input type="text" name="title"><br><br>
    </label>
    <label>
        Opisanie<br>
        <textarea rows="10" cols="50" name="content"></textarea><br><br>
    </label>
    <button type="submit">Dobavi</button>
</form>

<?php require_once('includes/footer.php'); ?>