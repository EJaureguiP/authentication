<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

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
		$this->db->from('users');
		echo json_encode($this->db->get()->result());
	}


	public function create()
	{
		//echo json_encode($this->input->post() );
		$data = array(
			'level_name' => $this->input->post('level_name'),
			'level_value' => $this->input->post('level_value'),
		);
		$this->db->insert('levels', $data);
		$insert_id = $this->db->insert_id();
		$data['level_id'] = $insert_id;

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}

	public function update()
	{

		$data = array(
			'level_name' => $this->input->post('level_name'),
			'level_value' => $this->input->post('level_value'),

		);

		$this->db->where('level_id', $this->input->post('level_id'));
		$this->db->update('levels', $data);

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}

	public function delete()
	{
		$this->db->where('level_id', $this->input->post('level_id'));
		$this->db->delete('levels');
		$response['result'] = 'ok';
		echo json_encode($response);
	}


	public function get_permissions()
	{
		$user_id = $this->input->get('user_id');
		$app_id = $this->input->get('app_id');

		$this->db->select('user_permission.user_permission_id, user_permission.user_id, user_permission.app_id, apps.app_name, user_permission.app_level_id, user_permission.app_type_id');
		$this->db->from('user_permission');
		$this->db->join('apps', 'user_permission.app_id = user_permission.app_id', 'right');

		if (isset($user_id) && isset($app_id)) {
			$this->db->where('user_id', $user_id);
			$this->db->where('app_id', $app_id);
		}

		$query = $this->db->get();
		$data = $query->result_array();

		echo json_encode($data);
	}


	public function get_apps_levels()
	{
		//$app_id = $this->input->get('app_id');

		$this->db->select('apps_levels.*, levels.level_name, levels.level_value');
		$this->db->from('apps_levels');
		$this->db->join('levels', 'apps_levels.level_id = levels.level_id', 'inner');
		//$this->db->where('apps_levels.app_id', $app_id);
		$query = $this->db->get();
		$data = $query->result_array();
		echo json_encode($data);
	}

	public function get_apps_types()
	{
		//$app_id = $this->input->get('app_id');

		$this->db->select('apps_types.*, types.type_name, types.type_value');
		$this->db->from('apps_types');
		$this->db->join('types', 'apps_types.type_id = types.type_id', 'inner');
		//$this->db->where('apps_types.app_id', $app_id);
		$query = $this->db->get();
		$data = $query->result_array();
		echo json_encode($data);
	}
}
