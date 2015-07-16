<?php

class ChatController extends CmsController {
	public function index() {
		$users_collection = new UsersCollection();
		$user = $users_collection->get($_SESSION['user_id']);

		$this->loadView('cms/chat', array(
			'username' => $user->getUsername()
			));
	}

	public function sendmsg() {
		$mc = new MessagesCollection($_SESSION['user_id']);
		$msg = new MessageEntity();
		$msg->setMessage($_POST['msg']);

		$mc->save($msg);
	}

	public function loadrecent() {
        $mc = new MessagesCollection($_SESSION['user_id']);
        $messages = $mc->load_recent(20);
        echo json_encode($messages);
    }

    public function loadunread() {
        $mc = new MessagesCollection($_SESSION['user_id']);
        echo $mc->get_unread_count();
    }
}

?>