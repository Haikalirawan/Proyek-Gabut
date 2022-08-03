<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[5]|max_length[25]', [
			'required' => 'The Name column is still empty',
			'min_length' => 'Name is too short',
			'max_length' => 'Name is too long'
		]);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[25]', [
			'required' => 'The Username column is still empty',
			'min_length' => 'Username is too short',
			'max_length' => 'Username is too long'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[20]', [
			'required' => 'The Password column is still empty',
			'min_length' => 'Password is too short',
			'max_length' => 'Password is too long'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('system/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}


	private function _login()
	{

		$name = htmlspecialchars($this->input->post('name'), true);
		$username = strtolower(htmlspecialchars($this->input->post('username'), true));
		$password = htmlspecialchars($this->input->post('password'));
		$where = [
			'name_user' => $name,
			'username' => $username
		];

		$user = $this->auth_model->cekUserLogin($where);

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'name_user' => $user['name_user'],
					'id_level' => $user['id_level']
				];
				$this->session->set_userdata($data);

				if ($user['id_level'] == 1) {
					redirect('Administrator');
				} elseif ($user['id_level'] == 2) {
					redirect('waiter');
				} elseif ($user['id_level'] == 3) {
					redirect('kasir');
				} elseif ($user['id_level'] == 4) {
					redirect('owner');
				} else {
					redirect('pelanggan');
				}
			} else {
				$this->session->set_flashdata(
					'notif',
					'<div class="alert alert-danger" role="alert">  
                        Your password is incorrect!
                    </div>'
				);
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-danger" role="alert">
                        Your username were not found!
                    </div>'
			);
			redirect('auth');
		}
	}


	public function registrasi()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[5]|max_length[25]', [
			'required' => 'The Name column is still empty',
			'min_length' => 'Name is too short',
			'max_length' => 'Name is too long'
		]);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[25]|is_unique[tbl_user.username]', [
			'required' => 'The Username column is still empty',
			'is_unique' => 'Username already exists',
			'min_length' => 'Username is too short',
			'max_length' => 'Username is too long'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[20]|matches[password2]', [
			'required' => 'The Password column is still empty',
			'min_length' => 'Password is too short',
			'max_length' => 'Password is too long',
			'matches' => 'Confirm password doesnt match'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|max_length[20]|matches[password]', [
			'required' => 'The Password column is still empty',
			'min_length' => 'Password is too short',
			'max_length' => 'Password is too long',
			'matches' => 'Confirm password doesnt match'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('system/registrasi');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name_user' => htmlspecialchars($this->input->post('name'), true),
				'username' => strtolower(htmlspecialchars($this->input->post('username'), true)),
				'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)),
				'image' => 'default.png',
				'date_created' => time(),
				'id_level' => 5
			];

			$this->auth_model->registrasiForm($data);
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-success" role="alert">
                    Registration has finished, Please login!!
                </div>'
			);
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('name_user');
		$this->session->unset_userdata('id_level');

		$this->session->set_flashdata(
			'notif',
			'<div class="alert alert-success" role="alert">
                You has been Logout!!
            </div>'
		);
		redirect('auth');
	}
}
