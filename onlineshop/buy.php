<?php require_once('../common/db.php');?>
<?php
$products = db_select('SELECT * FROM products WHERE id = '.$_GET['id']);
$products = $products[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['name'] != '' && $_POST['email'] != '') {
		$data = db_insert('buy', array(
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'date' => $_POST['date'],
			'product' => $products['title'],
			'price' => $products['value']
			));
	}
}


?>
<?php require_once('includes/header.php');?>

            <section class="product-head">
                <img src="../storage/<?php echo $products['image'];?>">
                <div class="container-column">
                    <h2><?php echo $products['title'];?></h2>
                    <em>$<?php echo $products['value'];?></em>
                </div>
                <div class="clear"></div>
            </section>
            <br><br><br><br>
            <div class="container-buy">
            <form action="" method="post">
            <label>Name:<input type="text" name="name"></label>
            <br><br>
            <label>Email:<input type="text" name="email"></label>
            <br><br>
            <label>Date:<input type="text" name="date" value="<?php echo date('Y-m-d H:i:s');?>"></label>
            <br><br><br>
            <button type="submit">Buy Now</button>
            </form>
            </div>

<?php require_once('includes/footer.php');?>