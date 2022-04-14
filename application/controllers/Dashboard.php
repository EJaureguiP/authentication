<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller
{



	public function index()
	{
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


	public function users()
	{
		$data['users'] = $this->db->get('users')->result_array();
		$this->load->view('dashboard/users', $data);
	}

	public function user_create()
	{
		$this->db->select('user_permission.user_permission_id, user_permission.user_id, user_permission.app_id, apps.app_name, user_permission.app_level_id, user_permission.app_type_id');
		$this->db->from('user_permission');
		$this->db->join('apps', 'user_permission.app_id = user_permission.app_id', 'right');
		$query = $this->db->get();

		$data['user_permissions'] = $query->result_array();
		$data['departments'] = $this->db->get('departments')->result_array();

		$this->load->view('dashboard/user', $data);
	}

	public function user_create_save()
	{
		//$this->load->view('dashboard/user');
	}
}
