<?php 

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('allmodel');
	}

	public function index()
	{
		$data['title'] = "My Profile";

		date_default_timezone_set('Asia/Jakarta');
		$data['date'] = date('l, d F Y');

		$id_level = $this->session->userdata('id_level');
		$where = [
			'username' => $this->session->userdata('username')
		];
		$data['queryMenu'] = $this->allmodel->queryMenu($id_level);
		$data['queryLevel'] = $this->allmodel->queryLevel($id_level);

		$data['user'] = $this->allmodel->cekSession($where);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = "Edit Profile";

		date_default_timezone_set('Asia/Jakarta');
		$data['date'] = date('l, d F Y');

		$id_level = $this->session->userdata('id_level');
		$where = [
			'username' => $this->session->userdata('username')
		];

		$data['queryMenu'] = $this->allmodel->queryMenu($id_level);
		$data['user'] = $this->allmodel->cekSession($where);

		$this->form_validation->set_rules('name', 'Full name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username');
			$name = $this->input->post('name');

            // Cek apakah ada gambar atau tidak
			$upload_image = $_FILES['image']['name'];

            // Lakukan aksi pada image yang diupload
			if ($upload_image) {
				$config['upload_path'] = './assets/images/img_profile';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

                // Ganti yang ada di dabes
				if ($this->upload->do_upload('image')) {
                    // Kalau bukan default.png maka hapus
					$old_image = $data['user']['image'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/images/img_profile/' . $old_image);
					}
					$new_img = $this->upload->data('file_name');
					$this->db->set('image', $new_img);
				} else {
					$this->uplaod->display_errors();
				}
			}


			$data = $this->allmodel->editUser($name, $username);
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-success" role="alert">  
                    Your data has been changed!
                </div>'
			);
			redirect('user');
		}
	}



	public function change()
	{
		$data['title'] = "Change Password";

		date_default_timezone_set('Asia/Jakarta');
		$data['date'] = date('l, d F Y');

		$id_level = $this->session->userdata('id_level');
		$where = [
			'username' => $this->session->userdata('username')
		];
		$data['queryMenu'] = $this->allmodel->queryMenu($id_level);
		$data['user'] = $this->allmodel->cekSession($where);

		$this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('password', 'New Password', 'required|trim|matches[password2]|max_length[20]|min_length[3]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password]|max_length[20]|min_length[3]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/change', $data);
			$this->load->view('templates/footer');
		} else {
			$currentPassword = $this->input->post('currentPassword');
			$newPassword = $this->input->post('password');
            
            // jika tidak ada didabes
			if (!password_verify($currentPassword, $data['user']['password'])) {
				$this->session->set_flashdata(
					'notif',
					'<div class="alert alert-danger" role="alert">  
                        Not found your password!
                    </div>'
				);
				redirect('user/change');
			} else {
                // cek password baru tidak boleh sama dengan password sebelumnya
				if ($currentPassword == $newPassword) {
					$this->session->set_flashdata(
						'notif',
						'<div class="alert alert-danger" role="alert">  
                            New password must be different from current!
                        </div>'
					);
					redirect('user/change');
				} else {
                    // Masukkan data kedalam database
					$hash_password = password_hash($newPassword, PASSWORD_DEFAULT);
					$username = $data['user']['username'];

					$this->db->set('password', $hash_password);
					$this->db->where('username', $username);
					$this->db->update('tbl_user');

					$this->session->set_flashdata(
						'notif',
						'<div class="alert alert-success" role="alert">  
                            Your password has been changed!
                        </div>'
					);
					redirect('user');
				}
			}
		}
	}

	public function register()
	{
		$data['title'] = "Registration User";

		date_default_timezone_set('Asia/Jakarta');
		$data['date'] = date('l, d F Y');

		$id_level = $this->session->userdata('id_level');
		$where = [
			'username' => $this->session->userdata('username')
		];
		$data['queryMenu'] = $this->allmodel->queryMenu($id_level);
		$data['user'] = $this->allmodel->cekSession($where);
		$data['level'] = $this->allmodel->queryLevels();

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
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/registrasi', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'name_user' => htmlspecialchars($this->input->post('name'), true),
				'username' => strtolower(htmlspecialchars($this->input->post('username'), true)),
				'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)),
				'image' => 'default.png',
				'date_created' => time(),
				'id_level' => $this->input->post('menu_id')
			];

			$this->allmodel->registrasiForm($data);
			$this->session->set_flashdata(
				'notif',
				'<div class="alert alert-success" role="alert">
                    Registration has finished!!
                </div>'
			);
			redirect('user/register');
		}
	}

	public function foodlist()
	{
		$data['title'] = "Food List";

		date_default_timezone_set('Asia/Jakarta');
		$data['date'] = date('l, d F Y');

		$id_level = $this->session->userdata('id_level');
		$where = [
			'username' => $this->session->userdata('username')
		];
		$data['queryMenu'] = $this->allmodel->queryMenu($id_level);
		$data['user'] = $this->allmodel->cekSession($where);

		$data['makanan'] = $this->allmodel->queryFood();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/foodlist', $data);
		$this->load->view('templates/footer');
	}






}


?>
