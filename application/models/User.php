<?php

class User extends CI_Model {


    public function get_entries()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
    }


}