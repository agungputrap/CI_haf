<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class siswa_model extends CI_Model{
	function __construct()
	{
		//call model constructor
		parent::__construct();
	}

	//check usernamenya ada atau tidak di tabel user
	function check_username_siswa($data){
		$sql = "select * from user where username = ". "'".$data."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function loadData($user)
	{
		$sql = "select * from staff A, user B where A.id_user = B.id and B.username='".$user."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//ambil nama asli dari staff berdasarkan username
	function ambil_id_staff($data){
		$sql = "select nama from staff where id_user = (select id from user where username = ". "'".$data."')";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//ambil kode tugas dari staff berdasarkan username, sekarang hari apa, dan shift apa yang sedang berlangsung
	function pembayaran($user,$day,$shift){
		$sql = "insert into absensi_siswa(kode_ssc,kode_jadwal,staff_yang_mengabsen, tanggal, waktu) values (". "'".$kodejadwal."',"."'".$kodessc."'".","."'".$staff."'".",current_date,current_time)";
		$query = $this->db->query($sql);
		return $query->result_array();
		//return "Berhasil";
	}

	//ambil semua shift dari seorang staff
	function ringkasan_absen(){
		$sql = "select tanggal, waktu, status from absensi_staff where username = ". "'".$user."' ";
		$query = $this->db->query($sql);
		return $query->result_array();
		//return "Berhasil";
	}

	//isi tabel absen dengan kode tugasnya apa, siapa yang ngabsen, dan status absennya
	function isi_absen_siswa($kodejadwal,$kodessc,$staff){
		$sql = "insert into absensi_siswa(kode_ssc,kode_jadwal,staff_yang_mengabsen, tanggal, waktu) values (". "'".$kodejadwal."',"."'".$kodessc."'".","."'".$staff."'".",current_date,current_time)";
		$query = $this->db->query($sql);
	}

	//check apakah user yang sama sudah absen sebelumnya
	function duplikat($user,$kodetugas){
		$sql = "select * from absensi_staff where username = ". "'".$user."' and tanggal = current_date and kode_tugas = ". "'".$kodetugas."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function ambil_biaya(){
		$sql = "select * from biaya_ssc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>