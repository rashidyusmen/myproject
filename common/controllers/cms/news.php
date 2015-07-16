<?php

class NewsController extends CmsController {

    public function index() {

        $news_collection = new NewsCollection();
        $news = $news_collection->get_all();

        $this->loadView('cms/news', array(
            'news' => $news
        ));
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $news = new NewsEntity();
            $news
                ->setTitle($_POST['title'])
                ->setContent($_POST['content'])
                ->setAuthor($_POST['author'])
                ->setDate($_POST['date_added']);

            if ($_FILES['image']['tmp_name'] != '') {
                $news->saveImage($_FILES['image']);
            }
            
            $news_collection = new NewsCollection();
            $news_collection->save($news);
            
            header('Location: index.php?controller=news');
        }

        $this->loadView('cms/news_add');
    }

    public function edit() {
        $news_collection = new NewsCollection();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $news = new NewsEntity();
            $news
                ->setId($_GET['id'])
                ->setTitle($_POST['title'])
                ->setContent($_POST['content'])
                ->setAuthor($_POST['author'])
                ->setDate($_POST['date_added']);

            if ($_FILES['image']['tmp_name'] != '') {
                $news->saveImage($_FILES['image']);
            }

            $news_collection->save($news);

            header('Location: index.php?controller=news');
        }


        $data = $news_collection->get($_GET['id']);

        $this->loadView('cms/news_edit', array(
            'data' => $data
        ));
    }

    public function delete() {
        $news_collection = new NewsCollection();
        $news_collection->delete($_GET['id']);
        header('Location: index.php?controller=news');
    }

    public function comments() {
        $ncc = new NewsCommentCollection($_GET['id']);
        $data = $ncc->get_all();

        $this->loadView('cms/comments', array(
            'data' => $data
        ));
    }

    public function comment_delete() {
        
        $ncc = new NewsCommentCollection($_GET['news_id']);
        $ncc->delete($_GET['id']);
        header('Location: index.php?controller=news&action=comments&id='.$_GET['news_id']);
    }
}

?>