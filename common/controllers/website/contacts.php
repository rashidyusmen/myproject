<?php

class ContactsController extends Controller {

    public function index() {

        $contact_collection = new ContactCollection();
        $contacts = $contact_collection->get_all();

        $this->loadView('website/contacts', array(
            'contacts' => $contacts
        ));
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $contact = new ContactEntity();
            
            $contact->setName($_POST['name']);
            $contact->setEmail($_POST['email']);
            $contact->setPhone($_POST['phone']);
            $contact->setMessage($_POST['message']);
            $contact->setDate($_POST['date']);

            $contacts_collection = new ContactCollection();
            $contacts_collection->save($contact);

            header('Location: index.php?frontcontroller=contacts');
        }

        $this->loadView('website/contacts');
    }
}

?>