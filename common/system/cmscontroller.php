<?php

class CmsController extends Controller {
	public function __construct() {
		if (!isset($_SESSION['user_id']) || (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 0)) {
			header('Location: index.php?controller=login');
		}
	}
}

?>