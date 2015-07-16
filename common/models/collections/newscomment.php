<?php

class NewsCommentCollection extends Collection {
    protected $table = 'comments';
    protected $entity = 'NewsCommentEntity';

    protected $news_id = 0;

    public function __construct($news_id) {
        parent::__construct();
        $this->news_id = $news_id;
    }

    public function get_all() {
        return $this->to_entity_array($this->db->get_all($this->table, 'news_id = '.$this->news_id, 'date', 'desc', 0, -1));
    }

    public function save(Entity $entity) {
        $data = array(
            'name' => $entity->getName(),
            'content' => $entity->getContent(),
            'date' => date('Y-m-d H:i:s', strtotime($entity->getDate())),
            'news_id' => $this->news_id
        );

        if ($entity->getId() > 0) {
            $this->db->update($this->table, $data, $entity->getId());
        } else {
            $entity->setId($this->db->insert($this->table, $data));
        }
    }
}

?>