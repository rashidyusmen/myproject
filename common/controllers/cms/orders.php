<?php 

class OrdersController extends CmsController {

    public function index() {

        $orders_collection = new OrdersCollection();
        $orders = $orders_collection->get_all();

        $this->loadView('cms/orders', array(
            'orders' => $orders
        ));
    }

    public function completeorders () {
        $orders_collection = new OrdersCollection();
        $orders = $orders_collection->get($_GET['id']);
        $orders->setIsComplete($_GET['is_complete']);
        $orders_collection->save($orders);
    }
}


?>