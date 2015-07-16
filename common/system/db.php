<?php

date_default_timezone_set('Europe/Sofia');

class DBException extends Exception {

}

class DB {
	
	private $db = null;
	static $instance = null;

	protected function __construct() {
		
	}

	//singleton design pattern
	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new DB();
			self::$instance->connect();
		}

		return self::$instance;
	}
	
	public function connect() {
		$this->db = @mysqli_connect('localhost', 'root', '', 'eshop');

		if (!$this->db) {
             throw new DBException('Cannot connect to DB');
        }
	}

	public function query($sql) {
		$res = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
	}

	public function select($sql) {
		$res = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
		$result = array();
		while ($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;
		}
		return $result;	
	}

	public function select_row($sql) {
		$res = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
		return mysqli_fetch_assoc($res);
	}
	
	public function insert($table, $data) {
		$sql = 'INSERT INTO '.$table.' ( '.implode(',', array_keys($data)).') VALUES';
		$values = array();
		foreach ($data as $key => $value) {
			$values[] = '"'.$value.'"';
		}
		$sql .= ' ( '.implode(',', $values).')';
		
		mysqli_query($this->db, $sql);

		return mysqli_insert_id($this->db);
	}
	
	function update($table, $data, $id) {
		
		$sql = 'UPDATE '.$table.' SET ';

		$parts = array();
		foreach ($data as $key => $value) {
			$parts[] = $key . ' = "' .$value.'" ';
		}

		$sql .= implode(',', $parts);

		$sql .= 'WHERE id = '.$id;

		mysqli_query($this->db, $sql);
	}

	public function delete($table, $id) {
		
		$sql = 'DELETE FROM '.$table.' WHERE id = '.$id;
		mysqli_query($this->db, $sql);
	}

	public function get_all($table = 'table', $where = '', $order_by = 'id', $order_direction = 'asc', $limit = '0', $limit_offset = -1) {
		$sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM '.$table;

        if ($where != '') {
            $sql .= ' WHERE '.$where;
        }

        if ($order_by != '' && $order_direction != '') {
            $sql .= ' ORDER BY '.$order_by.' '.$order_direction;
        }

        if ($limit_offset >= 0 && $limit > 0) {
            $sql .= ' LIMIT '.$limit_offset.', '.$limit;
        } elseif ($limit > 0) {
            $sql .= ' LIMIT '.$limit;
        }
        $result = array();

        $result['data'] = $this->select($sql);

        $tmp = $this->select_row('SELECT FOUND_ROWS() as cnt;');
        $result['cnt'] = $tmp['cnt'];

        return $result;
	}
	
}


?>