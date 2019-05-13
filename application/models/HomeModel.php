<?php

class HomeModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->db->order_by('id', 'DESC');
	}

	public function set_buku($id = FALSE)
	{
		if ($id == FALSE)
		{	
			$query = $this->db->get('buku')->result_array();
			return $query;
		} else {
			$query = $this->db->get_where('buku', ['id' => $id])->row_array();
			return $query;
		}
	}

	public function cari_buku()
	{
		$input = $this->input->get('cari');
		$this->db->order_by('id', 'DESC');
		$this->db->like('judul', $input);
		return $this->db->get('buku')->result_array();
	}
}