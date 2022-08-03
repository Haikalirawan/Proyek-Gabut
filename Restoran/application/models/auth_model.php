<?php 
if (!defined('BASEPATH')) exit('No  direct  script  access allowed');

class auth_model extends CI_Model
{
	public function cekUserLogin($where)
	{
		return $this->db->get_where('tbl_user', $where)->row_array();
	}

	public function registrasiForm($data)
	{
		$this->db->insert('tbl_user', $data);
	}

}

?>