<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Total_buku extends CI_Controller
{

	public function index()
	{
		// Title
		$data['title'] = 'Total buku';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');
		
		
		// View Total_buku
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('user/total_buku');
		$this->load->view('templates/footer');
	}



	public function tambah_buku()
	{
		// Title
		$data['title'] = 'Tambah buku';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');
		
		// data penerbit
		$data['penerbit'] = $this->db->get('tbl_penerbit')->result_array();

		// data kategori
		$data['kategori'] = $this->db->get('tbl_kategori')->result_array();

		// data rak
		$data['rak'] = $this->db->get('tbl_rak')->result_array();


		// Rules for kode buku input
		$this->form_validation->set_rules('kode', 'Kode', 'required|trim|min_length[5]|max_length[50]', [
			'required' => 'Kolom kode buku masih kosong, harap diisi',
			'min_length' => 'kode buku terlalu pendek',
			'max_length' => 'kode buku terlalu panjang'
		]);

		// Rules for judul buku input
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim|min_length[5]|max_length[100]', [
			'required' => 'Kolom judul buku masih kosong, harap diisi',
			'min_length' => 'judul buku terlalu pendek',
			'max_length' => 'judul buku terlalu panjang'
		]);

		// Rules for nama penerbit input
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim|min_length[5]|max_length[50]', [
			'required' => 'Kolom nama penerbit masih kosong, harap diisi',
			'min_length' => 'nama penerbit terlalu pendek',
			'max_length' => 'nama penerbit terlalu panjang'
		]);
		
		// Rules for tahun input
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', [
			'required' => 'Anda belum memilih tahun, harap pilih'
		]);

		// Rules for kategori input
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim', [
			'required' => 'Anda belum memilih kategori, harap pilih'
		]);

		// Rules for rak input
		$this->form_validation->set_rules('rak', 'Rak', 'required|trim', [
			'required' => 'Anda belum memilih rak, harap pilih'
		]);

		if ($this->form_validation->run() == false) {
		// View Total_buku
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_buku');
			$this->load->view('templates/topbar');
			$this->load->view('user/tambah_buku');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_buku' => '',
				'kd_buku' => htmlspecialchars($this->input->post('kode', true)),
				'judul_buku' => htmlspecialchars($this->input->post('judul', true)),
				'nama_penerbit' => htmlspecialchars($this->input->post('penerbit', true)),
				'tahun_terbit' => htmlspecialchars($this->input->post('tahun', true)),
				'katagori' => htmlspecialchars($this->input->post('kategori', true)),
				'rak' => htmlspecialchars($this->input->post('rak', true))
			];

			$this->db->insert('tbl_buku', $data);
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-success" role="alert"> 
                    Buku baru telah ditambah!!
                </div>'
			);
			redirect('Total_buku');
		}
	}

}
