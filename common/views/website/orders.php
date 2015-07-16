<?php require_once('includes/header.php');?>

            <section class="product-head">
                <img src="../storage/<?php echo $product->getImage();?>">
                <div class="container-column">
                    <h2><?php echo $product->getTitle();?></h2>
                    <em>$<?php echo $product->getPrice();?></em>
                </div>
                <br><br>
                <?php if ($orders_is_accepted == 0) {echo '<font color="blue" id="orders"><strong>Orders is accepted</strong></font>';} ?>
                <br>
                <div class="clear"></div>
            </section>
            <br><br><br><br>
            <div class="container-buy">
            <form action="" method="post">
            <br>
                    <?php echo $sid ;?>
                    <br>
            <label>Name: <input type="text" name="name"></label>
            <br><br>
            <label>Email: <input type="text" name="email"></label>
            <br><br>
            <label>Phone: <input type="text" name="phone"></label>
            <br><br>
            <label>Date: <input type="text" name="date" value="<?php echo date('Y-m-d H:i:s');?>"></label>
            <br><br><br>
            <button type="submit">Buy Now</button>
            </form>
            </div>

<?php require_once('includes/footer.php');?>