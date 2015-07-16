<?php require_once('includes/header.php'); ?>

<article class="container-news">
<h2><?php echo $news->getTitle(); ?></h2>
<em>posted on <?php echo $news->getDate(); ?>by <strong><?php echo $news->getAuthor(); ?></strong></em>
<section>
	<img src="../storage/<?php echo $news->getImage();?>">
</section>
<section>
	<?php echo $news->getContent(); ?>
</section>
<br><br><br>
<div class="container-comments">
<fieldset>
	<legend>Comments</legend>
<?php foreach ($comment as $value) { ?>
	<p>
		Someone said on the <?php echo $value->getDate(); ?>
		<br><br>
		<em>comment by</em> <strong><?php echo $value->getName(); ?></strong>
		<br><br>
		<?php echo $value->getContent(); ?>
	</p>
<?php } ?>
</fieldset>
</div>
<div class="comment-yourself">
<input id="newsid" type="hidden" value="<?php echo $_GET['id'];?>">
<fieldset>
	<legend>Comment Yourself</legend>
	<form action="" method="post">
	<label>name <input type="text" name="name"></label>
	<br><br>
	<label>comment <textarea type="text" name="comment"></textarea></label>
	<br><br><br><br>
	<button id="comment" type="submit">comment</button>
	</form>
</fieldset>
</div>
</article>

<?php require_once('includes/footer.php'); ?>