<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ujian extends CI_Model {

	private $refid = 'refid';

	function get_refid($refid) {
		$sql = $this->db->query("SELECT refid FROM registrasi_baru where refid='$refid'");
		$this->db->limit(1);
		
		$cek_refid = $sql->num_rows();

		if ($cek_refid > 0) {
			return false;
		}
		return true;
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function random_query($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by("id", "random");
		$this->db->limit(1, 0);
		return $this->db->get()->result(); 
	}

	public function save($table,$data)
	{
		$this->db->insert($table,$data);
	}
}
