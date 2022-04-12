<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LevelsTypesApplications extends CI_Controller {




	public function get_app_levels()
	{
		$this->db->select('apps_levels.*, levels.level_name, levels.level_value');
		$this->db->from('apps_levels');
		$this->db->join('levels', 'apps_levels.level_id = levels.level_id');
		echo json_encode($this->db->get()->result());
	}

	public function get_app_types()
	{
		$this->db->select('apps_types.*, types.type_name, ty[es.type_value');
		$this->db->from('apps_types');
		$this->db->join('types', 'apps_types.type_id = types.type_id');
		echo json_encode($this->db->get()->result());
	}


	public function add_app_level()
	{
		$data = array(
			'app_id' => $this->input->post('app_id'),
			'level_id' => $this->input->post('level_id'),
		);
		$this->db->insert('apps_levels', $data);
		$insert_id = $this->db->insert_id();
		$data['app_level_id'] = $insert_id;

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}


	public function remove_app_level()
	{
		$this->db->where('app_id', $this->input->post('app_id') );
		$this->db->where('level_id', $this->input->post('level_id') );
		$this->db->delete('apps_levels');
		$response['result'] = 'ok';
		echo json_encode($response);

	}
	public function add_app_type()
	{
		$data = array(
			'app_id' => $this->input->post('app_id'),
			'type_id' => $this->input->post('type_id'),
		);
		$this->db->insert('apps_types', $data);
		$insert_id = $this->db->insert_id();
		$data['app_type_id'] = $insert_id;

		$response['result'] = 'ok';
		$response['data'] = $data;
		echo json_encode($response);
	}


	public function remove_app_type()
	{
		$this->db->where('app_id', $this->input->post('app_id') );
		$this->db->where('type_id', $this->input->post('type_id') );
		$this->db->delete('apps_types');
		$response['result'] = 'ok';
		echo json_encode($response);
	}







}