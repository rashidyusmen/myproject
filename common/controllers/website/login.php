<?php

class LoginController extends Controller {
	public function index() {


		$is_valid = 0;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$webusers_collection = new WebusersCollection();
			if ($webusers_collection->is_valid($_POST['username'], $_POST['password'])) {
				$_SESSION['user_id'] = $webusers_collection->get_by_username($_POST['username'])->getId();
				$_SESSION['user_name'] = $webusers_collection->get_by_username($_POST['username'])->getUsername();

				header('Location: index.php?frontcontroller=index');
			} else {
				$is_valid = 1;
			}
		}
		$this->loadView('website/login', array(
			'is_valid' => $is_valid
			));
	}
}

?>