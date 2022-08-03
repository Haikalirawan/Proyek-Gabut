<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_ketua extends CI_Controller
{
	public function index()
	{
		// Title
		$data['title'] = 'Dashboard Admin';

		// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');


		// View dash_ketua
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_dash');
		$this->load->view('templates/topbar');
		$this->load->view('ketua/dash_ketua');
		$this->load->view('templates/footer');
	}

	public function identitas()
	{
			// Title
		$data['title'] = 'Identitas siswa';

			// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');


			// View identitas
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_identitas');
		$this->load->view('templates/topbar');
		$this->load->view('ketua/identitas');
		$this->load->view('templates/footer');
	}



	public function TambahKaryawan()
	{
			// Title
		$data['title'] = 'Tambah Karyawan';

			// session from login
		$data['username'] = $this->session->userdata('username');
		$data['jabatan'] = $this->session->userdata('jabatan');

		// Rules for kode NIP input
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|min_length[5]|max_length[50]', [
			'required' => 'Kolom NIP masih kosong, harap diisi',
			'min_length' => 'NIP terlalu pendek',
			'max_length' => 'NIP terlalu panjang'
		]);

		// Rules for nama Petugas input
		$this->form_validation->set_rules('nama', 'Nama Petugas', 'required|trim|min_length[5]|max_length[120]', [
			'required' => 'Kolom nama petugas masih kosong, harap diisi',
			'min_length' => 'nama petugas terlalu pendek',
			'max_length' => 'nama petugas terlalu panjang'
		]);

		// Rules for jenis kelamin input
		$this->form_validation->set_rules('jenis', 'Jenis kelamin', 'required|trim', [
			'required' => 'Anda belum memilih jenis kelamin, harap pilih'
		]);

		// Rules for Jabatan input
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Anda belum memilih Jabatan, harap pilih'
		]);

		// Rules for password input
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[120]', [
			'required' => 'Kolom password masih kosong, harap diisi',
			'min_length' => 'password terlalu pendek',
			'max_length' => 'password terlalu panjang'
		]);



		if ($this->form_validation->run() == false) {
			// View Total_karyawan
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_karyawan');
			$this->load->view('templates/topbar');
			$this->load->view('ketua/karyawan');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id_petugas' => '',
				'nip' => htmlspecialchars($this->input->post('nip', true)),
				'nama_petugas' => htmlspecialchars($this->input->post('nama', true)),
				'jk_petugas' => htmlspecialchars($this->input->post('jenis', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT))
			];

			$this->db->insert('tbl_petugas', $data);
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-success" role="alert"> 
                    Karyawan baru telah ditambah!!
                </div>'
			);

			// Arahin sesuai yang diinginkan
			redirect('Dash_ketua/TambahKaryawan');

		}
	}
}
