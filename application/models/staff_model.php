<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class staff_model extends CI_Model{
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

	//check usernamenya ada atau tidak di tabel user
	function ambil_nama($data){
		$sql = "select nama from siswa where id_user = (select id from user where username = ". "'".$data."')";
		$query = $this->db->query($sql);
		return $query->result_array();
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

	//ambil semua shift dari seorang staff
	function ringkasan_absen(){
		$sql = "select tanggal, waktu, status from absensi_staff where username = ". "'".$user."' ";
		$query = $this->db->query($sql);
		return $query->result_array();
		//return "Berhasil";
	}

	//isi tabel absen dengan kode tugasnya apa, siapa yang ngabsen, dan status absennya
	function isi_absen_siswa($kodejadwal,$nama,$staff){
		$sql = "insert into absensi_siswa(nama_siswa,kode_jadwal,staff_yang_mengabsen, tanggal, waktu) values ("."'".$nama."'".",". "'".$kodejadwal."',"."'".$staff."'".",current_date,current_time)";
		$query = $this->db->query($sql);
	}

	//check apakah user yang sama sudah absen sebelumnya
	function duplikat($user,$kodetugas){
		$sql = "select * from absensi_siswa where nama_siswa = ". "'".$user."' and tanggal = current_date and kode_jadwal = ". "'".$kodetugas."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function ambil_shift_siswa(){
		$sql = "select kode_shift, waktu_mulai, waktu_berakhir from shift_ssc where kode_shift LIKE 'B%' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function ambil_biaya(){
		$sql = "select * from biaya_ssc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function ambil_jadwal($user,$day,$shift){
		$sql = "select id_jadwal from jadwal where kode_shift = ". "'".$shift."' and hari = ". "'".$day."' and kode_kelas= (select kode_kelas from siswa where nama = ". "'".$user."')";
		$query = $this->db->query($sql);
		return $query->result_array();
		//return "Berhasil";
	}

	function daftarkan_user($username,$password,$alamat,$telp,$dur){
		$sql = "insert into user(username,password,alamat,no_telp,role,status_akun,durasi_akun) values ("."'".$username."'".",". "'".$password."',"."'".$alamat."'".","."'".$telp."'".",'Siswa','Aktif',"."'".$dur."'".")";
		$query = $this->db->query($sql);
	}

	function daftarkan_siswa($username,$nama,$sex,$id_biaya,$status,$left){
		$sql2 = "insert into siswa(id_user,no_ssc,nama,jenis_kelamin,program,kode_kelas,status_pembayaran,sisa_pembayaran) 
		values 
		("."'".$username."'".",'0',". "'".$nama."',"."'".$sex."'".","."'".$id_biaya."'".",'NULL',"."'".$status."'".",". "'".$left."')";
		
		$query = $this->db->query($sql2);
	}

	function pembayaran($type,$nama,$staff,$paid){
		$sql = "insert into pembayaran(tipe_transaksi,atas_nama,staff_yang_menerima,nominal,tanggal,waktu) 
		values 
		("."'".$type."'".",". "'".$nama."',"."'".$staff."'".","."'".$paid."'".",current_date,current_time)";

		$query = $this->db->query($sql);
	}

	function ambil_id_siswa($username){
		$sql = "select id from user where username = ". "'".$username."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function update_status($id_user,$status){
		$sql = "update siswa set status_pembayaran = " .'"'. $status .'"'. " where id_user = " .'"'. $id_user .'"'. "";
		$query = $this->db->query($sql);

	}

	function update_sisa($id_user,$sisa){
		$sql = "update siswa set sisa_pembayaran = " .'"'. $sisa .'"'. " where id_user = " .'"'. $id_user .'"'. "";
		$query = $this->db->query($sql);

	}

}
?>