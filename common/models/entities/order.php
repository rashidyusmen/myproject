<?php

class OrderEntity extends Entity {
    private $id, $product_id, $name, $email, $phone, $date, $product_title, $product_price, $is_complete, $user_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getProductId() {
            return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function getProductTitle() {
        return $this->product_title;
    }

    public function setProductTitle($product_title) {
        $this->product_title = $product_title;
        return $this;
    }

    public function getProductPrice() {
        return $this->product_price;
    }

    public function setProductPrice($product_price) {
        $this->product_price = $product_price;
        return $this;
    }

    public function getDate() {
        if ($this->date != '') {
            return $this->date;    
        } else {
            return date('Y-m-d H:i:s');
        }
        
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setIsComplete($is_complete) {
        $this->is_complete = $is_complete;
        return $this;
    }

    public function getIsComplete() {
        return $this->is_complete;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
        return $this;
    }
}

?>