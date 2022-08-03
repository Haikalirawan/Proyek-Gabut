<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('allmodel');
	}

	public function index()
	{
		// Data identitas yang wajib ada ditiap class
		$data['title'] = "Dashboard";
		date_default_timezone_set('Asia/Jakarta');
		$data['date'] = date('l, d F Y');

		$id_level = $this->session->userdata('id_level');
		$where = [
			'username' => $this->session->userdata('username')
		];
		$data['queryMenu'] = $this->allmodel->queryMenu($id_level);
			// // $menuId = $data['queryMenu']['id'];
			// // $data['querySubMenu'] = $this->allmodel->querySubMenu($menuId);

			// // var_dump($menuId);
			// // die();
		$data['user'] = $this->allmodel->cekSession($where);
		// Akhir Data identitas


		// Tampilan untuk User
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
		// Akhir tampilan
	}


	public function role()
	{
		// Data identitas yang wajib ada ditiap class
		$data['title'] = 'Role';
		date_default_timezone_set('Asia/Jakarta');
		$data['date'] = date('l, d F Y');

		$id_level = $this->session->userdata('id_level');
		$where = ['username' => $this->session->userdata('username')];

		$data['queryMenu'] = $this->allmodel->queryMenu($id_level);
		$data['user'] = $this->allmodel->cekSession($where);
		$data['role'] = $this->allmodel->queryLevels();
		// Akhir Data identitas


		// Tampilan untuk User
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
		// Akhir tampilan user
	}

}


?>
