<?php

class OrdersCollection extends Collection {
    protected $table = 'orders';
    protected $entity = 'OrderEntity';

    private $user_id = 0;

    public function __construct($user_id = 0) {
        parent::__construct();
        $this->user_id = $user_id;
    }

    public function save(Entity $entity) {

        $data = array(
            'product_id' => $entity->getProductId(),
            'date' => $entity->getDate(),
            'name' => $entity->getName(),
            'email' => $entity->getEmail(),
            'phone' => $entity->getPhone(),
            'is_complete' => $entity->getIsComplete(),
            'user_id' => $entity->getUserId()
        );
        
        if ($entity->getId() > 0) {
            $this->db->update($this->table, $data, $entity->getId());
        } else {
            $entity->setId($this->db->insert($this->table, $data));
        }
    }

    public function get_all() {
        $sql = '
            SELECT SQL_CALC_FOUND_ROWS orders.*, products.title as product_title, products.price as product_price
            FROM orders
            JOIN products ON orders.product_id = products.id
        ';

        $result['data'] = $this->db->select($sql);

        $tmp = $this->db->select_row('SELECT FOUND_ROWS() as cnt;');
        $result['cnt'] = $tmp['cnt'];

        return $this->to_entity_array($result);
    }

    public function get_orders_count($user_id) {
        $cnt = $this->db->select_row('SELECT COUNT(id) as cnt FROM orders WHERE user_id = '.$this->user_id);
        return $cnt['cnt'];
    }

    public function get_by_ordername($ordername) {
        $tmp = $this->db->select_row('SELECT id, name FROM orders WHERE name = "'.$ordername.'"');

        $entity = null;

        if (!empty($tmp)) {
            $entity = new OrderEntity();
            $entity->setId($tmp['id']);
            $entity->setName($tmp['name']);
        }

        return $entity;
    }
}

?>