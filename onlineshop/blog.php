<?php require_once('../common/db.php'); ?>
<?php
$news = db_select('SELECT * FROM news ORDER BY date_added DESC LIMIT 3');

?>

<?php require_once('includes/header.php');
?>
<?php
foreach($news as $value) { ?>
<div class="item_article">
<h3><a href="article.php?id=<?php echo $value['id'];?>"><?php echo $value['title'];?></a></h3>
<em>Written by <strong><?php echo $value['author'];?></strong></em>
<p>
	<?php echo substr(strip_tags($value['content']), 0, 230);?>
</p>
</div>
<?php } ?>


        <section class="pager">
            <a href="#1">1</a> |
            <a href="#2">2</a> |
            <a href="#3">3</a> |
            <a href="#4">4</a> |
            <a href="#next">&raquo;</a>
        </section>
        <?php require_once('includes/footer.php'); ?>