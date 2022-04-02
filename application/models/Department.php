<?php

class Department extends CI_Model {


    public function get_entries()
    {
        $query = $this->db->get('departments');
        return $query->result();
    }

    public function insert()
    {

    }


}