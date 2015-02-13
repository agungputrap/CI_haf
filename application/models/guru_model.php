<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class guru_model extends CI_Model{
	function __construct()
	{
		//call model constructor
		parent::__construct();
	}

	//check usernamenya ada atau tidak di tabel user
	function check_username_guru($data){
		$sql = "select * from user where username = ". "'".$data."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function loadData($user)
	{
		$sql = "select * from guru A, user B where A.id_user = B.id and B.username='".$user."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function ambil_jadwal_guru($user)
	{
		$sql = "select DISTINCT B.hari, A.waktu_mulai, A.waktu_berakhir from shift_ssc A, jadwal B, user C, guru D where B.kode_shift = A.kode_shift and B.kode_guru = D.kode_guru and D.id_user = C.id and C.username = ". "'".$user."' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//ambil nama asli dari staff berdasarkan username
	function ambil_id_staff($data){
		$sql = "select nama from staff where id_user = (select id from user where username = ". "'".$data."')";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//ambil semua shift dari seorang staff
	function ringkasan_absen(){
		$sql = "select tanggal, waktu, status from absensi_staff where username = ". "'".$user."' ";
		$query = $this->db->query($sql);
		return $query->result_array();
		//return "Berhasil";
	}

	//mendapatkan jadwal kelas guru
	function get_jadwal_kelas_guru($user)
	{
		$sql = "select A.Hari, A.Tanggal_Mulai from jadwal A, guru B, user C where A.kode_guru = B.kode_guru and B.Id_User = C.Id and C.Username = '".$user."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	//mendapatkan jadwal absen guru
	function get_absen_guru($name)
	{
		$sql = "select * from absensi_guru where Nama_Guru ='".$name."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>