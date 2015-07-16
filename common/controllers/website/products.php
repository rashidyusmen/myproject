<?php

class ProductsController extends Controller {
	
	public function index() {

		$pic = new ProductImageCollection($_GET['id']);
		$gallery = $pic->get_latest(3);
		
		$products_collection = new ProductsCollection();
		$product = $products_collection->get($_GET['id']);

		$this->loadView('website/product', array(
			'product' => $product,
			'gallery' => $gallery
			));
	}
	
}

?>