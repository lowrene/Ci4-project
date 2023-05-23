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

    public function get_email_by_id($id)
    {
        return $this->where('id', $id)
                    ->get()
                    ->getRowArray();
    }


    public function update_email($id, $data)
    {
        return $this->db->table('email')->where('id', $id)->update($data);
    }

    public function delete_email($id)
    {
        return $this->db->table('email')->where('id', $id)->delete();
    }

}
