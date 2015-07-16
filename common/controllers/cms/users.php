<?php

class UsersController extends CmsController {
	public function index() {

        $users_collection = new UsersCollection();
        $users = $users_collection->get_all();

        $this->loadView('cms/users', array(
            'users' => $users
        ));
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $users_collection = new UsersCollection();
            $user = new UserEntity();
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            $users_collection->save($user);

            header('Location: index.php?controller=users');
        }

        $this->loadView('cms/users_add');
    }

    public function delete() {
        $users_collection = new UsersCollection();
        $users_collection->delete($_GET['id']);

        header('Location: index.php?controller=users');
    }

    public function edit() {
        $users_collection = new UsersCollection();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $user = new UserEntity();
            $user->setId($_GET['id']);
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            $users_collection->save($page);

            header('Location: index.php?controller=users');
        }

        $users = $users_collection->get($_GET['id']);

        $this->loadView('cms/users_edit', array(
            'users' => $users
        ));
    }
}

?>