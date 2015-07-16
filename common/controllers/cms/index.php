<?php

class IndexController extends CmsController {
    public function index() {
        $this->loadView('cms/index');
    }

    public function logout() {
    	unset($_SESSION['user_id']);
    	header('Location: index.php?controller=login');
    }
}

?>