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


	public function permissions()
	{
		$data['apps'] = $this->db->get('apps')->result_array();
		$this->load->view('dashboard/permissions', $data);
	}



	public function levels()
	{
		$data['levels'] = $this->db->get('levels')->result_array();
		$this->load->view('dashboard/levels', $data);
	}


	public function types()
	{
		$data['types'] = $this->db->get('types')->result_array();
		$this->load->view('dashboard/types', $data);
	}

}