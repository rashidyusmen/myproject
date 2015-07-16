<?php

class NewsEntity extends ImageEntity {
	private $id = 0;
	private $title = '';
	private $content = '';
	private $author = '';
	private $date = '';
	private $comment_count = '';
	private $comments = array();
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = (int)$id;
		return $this;
	}
	
	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	
	public function getAuthor() {
		return $this->author;
	}

	public function setAuthor($author) {
		$this->author = $author;
		return $this;
	}

	public function getContent() {
		return $this->content;
	}

	public function setContent($content) {
		$this->content = $content;
		return $this;
	}

	public function getDate() {
		return $this->date;
	}

	public function setDate($date) {
		$this->date = $date;
		return $this;
	}

	public function getCommentCount() {
		return $this->comment_count;
	}

	public function setCommentCount($comment_count) {
		$this->comment_count = $comment_count;
		return $this;
	}

	public function getExcerpt() {
		return substr(strip_tags($this->getContent()), 0,230);
	}
	
}

?>