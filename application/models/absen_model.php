<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class absen_model extends CI_Model{
	function __construct()
	{
		//call model constructor
		parent::__construct();
	}

	//check usernamenya ada atau tidak di tabel user
	function check_username($data){
		$sql = "select * from user where username = ". "'".$data."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	//ambil nama asli dari staff berdasarkan username
	function ambil_nama($data){
		$sql = "select nama from staff where id_user = (select id from user where username = ". "'".$data."')";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//ambil kode tugas dari staff berdasarkan username, sekarang hari apa, dan shift apa yang sedang berlangsung
	function ambil_tugas($user,$day,$shift){
		$sql = "select id_tugas from tugas_staff where kode_shift = ". "'".$shift."' and hari = ". "'".$day."' and kode_staff = (select id_staff from staff where id_user = ( select Id from user where username = ". "'".$user."'))";
		$query = $this->db->query($sql);
		return $query->result_array();
		//return "Berhasil";
	}

	//ambil semua shift dari seorang staff
	function ambil_shift_staff(){
		$sql = "select kode_shift, waktu_mulai, waktu_berakhir from shift_ssc where kode_shift LIKE 'S%' ";
		$query = $this->db->query($sql);
		return $query->result_array();
		//return "Berhasil";
	}

	//isi tabel absen dengan kode tugasnya apa, siapa yang ngabsen, dan status absennya
	function isi_absen($kodetugas,$data,$status){
		$sql = "insert into absensi_staff(kode_tugas,username, tanggal, waktu, status) values (". "'".$kodetugas."',"."'".$data."'".",current_date,current_time,". "'".$status."')";
		$query = $this->db->query($sql);
	}

	//check apakah user yang sama sudah absen sebelumnya
	function duplikat($user,$kodetugas){
		$sql = "select * from absensi_staff where username = ". "'".$user."' and tanggal = current_date and kode_tugas = ". "'".$kodetugas."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
?>