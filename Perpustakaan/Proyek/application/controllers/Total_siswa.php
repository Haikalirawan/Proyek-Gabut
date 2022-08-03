<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Total_siswa extends CI_Controller
{

	public function index()
	{
		// Title
		$data['title'] = 'Total siswa';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');
		
		
		// View Total_siswa
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('user/total_siswa');
		$this->load->view('templates/footer');
	}




	public function tambah_data()
	{
		// Title
		$data['title'] = 'Tambah data';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');

		// data jurusan
		$data['jurusan'] = $this->db->get('tbl_jurusan')->result_array();
		


		// Rules for kode siswa input
		$this->form_validation->set_rules('kode', 'Kode', 'required|trim|min_length[5]|max_length[50]', [
			'required' => 'Kolom kode siswa masih kosong, harap diisi',
			'min_length' => 'kode siswa terlalu pendek',
			'max_length' => 'kode siswa terlalu panjang'
		]);

		// Rules for nama siswa input
		$this->form_validation->set_rules('name', 'Nama Siswa', 'required|trim|min_length[5]|max_length[120]', [
			'required' => 'Kolom nama siswa masih kosong, harap diisi',
			'min_length' => 'nama siswa terlalu pendek',
			'max_length' => 'nama siswa terlalu panjang'
		]);

		// Rules for jenis kelamin input
		$this->form_validation->set_rules('jenis', 'Jenis kelamin', 'required|trim', [
			'required' => 'Anda belum memilih jenis kelamin, harap pilih'
		]);

		// Rules for kelas input
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
			'required' => 'Anda belum memilih Kelas, harap pilih'
		]);

		// Rules for jurusan input
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
			'required' => 'Anda belum memilih Jurusan, harap pilih'
		]);


		if ($this->form_validation->run() == false) {
			// View Total_siswa
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_siswa');
			$this->load->view('templates/topbar');
			$this->load->view('user/tambah_data', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_siswa' => '',
				'kd_siswa' => htmlspecialchars($this->input->post('kode', true)),
				'nama_siswa' => htmlspecialchars($this->input->post('name', true)),
				'jk_siswa' => htmlspecialchars($this->input->post('jenis', true)),
				'kelas' => htmlspecialchars($this->input->post('kelas', true)),
				'jurusan' => htmlspecialchars($this->input->post('jurusan', true))
			];

			$this->db->insert('tbl_siswa', $data);
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-success" role="alert"> 
                    Siswa baru telah ditambah!!
                </div>'
			);
			redirect('Total_siswa');

		}
	}

}
