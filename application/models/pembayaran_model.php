<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran_model extends CI_Model 
{
	function __construct()
	{
		//call model constructor
		parent::__construct();
	}

	function loadData($user)
	{
		$sql = "select * from siswa A, user B where A.id_user = B.id and B.username='".$user."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//resume pembayaran
	function get_pembayaran($user)
	{
		$sql = "select * from pembayaran where atas_nama =" ."'".$user."'" ;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//status dan sisa pembayaran
	function get_sisaStatus_pembayaran($user)
	{
		$sql = "select A.Status_Pembayaran , A.Sisa_Pembayaran from siswa A, user B  where A.id_user = B.id and
		 B.username =" ."'".$user."'" ;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}