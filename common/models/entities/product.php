<?php

class ProductEntity extends ImageEntity {
    private $id;
    private $title;
    private $content;
    private $price;


    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = (int)$id;
        return $this;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = (double)$price;
        return $this;
    }

    public function getDescription() {
        return $this->content;
    }

    public function setDescription($content) {
        $this->content = $content;
        return $this;
    }
}

?>