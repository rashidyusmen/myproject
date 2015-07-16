<?php

class WebusersController extends Controller {
	public function index() {

        $webusers_collection = new WebusersCollection();
        $users = $webusers_collection->get($_SESSION['user_id']);

        $this->loadView('website/users', array(
            'users' => $users
        ));
    }

    public function add() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $users_collection = new WebusersCollection();
            $user = new WebuserEntity();
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            $users_collection->save($user);

            header('Location: index.php?frontcontroller=index');
        }

        $this->loadView('website/users_add');
    }
}

?>