<?php

class ProductsCollection extends Collection {
    protected $table = 'products';
    protected $entity = 'ProductEntity';

    public function get_all($how_many = -1, $start_from = 0) {
        return $this->to_entity_array($this->db->get_all($this->table, '', 'id', 'asc', $how_many, $start_from));
    }

    public function get_filtered($search = '', $order_by = 'id', $how_many = -1, $start_from = 0) {
        $where = '';
        if ($search != '') {
            $where .= 'title LIKE "%'.$search.'%"';
        }

        return $this->to_entity_array($this->db->get_all($this->table, $where, $order_by, 'asc', $how_many, $start_from));
    }

    public function get_latest($how_many = 3) {
        return $this->to_entity_array($this->db->get_all($this->table, '', 'id', 'desc', $how_many));
    }

    public function save(Entity $entity) {
        $data = array(
            'title' => $entity->getTitle(),
            'description' => $entity->getDescription(),
            'price' => $entity->getPrice(),
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