<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {

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
		$this->load->view('application');
	}


	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('apps');
		echo json_encode($this->db->get()->result());
	}


	public function create()
	{
		//echo json_encode($this->input->post() );
		$data = array(
			'app_name' => $this->input->post('app_name'),
			'app_identifier' => $this->input->post('app_identifier'),
			'app_site_url' => $this->input->post('app_site_url'),
			'app_image_url' => $this->input->post('app_image_url'),
		);
		$this->db->insert('apps', $data);
		$insert_id = $this->db->insert_id();
		$data['app_id'] = $insert_id;

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}

	public function update()
	{

		$data = array(
			'app_name' => $this->input->post('app_name'),
			'app_identifier' => $this->input->post('app_identifier'),
			'app_site_url' => $this->input->post('app_site_url'),
			'app_image_url' => $this->input->post('app_image_url'),
		);

		$this->db->where('app_id', $this->input->post('app_id') );
		$this->db->update('apps', $data);

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}

	public function delete()
	{
		$this->db->where('app_id', $this->input->post('app_id') );
		$this->db->delete('apps');
		$response['result'] = 'ok';
		echo json_encode($response);
	}

}