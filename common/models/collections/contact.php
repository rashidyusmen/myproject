<?php

class ContactCollection extends Collection {

    protected $table = 'contacts';
    protected $entity = 'ContactEntity';

    public function get_all() {
        return $this->to_entity_array($this->db->get_all($this->table));
    }

    public function save(Entity $entity) {
        
        $data = array(
            'name' => $entity->getName(),
            'email' => $entity->getEmail(),
            'phone' => $entity->getPhone(),
            'message' => $entity->getMessage(),
            'date' => $entity->getDate(),
        );


        if ($entity->getId() > 0) {
            $this->db->update($this->table, $data, $entity->getId());
        } else {
            $entity->setId($this->db->insert($this->table, $data));
        }
    }
}

?>