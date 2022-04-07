<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once './vendor/paragonie/sodium_compat/autoload.php';
require_once './vendor/firebase/php-jwt/src/JWT.php';
require_once './vendor/firebase/php-jwt/src/JWK.php';
require_once './vendor/firebase/php-jwt/src/Key.php';

use Firebase\JWT\JWT;
//use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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

		$hashed_password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);
		$data['user_password'] = $hashed_password;
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

	public function login()
	{
		//Load model
		$this->load->model('domain');
		$data['domains'] =	$this->domain->get_entries();	
		//echo json_encode($data);
		$this->load->view('login', $data);
	}


	public function login_enter()
	{
		$this->load->model('domain');
		$this->load->model('user');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user', 'User', 'required');
		$this->form_validation->set_rules('domain', 'Domain', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required',
				array('required' => 'You must provide a %s.')
		);
				
		if ($this->form_validation->run() == FALSE)
        {
			$data['domains'] =	$this->domain->get_entries();	
        	$this->load->view('login', $data);
        } else
		{
			//$this->user->insert($data);
			$username = $this->input->post('user') . '@' . $this->input->post('domain');
			$password = $this->input->post('user_password');

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_email', $username);
			$result = $this->db->get()->result_array();

			if(count($result) == 0)
			{
				echo 'user not found';
				return;
			} else
			{
				$hashed_password = $result[0]['user_password'];
				//echo $hashed_password;
				if(password_verify($password, $hashed_password)) {
					//SUCCESS
					$issued_at = new DateTime();
					$issued = $issued_at->getTimestamp();
					$expire = $issued_at->modify('+1 day')->getTimestamp();
		
					//use JWT with JWT_KEY
					$authentication = array(
						"iat" => $issued,
						'exp'  => $expire,
						'user'  => $username,
					);
					
					/**
					 * IMPORTANT:
					 * You must specify supported algorithms for your application. See
					 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
					 * for a list of spec-compliant algorithms.
					 */
					$jwt = JWT::encode($authentication, JWT_KEY, 'HS256');
					$decoded = JWT::decode($jwt, new Key(JWT_KEY, 'HS256'));
					
					echo json_encode($decoded);	
				} else
				{
					echo 'Password is incorrect';
					return;
				}
			}


		}

	}


}
