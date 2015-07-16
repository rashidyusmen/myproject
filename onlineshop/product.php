<?php require_once('../common/db.php');?>
<?php
$product = db_select('SELECT * FROM products WHERE id = '.$_GET['id']);
?>
<?php require_once('includes/header.php');?>
<?php foreach ($product as $value) { ?>

        <article class="product">
            <section class="product-head">
                <img src="../storage/<?php echo $value['image'];?>">
                <div class="container-column">
                    <h2><?php echo $value['title'];?></h2>
                    <em>$<?php echo $value['value'];?></em>
                    <a href="buy.php?id=<?php echo $value['id'];?>">Buy Now</a>
                </div>
                <div class="clear"></div>
            </section>
            <section class="product-desc">
                <p>
                    <?php echo $value['description'];?>
                </p>
            </section>
            <section class="product-gallery">
                <h3>Gallery</h3>
                <img src="image/image1 laptop.png">
                <img src="image/image2_laptop.png">
                <img src="image/image3_laptop.png" class="last">
                <div class="clear"></div>
            </section>
        </article>
<?php } ?>

<?php require_once('includes/footer.php');?>