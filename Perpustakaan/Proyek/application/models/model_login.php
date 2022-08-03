<?php 

class model_login extends CI_Model
{
	public function cekUser($where)
	{
		return $this->db->get_where('tbl_petugas', $where)->row_array();
	}

}




?>
