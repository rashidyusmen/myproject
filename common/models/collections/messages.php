<?php

class MessagesCollection extends Collection {
    public $table = 'messages';
    public $entity = 'MessageEntity';

    private $user_id = 0;

    public function __construct($user_id = 0) {
        parent::__construct();
        $this->user_id = $user_id;
    }

    public function load_recent($limit) {
        $data = 
            $this->db->select('
                SELECT a.*, b.username
                FROM messages a
                LEFT JOIN users b ON a.sender_id = b.id
                WHERE recepient_id = '.$this->user_id.'
                ORDER BY a.date_added DESC
                LIMIT '.$limit.'
            ');

        $this->db->query('UPDATE messages SET is_read = 1 WHERE recepient_id = '.$this->user_id);


        return $data;
    }

    public function get_unread_count() {
        $cnt = $this->db->select_row('SELECT COUNT(id) as cnt FROM messages WHERE is_read = 0 AND recepient_id = '.$this->user_id);
        return $cnt['cnt'];
    }

    public function save(Entity $entity) {

        $users = $this->db->get_all('users');

        foreach ($users['data'] as $key => $value) {
            $this->db->insert($this->table, array(
                'msg' => $entity->getMessage(),
                'is_read' => 0,
                'user_id' => $value['id'],
                'sender_id' => $this->user_id,
                'recepient_id' => $value['id'],
                'date_added' => $entity->getDate()
            ));
        }
    }
}

?>