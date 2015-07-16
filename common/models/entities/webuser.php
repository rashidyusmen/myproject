<?php

class WebuserEntity extends Entity {
	private $id;
    private $username;
    private $password;

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = (int)$id;
        return $this;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = sha1($password);
        return $this;
    }
}

?>