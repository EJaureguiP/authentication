<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends CI_Controller {



    public function index(){
        $this->load->view('dashboard/dashboard');
    }

	public function apps()
	{
		$data['apps'] = $this->db->get('apps')->result_array();
		$this->load->view('dashboard/apps', $data);
	}

}