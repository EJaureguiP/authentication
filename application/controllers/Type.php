<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

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
	/*public function index()
	{
		$this->load->view('application');
	}*/


	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('types');
		echo json_encode($this->db->get()->result());
	}


	public function create()
	{
		//echo json_encode($this->input->post() );
		$data = array(
			'type_name' => $this->input->post('type_name'),
			'type_value' => $this->input->post('type_value'),
		);
		$this->db->insert('types', $data);
		$insert_id = $this->db->insert_id();
		$data['type_id'] = $insert_id;

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}

	public function update()
	{

		$data = array(
			'type_name' => $this->input->post('type_name'),
			'type_value' => $this->input->post('type_value'),
			
		);

		$this->db->where('type_id', $this->input->post('type_id') );
		$this->db->update('types', $data);

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}

	public function delete()
	{
		$this->db->where('type_id', $this->input->post('type_id') );
		$this->db->delete('types');
		$response['result'] = 'ok';
		echo json_encode($response);
	}

}