<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller
{

	public function index()
	{
		if ($this->session->user_email == null) {
			redirect('permission_denied', 'refresh');
		}

		$this->load->view('dashboard/dashboard');
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
		if ($this->session->user_email == null ||  $this->session->user_is_admin == 0) {
			redirect('permission_denied', 'refresh');
		}

		$data['users'] = $this->db->get('users')->result_array();
		$this->load->view('dashboard/users', $data);
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
