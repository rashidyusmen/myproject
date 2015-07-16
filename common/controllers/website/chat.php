<?php

class ChatController extends Controller {
	
	public function index() {
		if (isset($_SESSION['user_id'])) {

		    $message_collection = new MessagesCollection($_SESSION['user_id']);

	    } else {
	    	header('Location: index.php?frontcontroller=login');
	    }

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		    $message = new MessageEntity();
		    $message->setMessage($_POST['message']);

		    $message_collection->save($message);

		}

	    $this->loadView('website/chat', array());
	}

	public function loadrecent() {
        $messages_collection = new MessagesCollection($_SESSION['user_id']);
        $messages = $messages_collection->load_recent(20);
        echo json_encode($messages);
    }
}

?>