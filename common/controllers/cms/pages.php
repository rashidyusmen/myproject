<?php

class PagesController extends CmsController {
    public function index() {

        $pages_collection = new PagesCollection();
        $pages = $pages_collection->get_all();

        $this->loadView('cms/pages', array(
            'pages' => $pages
        ));
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pages_collection = new PagesCollection();
            $page = new PageEntity();
            $page->setTitle($_POST['title']);
            $page->setContent($_POST['content']);
            $pages_collection->save($page);

            header('Location: index.php?controller=pages');
        }

        $this->loadView('cms/pages_add');
    }

    public function delete() {
        $pages_collection = new PagesCollection();
        $pages_collection->delete($_GET['id']);

        header('Location: index.php?controller=pages');
    }

    public function edit() {
        $pages_collection = new PagesCollection();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $page = new PageEntity();
            $page->setId($_GET['id']);
            $page->setTitle($_POST['title']);
            $page->setContent($_POST['content']);
            $pages_collection->save($page);

            header('Location: index.php?controller=pages');
        }

        $data = $pages_collection->get($_GET['id']);

        $this->loadView('cms/pages_edit', array(
            'data' => $data
        ));
    }
}

?>