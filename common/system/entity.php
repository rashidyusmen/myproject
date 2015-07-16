<?php

class Entity {
    public function init($data = array()) {
        foreach ($data as $key => $value) {
            $method_name = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            $this->$method_name($value);
        }
    }
}

?>