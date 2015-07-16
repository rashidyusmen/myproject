<?php

class LoginController extends Controller {
	public function index() {

		$is_valid = 0;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$users_collection = new UsersCollection();
			if ($users_collection->is_valid($_POST['username'], $_POST['password'])) {
				$_SESSION['user_id'] = $users_collection->get_by_username($_POST['username'])->getId();

				header('Location: index.php?controller=index');
			} else {
				$is_valid = 1;
			}
		}
		$this->loadView('cms/login', array(
			'is_valid' => $is_valid
			));
	}
}

?>