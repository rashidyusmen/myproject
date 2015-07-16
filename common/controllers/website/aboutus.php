<?php

class AboutusController extends Controller {
	public function index() {
		$pages_collection = new PagesCollection();
		$page = $pages_collection->get_all();

		$this->loadView('website/aboutus', array(
			'page' => $page
			));
	}
}

?>