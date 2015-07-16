<?php

class NewsCollection extends Collection {
    protected $table = 'news';
    protected $entity = 'NewsEntity';

    public function get_all() {
        
        $news = $this->to_entity_array($this->db->get_all($this->table));

        foreach ($news as $key => $value) {
            $res = $this->db->select('SELECT COUNT(*) as cnt FROM comments WHERE news_id = '.$value->getId());
            $news[$key]->setCommentCount($res[0]['cnt']);
        }
        return $news;
    }

    public function get_latest($how_many = 3) {
        return $this->to_entity_array($this->db->get_all($this->table, '', 'date', 'desc', $how_many));
    }

    public function save(Entity $entity) {
        
        $data = array(
            'title' => $entity->getTitle(),
            'content' => $entity->getContent(),
            'author' => $entity->getAuthor(),
            'date' => date('Y-m-d H:i:s', strtotime($entity->getDate())),
        );

        if ($entity->getImage() != '') {
            $data['image'] = $entity->getImage();
        }

        if ($entity->getId() > 0) {
            $this->db->update($this->table, $data, $entity->getId());
        } else {
            $entity->setId($this->db->insert($this->table, $data));
        }
    }
}

?>