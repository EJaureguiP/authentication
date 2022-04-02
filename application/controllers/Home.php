<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
	}


	public function register()
	{
		//Load model
		$this->load->model('domain');
		$data['domains'] =	$this->domain->get_entries();	
		//echo json_encode($data);
		$this->load->view('register', $data);
	}

	public function register_save()
	{
		$this->load->model('user');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_email', 'Email', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required',
				array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('user_name', 'Name', 'required');
		$this->form_validation->set_rules('user_lastname', 'Lastname', 'required');


		$email = $this->input->post('email');
		$domain = $this->input->post('domain');
		$data['user_password'] = $this->input->post('user_password');
		$retype = $this->input->post('retype');
		$data['user_name'] = $this->input->post('user_name');
		$data['user_lastname'] = $this->input->post('user_lastname');
		$data['user_email'] = $email . '@' . $domain;
		
		$this->form_validation->set_data($data);

		//echo json_encode($data);

		if ($this->form_validation->run() == FALSE)
        {
			$data['domains'] =	$this->domain->get_entries();	
        	$this->load->view('register', $data);
        } else
		{
			$this->user->insert($data);
		}

		

	}
}
