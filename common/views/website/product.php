<?php require_once('includes/header.php');?>

        <input type="hidden" id="buyid" value="<?php echo $product->getId(); ?>">
        <article class="product">
            <section class="product-head">
                <img src="../storage/<?php echo $product->getImage();?>">
                <div class="container-column">
                    <h2><?php echo $product->getTitle();?></h2>
                    <em>$<?php echo $product->getPrice();?></em>
                    <button type="submit" id="buy">Buy Now</button>
                </div>
                <div class="clear"></div>
            </section>
            <section class="product-desc">
                <p>
                    <?php echo $product->getDescription();?>
                </p>
            </section>
            <section class="product-gallery">
                <h3>Gallery</h3>
                <?php foreach ($gallery as $key => $value) { ?>
                <img src="../storage/<?php echo $value->getImage(); ?>" class="last">
                <?php } ?>
                <div class="clear"></div>
            </section>
        </article>

<?php require_once('includes/footer.php');?>