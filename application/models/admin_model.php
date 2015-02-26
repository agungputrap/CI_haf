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
		function loadDataSiswa($nama)
		{
			$sql = "select * from siswa left outer join user on (siswa.id_user = user.Id) where Nama='".$nama."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//mendapatkan detail profil guru
		function loadDataGuru($nama)
		{
			$sql = "select * from guru left outer join user on (guru.id_user = user.Id) where Nama='".$nama."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//mendapatkan list guru
		function get_list_guru()
		{
			$sql = "select Kode_Guru, Nama, Jenis_Kelamin, Program, Mata_Pelajaran, Status_Guru from guru";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//mendapatkan list staff
		function get_list_staff()
		{
			$sql = "select Id_Staff, Nama, Jenis_Kelamin, Bagian, Gaji_per_bulan from staff";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//mendapatkan detail profil staff
		function loadDataStaff($nama)
		{
			$sql = "select * from staff left outer join user on (staff.id_user = user.Id) where Nama='".$nama."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//menghapus 1 row staff
		function delete_staff($id)
		{
			$sql = "delete from staff where Id_Staff =".$id;
			$query = $this->db->query($sql);
		}


		//mendapatkan detail profil staff dengan menggunakan id_staff yang dapat diedit
		function loadEditableDataStaff($id)
		{
			$sql = "select * from staff left outer join user on (staff.id_user = user.Id) where Id_Staff=".$id;
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//update alamat, password, dan no telp user
		function update_profil_staff_tableUser($username, $pass,$alamat, $telp){
			$sql = "update user set Password = " ."'". $pass ."',"."Alamat ='".$alamat."',"."No_Telp ='".$telp."'"." where Username='".$username."'";
			$query = $this->db->query($sql);
		}
		//mendapatkan id staff
		function getStaffId($username)
		{
			$sql = "select staff.Id_Staff from staff, user where staff.Id_User = user.Id and user.Username ='".$username."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}

?>