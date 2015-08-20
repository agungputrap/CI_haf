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

		function loadEditableJadwalStaff($id)
		{
			$sql = "select * from tugas_staff where Kode_Staff=".$id;
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//update alamat, password, dan no telp user
		function update_profil_staff_tableUser($username, $pass,$alamat, $telp){
			$sql = "update user set Password = " ."'". $pass ."',"."Alamat ='".$alamat."',"."No_Telp ='".$telp."'"." where Username='".$username."'";
			$query = $this->db->query($sql);
		}

		//update alamat, password, dan no telp user
		function update_profil_staff_tableStaff($id, $jenis_kelamin,$bagian, $gaji){
			$sql = "update Staff set Jenis_Kelamin = " ."'". $jenis_kelamin ."',"."Bagian ='".$bagian."',"."Gaji_per_Bulan =".$gaji." where Id_Staff='".$id."'";
			$query = $this->db->query($sql);
		}

		//mendapatkan id staff
		function getStaffId($username)
		{
			$sql = "select staff.Id_Staff from staff, user where staff.Id_User = user.Id and user.Username ='".$username."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//menghapus 1 row guru
		function delete_guru($kode_guru)
		{
			$sql = "delete from guru where Kode_Guru ='".$kode_guru."'";
			$query = $this->db->query($sql);
		}

		//mendapatkan detail profil guru dengan menggunakan kode_guru yang dapat diedit
		function loadEditableDataGuru($kode)
		{
			$sql = "select * from guru left outer join user on (guru.id_user = user.Id) where Kode_Guru='".$kode."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//mendapatkan kode guru
		function getGuruKode($username)
		{
			$sql = "select guru.Kode_Guru from guru, user where guru.Id_User = user.Id and user.Username ='".$username."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//update alamat, password, dan no telp user
		function update_profil_guru_tableUser($username, $pass,$alamat, $telp){
			$sql = "update user set Password = " ."'". $pass ."',"."Alamat ='".$alamat."',"."No_Telp ='".$telp."'"." where Username='".$username."'";
			$query = $this->db->query($sql);
		}

		//update alamat, password, dan no telp user
		function update_profil_guru_tableGuru($kode, $jenis_kelamin,$mata_pelajaran, $program, $status_guru, $gaji){
			$sql = "update guru set Jenis_Kelamin = " ."'". $jenis_kelamin ."',"."Mata_Pelajaran ='".$mata_pelajaran."',"."Program ='".$program."',Status_Guru='".$status_guru."',Gaji_per_Shift =".$gaji." where Kode_Guru='".$kode."'";
			$query = $this->db->query($sql);
		}

		//menghapus 1 row siswa
		function delete_siswa($id)
		{
			$sql = "delete from siswa where No_SSC =".$id;
			$query = $this->db->query($sql);
		}

		//mendapatkan detail profil siswa dengan menggunakan id_siswa yang dapat diedit
		function loadEditableDataSiswa($id)
		{
			$sql = "select * from siswa left outer join user on (siswa.id_user = user.Id) where No_SSC=".$id;
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//mendapatkan id siswa
		function getSiswaId($username)
		{
			$sql = "select siswa.No_SSC from siswa, user where siswa.Id_User = user.Id and user.Username ='".$username."'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		//update alamat, password, dan no telp user
		function update_profil_siswa_tableUser($username, $pass,$alamat, $telp){
			$sql = "update user set Password = " ."'". $pass ."',"."Alamat ='".$alamat."',"."No_Telp ='".$telp."'"." where Username='".$username."'";
			$query = $this->db->query($sql);
		}

		//update alamat, password, dan no telp user
		function update_profil_siswa_tableSiswa($kode, $jenis_kelamin, $program, $kode_kelas){
			$sql = "update siswa set Jenis_Kelamin = " ."'". $jenis_kelamin ."',"."Program =".$program.","."Kode_Kelas =".$kode_kelas." where No_SSC=".$kode;
			$query = $this->db->query($sql);
		}

		function get_jadwal_staff($user)
	{
		$sql = "select A.Id_Tugas, A.Kode_Shift, A.Hari, A.Tanggal_Mulai from tugas_staff A, staff B , user C where A.Kode_Staff = B.Id_Staff and B.Id_User = C.Id and C.Username = '".$user."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_absen_staff($name)
	{
		$sql = "select * from absensi_staff left outer join tugas_staff on (absensi_staff.kode_tugas = tugas_staff.Id_tugas) where absensi_staff.username ='".$name."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function all_jadwal_staff(){
		$sql = "select B.Nama, A.Kode_Shift, A.Hari, A.Tanggal_Mulai from tugas_staff A, staff B , user C where A.Kode_Staff = B.Id_Staff and B.Id_User = C.Id ORDER BY B.Nama";
		$query = $this->db->query($sql);
		return $query->result_array();

	}


	function clear_jadwal_staff($id){
	$sql = "delete from tugas_staff where Kode_staff = '".$id."'";
	$query = $this->db->query($sql);
	}

	function ins_tugas_staff($id,$shift,$day){
	$sql = "insert into tugas_staff(Id_Tugas, Kode_Staff, Kode_Shift, Hari, Tanggal_Mulai) values ('',". "'".$id."',"."'".$shift."'".","."'".$day."'".",current_date)";
	$query = $this->db->query($sql);
	}



	}

?>