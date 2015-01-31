<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class absen_model extends CI_Model{
	function __construct()
	{
		//call model constructor
		parent::__construct();
	}

	function check_username($data){
		$sql = "select * from user where username = ". "'".$data."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function isi_absen($data){
		$sql = "insert into absen(username, tanggal, jam) values ("."'".$data."'".",current_date,current_time)";
		$query = $this->db->query($sql);
		echo "pengisian berhasil";
	}
	function duplikat($data){
		$sql = "select * from absen where username = ". "'".$data."' and tanggal = current_date";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
?>