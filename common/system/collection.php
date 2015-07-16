<?php

abstract class Collection {

    protected $db = null;

    protected $table = 'table';
    protected $entity = 'Entity';

    private $totalRowCount = 0;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function get_all() {
        return $this->to_entity_array($this->db->get_all($this->table));
    }

    /* receives result array from DB GET ALL and returns entity array - converts to entity array */
    public function to_entity_array($result = array()) {
        $collection = array();

        $this->totalRowCount = $result['cnt'];

        foreach ($result['data'] as $key => $value) {
            $item = new $this->entity;
            $item->init($value);
            $collection[] = $item;
        }
        return $collection;
    }

    public function get($id) {
        
        $result = $this->db->select('SELECT * FROM '.$this->table.' WHERE id = '.(int)$id);
        $item = new $this->entity();
        $item->init($result[0]);
        return $item;
        
    }

    public function delete($id) {
        $this->db->delete($this->table, $id);
    }

    public function getTotalCount() {
        return $this->totalRowCount;
    }

    abstract public function save(Entity $item);

}

?>