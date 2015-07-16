<?php

class ArticleController extends Controller {
	
	public function index() {

		$news_collection = new NewsCollection();
		$news = $news_collection->get($_GET['id']);

		$news_comment_collection = new NewsCommentCollection($_GET['id']);
		$comment = $news_comment_collection->get_all();

		$this->loadView('website/article', array(
			'news' => $news,
			'comment' => $comment
		));


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($_POST['name'] && $_POST['comment'] != '') {

			
			    $comment = new NewsCommentEntity();

			    $comment->setName($_POST['name']);
                $comment->setContent($_POST['comment']);
                $comment->setNewsId($_GET['id']);
                $comment->setDate(date('Y-m-d H:i:s'));
            
                $news_comment_collection->save($comment);
            }
		}
	}
}

?>