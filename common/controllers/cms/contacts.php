<?php

class ContactsController extends CmsController {

    public function index() {

        $contact_collection = new ContactCollection();
        $contacts = $contact_collection->get_all();

        $this->loadView('cms/contacts', array(
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

            header('Location: index.php?controller=contacts');
        }

        $this->loadView('cms/contact_add');
    }

    public function delete() {
        $contacts_collection = new ContactCollection();
        $contacts_collection->delete($_GET['id']);

        header('Location: index.php?controller=contacts');
    }

}

?>