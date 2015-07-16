<?php

class ProductsController extends CmsController {

    public function index() {

        $products_collection = new ProductsCollection();
        $products = $products_collection->get_all();

        $this->loadView('cms/products', array(
            'products' => $products
        ));
    }

    public function add() {
        
        $product_image = new ProductsCollection();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $products = new ProductEntity();
            $products
                ->setTitle($_POST['title'])
                ->setDescription($_POST['description'])
                ->setPrice($_POST['price']);

            if ($_FILES['image']['tmp_name'] != '') {
                $products->saveImage($_FILES['image']);
            }
            
            
            $product_image->save($products);
            
            header('Location: index.php?controller=products');
        }

        $this->loadView('cms/product_add');
    }

    public function edit() {
        $products_collection = new ProductsCollection();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $products = new ProductEntity();
            $products
                ->setId($_GET['id'])
                ->setTitle($_POST['title'])
                ->setDescription($_POST['description'])
                ->setPrice($_POST['price']);

            if ($_FILES['image']['tmp_name'] != '') {
                $products->saveImage($_FILES['image']);
            }

            $products_collection->save($products);

            header('Location: index.php?controller=products');
        }


        $data = $products_collection->get($_GET['id']);

        $this->loadView('cms/product_edit', array(
            'data' => $data
        ));
    }

    public function delete() {
        $products_collection = new ProductsCollection();
        $products_collection->delete($_GET['id']);
        header('Location: index.php?controller=products');
    }

    public function gallery() {
        $product_image_collection = new ProductImageCollection($_GET['id']);

            $no_file = 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_gallery = new ProductImageEntity();
            $product_gallery->setProductId($_GET['id']);

            if ($_FILES['image']['tmp_name'] != '') {
                $product_gallery->saveImage($_FILES['image']);
                $product_image_collection->save($product_gallery);
            } else {
                $no_file = 1;
            }
        }
        
        $gallery = $product_image_collection->get_all();
        $this->LoadView('cms/product_gallery', array(
            'gallery' => $gallery,
            'no_file' => $no_file
            ));
    }

    public function gallery_delete() {
        $product_image_collection = new ProductImageCollection($_GET['id']);
        $product_image_collection->delete($_GET['id']);
        $galleries = $product_image_collection->get_all();
        header('Location: index.php?controller=products&action=gallery&id='.$_GET['product_id']);
    }
}

?>