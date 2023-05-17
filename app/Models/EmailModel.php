<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table = 'email';

    protected $allowedFields = ['sender_email', 'receiver_email', 'message'];

    public function getEmail()
    {
        return $this->findAll();
    }

    public function get_all_email() {
        return $this->db->get('email')->result_array();
    }

    public function get_email_by_id($id) {
        return $this->db->get_where('email', array('id' => $id))->row_array();
    }

    public function update_email($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('email', $data);
    }

    public function delete_email($id) {
        $this->db->where('id', $id);
        return $this->db->delete('email');
    }
}
