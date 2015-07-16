<?php

class ProductImageEntity extends ImageEntity {
    private $id;
    private $product_id;
    protected $image;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = (int)$id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = (int)$product_id;
    }

}

?>