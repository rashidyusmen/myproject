<?php

class UsersCollection extends Collection {
	protected $table = 'users';
	protected $entity = 'UserEntity';

	public function get_all() {
		return $this->to_entity_array($this->db->get_all($this->table));
	}

	public function is_valid($username, $password) {
		$user_cnt = $this->db->select_row('
			SELECT COUNT(id) as cnt
			FROM users
			WHERE username = "'.$username.'"
			AND password = "'.sha1($password).'"
			');

		return ($user_cnt['cnt'] > 0);
	}

	public function get_by_username($username) {
        $tmp = $this->db->select_row('SELECT id, username FROM users WHERE username = "'.$username.'"');

        $entity = null;

        if (!empty($tmp)) {
            $entity = new UserEntity();
            $entity->setId($tmp['id']);
            $entity->setUsername($tmp['username']);
        }

        return $entity;
    }

    public function save(Entity $entity) {
        $data = array(
            'username' => $entity->getUsername(),
            'password' => $entity->getPassword(),
        );
        
        if ($entity->getId() > 0) {
            $this->db->update($this->table, $data, $entity->getId());
        } else {
            $entity->setId($this->db->insert($this->table, $data));
        }
    }

}

?>