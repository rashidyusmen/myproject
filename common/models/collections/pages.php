<?php

class PagesCollection extends Collection {
    
    protected $table = 'pages';
    protected $entity = 'PageEntity';

    public function get_all() {
        return $this->to_entity_array($this->db->get_all($this->table));
    }

    public function save(Entity $entity) {
        $data = array(
            'title' => $entity->getTitle(),
            'content' => $entity->getContent(),
        );
        
        if ($entity->getId() > 0) {
            $this->db->update($this->table, $data, $entity->getId());
        } else {
            $entity->setId($this->db->insert($this->table, $data));
        }
    }
}

?>