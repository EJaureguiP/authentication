<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller
{

	public function index()
	{
		if ($this->session->user_email == null) {
			redirect('permission_denied', 'refresh');
		}
		$data['user_level'] = array(
			'user_level_id' => $this->session->user_level_id,
			'user_level_name' => $this->session->user_level_name,
			'user_level_value' => $this->session->user_level_value,
		);

		/*if (true) {
			echo json_encode($data);
			return;
		}*/

		$this->load->view('dashboard/dashboard', $data);
	}

	public function apps()
	{
		if ($this->session->user_email == null) {
			redirect('permission_denied', 'refresh');
		}

		$data['apps'] = $this->db->get('apps')->result_array();
		$this->load->view('dashboard/apps', $data);
	}


	public function permissions()
	{
		if ($this->session->user_email == null  ||  $this->session->user_is_admin == 0) {
			redirect('permission_denied', 'refresh');
		}

		$data['apps'] = $this->db->get('apps')->result_array();
		$this->load->view('dashboard/permissions', $data);
	}



	public function levels()
	{
		if ($this->session->user_email == null  ||  $this->session->user_is_admin == 0) {
			redirect('permission_denied', 'refresh');
		}

		$data['levels'] = $this->db->get('levels')->result_array();
		$this->load->view('dashboard/levels', $data);
	}


	public function types()
	{
		if ($this->session->user_email == null) {
			redirect('permission_denied', 'refresh');
		}

		$data['types'] = $this->db->get('types')->result_array();
		$this->load->view('dashboard/types', $data);
	}


	public function users()
	{

		if (!($this->session->user_level_value >= 2 ||  $this->session->user_is_admin == 1) || $this->session->user_email == null) {
			redirect('permission_denied', 'refresh');
		}

		/*
		if ($this->session->user_is_admin == 1) {
			//bring all data
			$data['users'] = $this->db->get('users')->result_array();
		} else {

			$this->db->select('user_department_id, departments.department_name, user_plant_id, plants.plant_value, user_shift_id');
			$this->db->from('users');
			$this->db->join('plants', 'users.user_plant_id = plants.plant_id', 'inner');
			$this->db->join('departments', 'users.user_department_id = departments.department_id', 'inner');
			$this->db->where('user_id', $this->session->user_id);
			$user = $this->db->get()->result_array()[0];

			$data['user'] = $user;
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_department_id', $user['user_department_id']);
			$this->db->where('user_plant_id', $user['plant_value']);
			$this->db->where('user_shift_id', $user['user_shift_id']);
			$data['users'] = $this->db->get()->result_array();
		}
		*/

		//echo json_encode($data);
		$this->load->view('dashboard/users');
	}

	public function user_create()
	{
		$this->load->view('dashboard/user');
	}

	public function user_update()
	{
		$data['user_id'] = $this->input->get('user_id');
		$this->load->view('dashboard/user', $data);
	}

	public function user_update_password()
	{
		$data['user_id'] = $this->input->get('user_id');
		$this->load->view('dashboard/user_password', $data);
	}



	public function user_update_profile()
	{

		$data['user_id'] = $this->input->get('user_id');
		$this->load->view('dashboard/user_profile', $data);
	}

	public function user_create_save()
	{
		//$this->load->view('dashboard/user');
	}
}
