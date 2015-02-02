<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran_model extends CI_Model 
{
	function __construct()
	{
		//call model constructor
		parent::__construct();
	}

	//resume pembayaran
	function get_pembayaran($user)
	{
		$sql = "select A.kode_pembayaran , A.Atas_nama, B.nama , A.staff_yang_menerima , C.nama as Nama_Staff from pembayaran A, siswa B , staff C  where A.staff_yang_menerima = C.id_staff and A.atas_nama = B.no_ssc and
		 B.no_ssc = (select D.No_SSC from siswa D , user E where E.Id = D.ID_User and E.Username = "."'".$user."')" ;
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