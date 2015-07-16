<?php

class Controller {

    public function index() {
    	'Define your index...';
    }

    protected function loadView($view, $__data = array()) {
       foreach ($__data as $key => $value) {
            $$key = $value;
        }

        require_once(dirname(__FILE__).'/../../common/views/'.$view.'.php');
    }
}

?>