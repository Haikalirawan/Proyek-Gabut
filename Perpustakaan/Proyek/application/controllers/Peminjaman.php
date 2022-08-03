<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

	public function index()
	{
		// Title
		$data['title'] = 'Total Peminjaman';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');
		
		
		// View Total_buku
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('user/total_peminjam');
		$this->load->view('templates/footer');
	}



	public function tambah_peminjaman()
	{
		// Title
		$data['title'] = 'Peminjaman';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');
		
		// data buku
		$data['buku'] = $this->db->get('tbl_buku')->result_array();
		
		// data siswa
		$data['siswa'] = $this->db->get('tbl_siswa')->result_array();
		

		// Rules for kode peminjaman input
		$this->form_validation->set_rules('kode', 'Kode', 'required|trim|min_length[5]|max_length[50]', [
			'required' => 'Kolom kode buku masih kosong, harap diisi',
			'min_length' => 'kode buku terlalu pendek',
			'max_length' => 'kode buku terlalu panjang'
		]);

		// Rules for tanggal input
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
			'required' => 'Anda belum memilih tanggal, harap pilih'
		]);

		// Rules for judul buku input
		$this->form_validation->set_rules('buku', 'Buku', 'required|trim', [
			'required' => 'Anda belum memilih buku, harap pilih'
		]);

		// Rules for kelas input
		$this->form_validation->set_rules('kelas', 'kelas', 'required|trim|min_length[5]|max_length[50]', [
			'required' => 'Kolom kelas masih kosong, harap diisi',
			'min_length' => 'nama kelas terlalu pendek',
			'max_length' => 'nama kelas terlalu panjang'
		]);

		// Rules for siswa input
		$this->form_validation->set_rules('siswa', 'siswa', 'required|trim', [
			'required' => 'Anda belum memilih siswa, harap pilih'
		]);

		if ($this->form_validation->run() == false) {
			// View Total_peminjaman
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_peminjaman');
			$this->load->view('templates/topbar');
			$this->load->view('user/peminjaman');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_peminjaman' => '',
				'kd_peminjaman' => htmlspecialchars($this->input->post('kode', true)),
				'tgl_pinjam' => htmlspecialchars($this->input->post('tanggal', true)),
				'judul_buku' => htmlspecialchars($this->input->post('buku', true)),
				'kelas' => htmlspecialchars($this->input->post('kelas', true)),
				'nama_peminjaman' => htmlspecialchars($this->input->post('siswa', true))
			];

			$this->db->insert('tbl_peminjaman', $data);
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-success" role="alert"> 
                    Peminjam baru telah ditambah!!
                </div>'
			);
			redirect('Peminjaman');
		}
	}

}
