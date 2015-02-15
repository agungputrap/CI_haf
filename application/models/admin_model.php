<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

	class admin_model extends CI_Model{
		function __construct()
		{
			//call model constructor
			parent::__construct();
		}

		//mendapatkan list siswa
		function get_list_siswa()
		{
			$sql = "select No_SSC, Nama, Jenis_Kelamin, Program, Kode_Kelas, Status_Pembayaran from siswa";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//mendapatkan detail profil siswa  
		function loadData($nama)
		{
			$sql = "select * from siswa left outer join user on (siswa.id_user = user.Id) where Nama='".$nama."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}

?>