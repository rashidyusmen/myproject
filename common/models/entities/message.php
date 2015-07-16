<?php

class MessageEntity extends Entity {
    private $id, $date_added, $user_id, $username, $msg;

    public function __construct() {
        $this->date_added = date('Y-m-d H:i:s');
    }

    public function setDate($date_added = '') {
        if ($date_added != '') {
            $this->date_added = date('Y-m-d H:i:s', strtotime($date_added));
        }
    }

    public function getDate() {
        return $this->date_added;
    }

    public function setMessage($msg) {
        $this->msg = $msg;
    }

    public function getMessage() {
        return $this->msg;
    }
}

?>