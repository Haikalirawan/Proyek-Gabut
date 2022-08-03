<?php 

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('allmodel');
    }

    public function index()
    {
        $data['title'] = "Menu Management";

        date_default_timezone_set('Asia/Jakarta');
        $data['date'] = date('l, d F Y');

        $id_level = $this->session->userdata('id_level');
        $where = [
            'username' => $this->session->userdata('username')
        ];
        $data['queryMenu'] = $this->allmodel->queryMenu($id_level);

        $data['user'] = $this->allmodel->cekSession($where);
        $data['nameMenu'] = $this->allmodel->queryNameMenu();

        $this->form_validation->set_rules('menuName', 'Menu Name', 'required|trim|max_length[20]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu' => htmlspecialchars($this->input->post('menuName'))
            ];
            $this->db->insert('tbl_menu', $data);
            $this->session->set_flashdata(
                'notif',
                '<div class="alert alert-success" role="alert"> 
                    New Menu added!!
                </div>'
            );
            redirect('menu');
        }
    }

    public function updateMenu()
    {
        $id = $this->uri->segment(3);
        var_dump($id);
        die();
    }




    public function subMenu()
    {
        $data['title'] = "Sub Menu Management";

        date_default_timezone_set('Asia/Jakarta');
        $data['date'] = date('l, d F Y');

        $id_level = $this->session->userdata('id_level');
        $where = [
            'username' => $this->session->userdata('username')
        ];
        $data['queryMenu'] = $this->allmodel->queryMenu($id_level);
        $data['user'] = $this->allmodel->cekSession($where);
        $data['nameSubMenu'] = $this->allmodel->queryNameSubMenu();
        $data['submenuaccess'] = $this->allmodel->querysubmenuaccess();

        // Your  form validation rules
        $this->form_validation->set_rules('title', 'Submenu Title', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('url', 'Submenu Url', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('icon', 'Submenu icon', 'required|trim|max_length[20]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/subMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_menu' => htmlspecialchars($this->input->post('id_menu')),
                'title' => htmlspecialchars($this->input->post('title')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icon' => htmlspecialchars($this->input->post('icon')),
                'is_active' => htmlspecialchars($this->input->post('is_active'))
            ];

            $this->db->insert('tbl_sub_menu', $data);
            $this->session->set_flashdata(
                'notif',
                '<div class="alert alert-success" role="alert"> 
                    New SubMenu added!!
                </div>'
            );
            redirect('menu/subMenu');
        }
    }

}




?>