<?php

class NewsCommentEntity extends Entity {
    private $id = 0;
    private $name = '';
    private $content = '';
    private $date = '';
    private $news_id = 0;

    public function getId() {
        return (int)$this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getDate() {
        if ($this->date != '') {
            return $this->date;
        } else {
            return date('Y-m-d H:i:s');
        }
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getNewsId() {
        return (int)$this->news_id;
    }

    public function setNewsId($news_id) {
        $this->news_id = $news_id;
    }
}

?>