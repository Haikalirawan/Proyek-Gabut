<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{

	public function index()
	{
		// Title
		$data['title'] = 'Total Pengembalian';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');
		
		
		// View Total_Pengembalian
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('user/total_pengembalian');
		$this->load->view('templates/footer');
	}

}
