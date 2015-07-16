<?php

class BlogController extends Controller {
	
	public function index() {

		$news_collection = new NewsCollection();
		$latest_news = $news_collection->get_latest(4);

		$per_page = 4;
        $page = (isset($_GET['n'])?$_GET['n']:1);

		$page_all = $news_collection->getTotalCount();
        $page_count = ceil($page_all / $per_page);


		$this->loadView('website/blog', array(
			'latest_news' => $latest_news,
			'page_count' => $page_count
			));

	}
}

?>