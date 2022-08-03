<?php 

if (!defined('BASEPATH')) exit('No  direct  script  access allowed');

class allmodel extends CI_Model
{
	public function cekSession($where)
	{
		return $this->db->get_where('tbl_user', $where)->row_array();

	}

	public function queryLevel($id_level)
	{
		return $this->db->get_where('tbl_level', ['id_level' => $id_level])->row_array();
	}

	public function queryMenu($id_level)
	{
		$this->db->select('tbl_menu.id, menu');
		$this->db->from('tbl_menu');
		$this->db->join('tbl_access_menu', 'tbl_menu.id = tbl_access_menu.menu_id', 'inner');
		$this->db->order_by('tbl_access_menu.menu_id', 'ASC');
		$this->db->where(['tbl_access_menu.level_id' => $id_level]);
		return $this->db->get()->result_array();
	}

	public function querySubMenu($menuId)
	{
		return $this->db->get_where('tbl_sub_menu', ['id_menu' => $menuId, 'is_active' => 1])->result_array();
	}

	public function editUser($name, $username)
	{
		$this->db->set('name_user', $name);
		$this->db->where('username', $username);
		$this->db->update('tbl_user');
	}


	public function queryNameMenu()
	{
		return $this->db->get('tbl_menu')->result_array();
	}

	public function queryNameSubMenu()
	{

		$this->db->select('tbl_menu.menu, tbl_sub_menu.*');
		$this->db->from('tbl_sub_menu');
		$this->db->join('tbl_menu', 'tbl_sub_menu.id_menu = tbl_menu.id', 'inner');
		$this->db->order_by('id_menu', 'ASC');
		return $this->db->get()->result_array();
	}

	public function querysubmenuaccess()
	{
		return $this->db->get('tbl_menu')->result_array();
	}

	public function registrasiForm($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	public function queryLevels()
	{
		return $this->db->get('tbl_level')->result_array();
	}

	public function queryFood()
	{
		return $this->db->get('tbl_masakan')->result_array();
	}


}

?>
