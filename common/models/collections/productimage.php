<?php

class ProductImageCollection extends Collection {
    protected $table = 'products_image';
    protected $entity = 'ProductImageEntity';

    protected $product_id = 0;

    public function __construct($product_id) {
        parent::__construct();
        $this->product_id = $product_id;
    }

    public function get_all() {
        return $this->to_entity_array($this->db->get_all($this->table, 'product_id='.$this->product_id, 'id', 'DESC'));
    }

    public function get_latest($limit = 3) {
        return $this->to_entity_array($this->db->get_all($this->table, 'product_id='.$this->product_id, 'id', 'DESC', $limit));
    }

    public function save(Entity $entity) {
        $data = array(
            'product_id' => $entity->getProductId()
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