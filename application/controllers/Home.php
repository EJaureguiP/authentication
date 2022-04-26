<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once './vendor/paragonie/sodium_compat/autoload.php';
require_once './vendor/firebase/php-jwt/src/JWT.php';
require_once './vendor/firebase/php-jwt/src/JWK.php';
require_once './vendor/firebase/php-jwt/src/Key.php';

use Firebase\JWT\JWT;
//use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Home extends CI_Controller
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
	public function index()
	{
		if ($this->session->user_email != null &&  $this->session->user_active == 1 &&  $this->session->user_is_admin == 1) {
			redirect('dashboard', 'refresh');
		} else {
			$this->load->view('home');
		}
	}

	public function dashboard()
	{
		$this->load->view('dashboard');
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
		$this->form_validation->set_rules(
			'user_password',
			'Password',
			'required',
			array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('user_name', 'Name', 'required');
		$this->form_validation->set_rules('user_lastname', 'Lastname', 'required');


		$email = $this->input->post('email');
		$domain = $this->input->post('domain');

		$hashed_password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);
		$data['user_password'] = $hashed_password;
		$retype = $this->input->post('retype');
		$data['user_name'] = $this->input->post('user_name');
		$data['user_lastname'] = $this->input->post('user_lastname');
		$data['user_email'] = $email . '@' . $domain;

		$this->form_validation->set_data($data);

		//echo json_encode($data);

		if ($this->form_validation->run() == FALSE) {
			$data['domains'] =	$this->domain->get_entries();
			$this->load->view('register', $data);
		} else {
			$this->user->insert($data);
		}
	}

	public function login()
	{
		//Load model
		$this->load->model('domain');
		$from = $this->input->get('from');
		$data['from'] = $from;
		$data['domains'] =	$this->domain->get_entries();
		//echo json_encode($data);
		$this->load->view('login', $data);
	}


	public function logout()
	{
		$array_items = array('user_email', 'user_name', 'user_lastname', 'user_martech_number', 'user_active', 'user_is_admin');
		$this->session->unset_userdata($array_items);
		redirect('/', 'refresh');
	}

	public function login_enter()
	{
		$this->load->model('domain');
		$this->load->model('user');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user', 'User', 'required');
		$this->form_validation->set_rules('domain', 'Domain', 'required');
		$this->form_validation->set_rules(
			'user_password',
			'Password',
			'required',
			array('required' => 'You must provide a %s.')
		);

		if ($this->form_validation->run() == FALSE) {
			$data['domains'] =	$this->domain->get_entries();
			$this->load->view('login', $data);
		} else {
			//$this->user->insert($data);
			$username = $this->input->post('user') . '@' . $this->input->post('domain');
			$password = $this->input->post('user_password');
			$from = $this->input->post('from');

			$this->db->select('users.*, levels.level_name, levels.level_value');
			$this->db->from('users');
			$this->db->join('levels', 'users.user_level_id = levels.level_id', 'inner');
			$this->db->where('user_email', $username);
			$result = $this->db->get()->result_array();

			if (count($result) == 0) {
				//echo 'user not found';
				$this->load->model('domain');
				$from = $this->input->get('from');
				$data['from'] = $from;
				$data['domains'] =	$this->domain->get_entries();
				$data['error'] =	'The user was not found. Verify your user and password.';
				$this->load->view('login', $data);
				return;
			} else {
				$hashed_password = $result[0]['user_password'];
				//echo $hashed_password;
				if (password_verify($password, $hashed_password)) {

					$data = $result[0];

					$user_date = array(
						'user_email' => $data['user_email'],
						'user_name' => $data['user_name'],
						'user_lastname' => $data['user_lastname'],
						'user_martech_number' => $data['user_martech_number'],
						'user_active' => $data['user_active'],
						'user_is_admin' => $data['user_is_admin'],
					);

					if ($from) {
						$url = $from . '/login?';
						$url .= 'user_email=' . $data['user_email'];
						$url .= '&user_name=' . $data['user_name'];
						$url .= '&user_lastname=' . $data['user_lastname'];
						$url .= '&user_martech_number=' . $data['user_martech_number'];
						$url .= '&user_active=' . $data['user_active'];
						$url .= '&user_is_admin=' . $data['user_is_admin'];
						$url .= '&user_level_name=' . $data['level_name'];
						$url .= '&user_level_value=' . $data['level_value'];
						$url .= '&from=' . $from;
						redirect($url);
					} else {
						$this->session->set_userdata($user_date);
						redirect('/', 'refresh');
					}
				} else {
					$this->load->model('domain');
					$from = $this->input->get('from');
					$data['from'] = $from;
					$data['domains'] =	$this->domain->get_entries();
					$data['error'] =	'Password is incorrect. Verify your password.';
					$this->load->view('login', $data);
					return;
				}
			}
		}
	}
}
