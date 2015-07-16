<?php require_once('includes/header.php');
?>
<?php
foreach($latest_news as $value) { ?>
<div class="item_article">
<h3><a href="index.php?frontcontroller=article&id=<?php echo $value->getId();?>"><?php echo $value->getTitle();?></a></h3>
<em>Written by <strong><?php echo $value->getAuthor();?></strong></em>
<p>
	<?php echo substr(strip_tags($value->getContent()), 0, 230);?>
</p>
</div>
<?php } ?>


        <section class="pager">
            <?php for ($i = 1; $i <= $page_count; $i++) { ?>
    <a href="index.php?frontcontroller=blog&frontaction=index&n=<?php echo $i; ?>"><?php echo $i; ?> |</a>
    <?php } ?>
    &raquo;
        </section>
        <?php require_once('includes/footer.php'); ?>