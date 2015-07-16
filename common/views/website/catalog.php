<?php require_once('includes/header.php'); ?>


        <section class="catalog-search">
            <form action="" method="post">
                <input id="search" type="text" name="search" value="<?php if ($search != '') { echo $search; }?>" placeholder="search">
                <button type="submit">Search</button>
                <select name="order">
                    <option value="">Order By</option>
                        <option value="title" <?php if ($order_by == 'title') { echo 'selected="selected"'; } ?>>Title</option>
                        <option value="price" <?php if ($order_by == 'price') { echo 'selected="selected"'; } ?>>Price</option>
                </select>
                <div class="clear"></div>
            </form>
        </section>
        <?php foreach ($products as $value) { ?>
                <section class="container-catalog">
            <div class="item-product">
                <a href="index.php?frontcontroller=products&id=<?php echo $value->getId();?>"><img src="../storage/<?php echo $value->getImage();?>"></a>
                <h3><a href="index.php?frontcontroller=products&id=<?php echo $value->getId();?>"><?php echo $value->getTitle();?></a></h3>
                <em>$<?php echo $value->getPrice();?></em>
                <div class="clear"></div>
                <p>
                    <?php echo $value->getDescription();?>
                </p>
            </div>
            </section>
     <?php } ?>
             <section class="pager">
            <?php for ($i = 1; $i <= $page_count; $i++) { ?>
    <a href="index.php?frontcontroller=catalog&frontaction=index&search=<?php echo $search; ?>&order_by=<?php echo $order_by; ?>&p=<?php echo $i; ?>"><?php echo $i; ?> |</a>
    <?php } ?>
        </section>
<?php require_once('includes/footer.php'); ?>