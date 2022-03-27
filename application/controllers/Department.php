<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index()
	{
		$this->load->view('departments/departments', $this->getDepartments());
	}

	public function getDepartments()
	{
		$query = $this->db->get('departments');
		$data['departments'] = $query->result_array();
		return $data;
	}


	public function show($department_id)
	{
		$this->db->select('*');
		$this->db->from('departments');
		$this->db->where('department_id', $department_id );	
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
		}
	

		$data['action'] = 'show';
		$data['department'] = $row;

		$this->load->view('departments/create', $data);
	}


	public function create()
	{
		$this->load->view('departments/create');
	}


	public function insert()
	{
		$this->form_validation->set_rules('department_name', 'Department', 'required|is_unique[departments.department_name]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data = ['has_errors' => TRUE];
			$this->load->view('departments/create', $data);
		}
		else
		{
			$department_name = $this->input->post('department_name');

			$now = new DateTime();
			$now = $now->format(DATETIME_FORMAT);

			$data = ['department_name'=>$department_name, 'created_at' => $now, 'updated_at' => $now];
			$this->db->insert('departments',$data);

			$data = $this->getDepartments();
			$data['success'] = 'The deparment ' . $department_name . ' was inserted';
			$this->load->view('departments/departments', $data);
		}

	}


	public function edit($department_id)
	{
		$data['action'] = 'edit';
		$data['department'] = $this->getDepartment($department_id);
		$this->load->view('departments/create', $data);
	}

	public function getDepartment($department_id)
	{
		$this->db->select('*');
		$this->db->from('departments');
		$this->db->where('department_id', $department_id );	
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
		{
			$row = $query->row_array();
		}
		return $row;
	}

	public function update()
	{
		$this->form_validation->set_rules('department_name', 'Department', 'required|is_unique[departments.department_name]');
		$this->form_validation->set_rules('department_id', 'Department Id', 'required');

		$department_name = $this->input->post('department_name');
		$department_id = $this->input->post('department_id');

		if ($this->form_validation->run() == FALSE)
		{
			$data['action'] = 'edit';
			$data['department'] = $this->getDepartment($department_id);
			$data = ['has_errors' => TRUE];		
			$this->load->view('departments/create', $data);
		}
		else
		{
		
			$now = new DateTime();
			$now = $now->format(DATETIME_FORMAT);

			$data = ['department_name'=>$department_name, 'updated_at' => $now];
			$this->db->where('department_id', $department_id);
			$this->db->update('departments', $data);
	
			$data = $this->getDepartments();
			$data['success'] = 'The deparment ' . $department_name . ' was updated';
			$this->load->view('departments/departments', $data);
		}
	}


	public function delete()
	{
		//$this->form_validation->set_rules('department_name', 'Department', 'required|is_unique[departments.department_name]');
		$this->form_validation->set_rules('department_id', 'Department Id', 'required');

		//$department_name = $this->input->post('department_name');
		$department_id = $this->input->post('department_id');

		if ($this->form_validation->run() == FALSE)
		{
			$data = ['has_errors' => TRUE];		
			$this->load->view('departments/departments', $data);
		}
		else
		{
		
			$this->db->where('department_id', $department_id);
			$this->db->delete('departments');
			$data = $this->getDepartments();

			$data['success'] = 'The deparment was deleted';
			$this->load->view('departments/departments', $data);
		}
	}


}