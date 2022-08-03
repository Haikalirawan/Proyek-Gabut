<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
	// Please dont do anything stupid
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
	}
	// Please dont do anything stupid


	public function index()
	{
		// Rules for Username input
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[50]', [
			'required' => 'Kolom username masih kosong, harap diisi',
			'min_length' => 'Username terlalu pendek',
			'max_length' => 'Username terlalu panjang'
		]);

		// Rules for Password input
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[120]', [
			'required' => 'Kolom password masih kosong, harap diisi',
			'min_length' => 'Password terlalu pendek',
			'max_length' => 'Password terlalu panjang'
		]);

		// Execution
		if ($this->form_validation->run() == false) {
			$this->load->view('login/masuk');
		} else {
			$this->_login();
		}

	}

	private function _login()
	{
		// input from user
		$username = htmlspecialchars(strtolower($this->input->post('username', true)));
		$password = htmlspecialchars($this->input->post('password', true));
		
		// comparison data
		$where = [
			'nama_petugas' => $username
		];

		// comparison data to database
		$user = $this->model_login->cekUser($where);

		// execution for username
		if ($user) {
			// execution for password
			if ($password == $user['password']) {
				
				// data from database
				$data = [
					'username' => $user['nama_petugas'],
					'jabatan' => $user['jabatan']
				];
				// session user data
				$this->session->set_userdata($data);

				// Where user go?
				if ($user['jabatan'] == 'ketua') {
					redirect('Dash_ketua');
				} else {
					redirect('Dash_karyawan');
				}
			} 
			// execution for password failed
			else {
				// make alert about password
				$this->session->set_flashdata(
					'notif',
					'<div class="alert alert-danger" role="alert">  
						Password anda salah!
					</div>'
				);

				// go back
				redirect('masuk');
			}
		} 
		// execution for username failed
		else {
			// make alert about username
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-danger" role="alert">  
					Username tidak ditemukan!
				</div>'
			);

			// go back
			redirect('masuk');
		}

	}


}
