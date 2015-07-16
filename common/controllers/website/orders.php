<?php

class OrdersController extends Controller {

	public function index() {

        if (isset($_SESSION['user_id']) || (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0)) {

            $sid = $_SESSION['user_id'];

		$products_collection = new ProductsCollection();
        $product = $products_collection->get($_GET['id']);

        $orders_collection = new OrdersCollection($_SESSION['user_id']);
        $orders = $orders_collection->get_all();

        $orders_is_accepted = 0;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$orders = new OrderEntity();
            
            $orders->setName($_POST['name']);
            $orders->setEmail($_POST['email']);
            $orders->setPhone($_POST['phone']);
            $orders->setProductId($_GET['id']);
            $orders->setDate($_POST['date']);
            $orders->setIsComplete(0);
            $orders->setUserId($_POST['name']);

            $orders_collection = new OrdersCollection($_SESSION['user_id']);
            $orders_collection->save($orders);

		} else {
			$orders_is_accepted = 1;
		}

		$this->loadView('website/orders', array(
            'orders' => $orders,
            'sid' => $sid,
            'product' => $product,
            'orders_is_accepted' => $orders_is_accepted
            ));
        } else {
        header('Location: index.php?frontcontroller=login');
    }
    }

	public function basket() {
        if (isset($_SESSION['user_id'])) {
		    $orders_collection = new OrdersCollection($_SESSION['user_id']);
		    echo $orders_collection->get_orders_count($_SESSION['user_id']);
        } else {
            $orders_collection = new OrdersCollection(0);
        }
    }
}

?>