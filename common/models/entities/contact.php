<?php

class ContactEntity extends Entity {
    private $id;
    private $name;
    private $email;
    private $phone;
    private $message;
    private $date;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = strip_tags($message);
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
}

?>