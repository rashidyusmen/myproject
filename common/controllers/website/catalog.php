<?php

class CatalogController extends Controller {
	
	public function index() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Location: index.php?frontcontroller=catalog&frontaction=index&search='.$_POST['search'].'&order='.$_POST['order'].'&p=1');
		}

		$products_collection = new ProductsCollection();

        $per_page = 3;
        $page = (isset($_GET['p'])?$_GET['p']:1);
        $search = (isset($_GET['search'])?$_GET['search']:'');
        $order_by = (isset($_GET['order'])?$_GET['order']:'');

        if ($search != '') {
            $products = $products_collection->get_filtered($search, $order_by, $per_page, ($page-1)*$per_page);
        } else {
            $products = $products_collection->get_all($per_page, ($page-1)*$per_page);
        }
        $total_count = $products_collection->getTotalCount();
        $page_count = ceil($total_count/$per_page);

        $this->loadView('website/catalog', array(
            'products' => $products,
            'total_count' => $total_count,
            'page_count' => $page_count,
            'order_by' => $order_by,
            'search' => $search,
            'page' => $page
        ));
	}
}

?>