<?php

class Domain extends CI_Model {


    public function get_entries()
    {
        $query = $this->db->get('domains');
        return $query->result();
    }

    public function insert()
    {

    }


}