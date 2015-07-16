<?php require_once('../common/bootstrap.php'); ?>
<?php

$news_collection = new NewsCollection();
$article = $news_collection->get($_GET['id']);

$news_comment_collection = new NewsCommentCollection($_GET['id']);

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['name'] != '' && $_POST['comment'] != '') {
		$comment = new NewsComment();

		$comment->setName($_POST['name']);
		$comment->setContent($_POST['comment']);

		$news_comment_collection->save($comment);
	}
}
?>
<?php
$comment = $news_comment_collection->get_all();
?>
<?php require_once('includes/header.php'); ?>
<article class="container-news">
<h2><?php echo $article->getTitle(); ?></h2>
<em>posted on <?php echo $article->getDate(); ?>by <?php echo $article->getAuthor(); ?></em>
<section>
	<img src="../storage/image1 laptop.png">
</section>
<section>
	<?php echo $article->getContent(); ?>
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
<fieldset>
	<legend>Comment Yourself</legend>
	<form action="" method="post">
	<label>name <input type="text" name="name"></label>
	<br><br>
	<label>comment <textarea type="text" name="comment"></textarea></label>
	<br><br><br><br>
	<button type="submit">comment</button>
	</form>
</fieldset>
</div>
</article>
<?php require_once('includes/footer.php'); ?>