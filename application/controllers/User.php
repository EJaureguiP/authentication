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
		$this->db->select('users.*, departments.department_name');
		$this->db->from('users');
		$this->db->join('departments', 'users.user_department_id = departments.department_id', 'inner');
		$data['users'] = $this->db->get()->result();

		$this->db->select('*');
		$this->db->from('departments');
		$this->db->order_by('department_name', 'ASC');
		$query = $this->db->get();
		$data['departments'] = $query->result();


		$this->db->select('*');
		$this->db->from('plants');
		//$this->db->order_by('department_name', 'ASC');
		$query = $this->db->get();
		$data['plants'] = $query->result();


		$this->db->select('*');
		$this->db->from('shifts');
		//$this->db->order_by('shift_name', 'ASC');
		$query = $this->db->get();
		$data['shifts'] = $query->result();

		echo json_encode($data);
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


	public function save()
	{

		$user_id = $this->input->post('user_id');

		$data = array(
			'user_email' => $this->input->post('user_email'),
			'user_password' => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
			'user_name' => $this->input->post('user_name'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_martech_number' => intval($this->input->post('user_martech_number')),
			'user_phone' => $this->input->post('user_phone'),
			'user_active' => intval($this->input->post('user_active')),
			'user_department_id' => intval($this->input->post('user_department_id')),
			'user_is_admin' => intval($this->input->post('user_is_admin')),
			'user_level_id' => intval($this->input->post('user_level_id')),
		);

		$plant_id = $this->input->post('user_plant_id');
		if ($plant_id != null) $data['user_plant_id'] = intval($plant_id);

		$shift_id = $this->input->post('user_shift_id');
		if ($shift_id != null)  $data['user_shift_id'] = intval($shift_id);


		if ($user_id == '') {
			//enter
			$response['data'] = $data;


			$email = $this->input->post('user_email');

			$this->db->select('user_email');
			$this->db->where('user_email', $email);
			$query = $this->db->get('users');
			$num = $query->num_rows();

			if ($num > 0) {
				$response['result'] = 'fail';
				$response['error'] = 'There is already an Email';
			} else 
			if ($this->db->insert('users', $data)) {
				$response['result'] = 'ok';
			} else {
				$response['result'] = 'fail';
				$response['error'] = $this->db->error();
			}
		} else {
			//update
			$response['data'] = $data;
			$this->db->where('user_id', $this->input->post('user_id'));

			if ($this->db->update('users', $data)) {
				$response['result'] = 'ok';
			} else {
				$response['result'] = 'fail';
				$response['error'] = $this->db->error();
			}
		}
		echo json_encode($response);
	}


	public function delete()
	{
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->delete('users');
		$response['result'] = 'ok';
		echo json_encode($response);
	}


	public function get_departments()
	{

		$this->db->select('*');
		$this->db->from('departments');

		$query = $this->db->get();
		$data = $query->result_array();

		echo json_encode($data);
	}


	public function get_domains()
	{

		$this->db->select('*');
		$this->db->from('domains');

		$query = $this->db->get();
		$data = $query->result_array();

		echo json_encode($data);
	}


	public function get_user()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id', $this->input->get('user_id'));

		$query = $this->db->get();
		$data = $query->result_array();

		echo json_encode($data);
	}


	public function get_user_data()
	{
		$this->db->select('*');
		$this->db->from('departments');
		$query = $this->db->get();
		$data['departments'] = $query->result_array();


		$this->db->select('*');
		$this->db->from('domains');
		$query = $this->db->get();
		$data['domains'] = $query->result_array();

		$this->db->select('*');
		$this->db->from('levels');
		$query = $this->db->get();
		$data['levels'] = $query->result_array();


		$this->db->select('*');
		$this->db->from('plants');
		$query = $this->db->get();
		$data['plants'] = $query->result_array();

		$this->db->select('*');
		$this->db->from('shifts');
		$query = $this->db->get();
		$data['shifts'] = $query->result_array();


		echo json_encode($data);
	}


	public function get_users_data()
	{
		//bring all data fr
		$department_name = $this->input->get('department_name');
		$level_name = $this->input->get('level_name');

		//$this->db->select('*');
		$this->db->select('users.user_id, users.user_email, users.user_name, users.user_lastname, users.user_martech_number ,users.user_active, users.user_level_id, levels.level_name, users.user_department_id, departments.department_name');
		$this->db->from('users');
		$this->db->join('departments', 'users.user_department_id = departments.department_id', 'inner');
		$this->db->join('levels', 'users.user_level_id = levels.level_id', 'inner');

		if ($department_name != null)
			$this->db->where('departments.department_name', $department_name);

		if ($level_name != null)
			$this->db->where('levels.level_name', $level_name);

		$query = $this->db->get();
		$data['users'] = $query->result_array();
		echo json_encode($data);
	}





	public function get_levels()
	{
		$this->db->select('*');
		$this->db->from('levels');
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
