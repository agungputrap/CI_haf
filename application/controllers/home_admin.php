<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->database();
			$this->load->model('login_model');
			$this->load->model('home_model');
			$this->load->model('admin_model');
			$this->load->model('staff_model');
		}

		public function home()
		{
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				//simpan semua data yang penting dalam variabel temp
				$temp = $this->home_model->loadData($this->session->userdata('username'));

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"beranda", "data" => $temp);
				
				$this->load->view("header_inweb_admin_view",$var_param);
				$this->load->view("home_admin_view");
				$this->load->view("footer_view");
			}
		}

		public function profil_siswa()
		{
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				//simpan semua data yang penting dalam variabel temp
				$temp_list_siswa = $this->admin_model->get_list_siswa();

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"beranda","data_list_siswa"=> $temp_list_siswa);
				
				$this->load->view("header_inweb_admin_view",$var_param);
				$this->load->view("admin_profil_siswa_view");
				$this->load->view("footer_view");
			}
		}

		public function profil_guru()
		{
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				//simpan semua data yang penting dalam variabel temp
				$temp_list_guru = $this->admin_model->get_list_guru();

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"beranda","data_list_guru"=> $temp_list_guru);
				
				$this->load->view("header_inweb_admin_view",$var_param);
				$this->load->view("admin_profil_guru_view");
				$this->load->view("footer_view");
			}
		}

		public function profil_staff()
		{
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				//simpan semua data yang penting dalam variabel temp
				$temp_list_staff = $this->admin_model->get_list_staff();

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"beranda","data_list_staff"=> $temp_list_staff);
				
				$this->load->view("header_inweb_admin_view",$var_param);
				$this->load->view("admin_profil_staff_view");
				$this->load->view("footer_view");
			}
		}

		public function profil_siswa_detail($nama){
			$clean_nama = str_replace("%20", " ", $nama);
			$temp_detail_profil_siswa = $this->admin_model->loadDataSiswa($clean_nama);

			$var_param = array("data_detail_siswa"=>$temp_detail_profil_siswa);

			$this->load->view("admin_detail_siswa",$var_param);
		}

		public function profil_staff_detail($nama){
			$clean_nama = str_replace("%20", " ", $nama);
			$temp_detail_profil_staff = $this->admin_model->loadDataStaff($clean_nama);

			$var_param = array("data_detail_staff"=>$temp_detail_profil_staff);

			$this->load->view("admin_detail_staff",$var_param);
		}

		public function profil_guru_detail($nama){
			$clean_nama = str_replace("%20", " ", $nama);
			$temp_detail_profil_guru = $this->admin_model->loadDataGuru($clean_nama);

			$var_param = array("data_detail_guru"=>$temp_detail_profil_guru);

			$this->load->view("admin_detail_guru",$var_param);
		}

		public function logout(){
			$var_param['this_user'] = $this->session->userdata('username');
			$newdata = array('username'=>$var_param['this_user'], 'loginuser'=>FALSE);

			//untuk menghancurkan session ketika logout
			$this->session->unset_userdata($newdata);
	   		$this->session->sess_destroy();

	   		redirect('login');
		}

		public function hapus_staff($Id_Staff){
			$this->admin_model->delete_staff($Id_Staff);
			redirect("home_admin/profil_staff");
			//$this->load->view("konfirmasi_staff_dihapus");
		}

		public function edit_data_staff($Id_Staff){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp_data_user = $this->admin_model->loadEditableDataStaff($Id_Staff);
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"rubah_profil","data" =>$temp_data_user);


				$this->load->view('rubah_profil_staff',$var_param);
				$this->load->view("footer_view");
			}
		}

		public function proc_rubah_profil_staff($username)
		{
			if($this->input->post('btn_cancel')=="Cancel"){
				redirect('home_admin/profil_staff');
			}
			$password = $this->input->post("txt_password");
			$alamat = $this->input->post("txt_alamat");
			$telp = $this->input->post("txt_telp");
			$nama = $this->input->post("txt_nama");
			$jenis_kelamin = $this->input->post("txt_jenis_kelamin");
			$bagian = $this->input->post("txt_bagian");
			$gaji = $this->input->post("txt_gaji");

			//form validation
			$this->form_validation->set_rules("txt_password","Password","trim|required");
			$this->form_validation->set_rules("txt_alamat","Address","trim|required");
			$this->form_validation->set_rules("txt_telp","Telephone","trim|required");

			//config untuk upload gambar
			 $config =  array(
                  'upload_path'     => "./assets/images/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf",
                  'overwrite'       => TRUE,
                  'file_name'       => $username,
                  'max_size'        => "2048000",  // Can be set to particular file size
                  'max_height'      => "3200",
                  'max_width'       => "3200"  
                );    
			if ($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Pengisian form ada yang kosong atau salah!!!</div>');
					$temp_id_staff = $this->admin_model->getStaffId($username);
					$stringpindah = 'home_admin/edit_data_staff/'.$temp_id_staff[0]['Id_Staff']; 
					redirect($stringpindah);
			}
			else
			{
				//data buat page
				$temp_data_user = $this->home_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"rubah_profil","data" =>$temp_data_user);

				//upload gambar
				$this->load->library('upload', $config);
				if($this->upload->do_upload())
				{
					$this->upload->data();
					$this->admin_model->update_profil_staff_tableUser($username,$password,$alamat,$telp);
					$temp_id_staff = $this->admin_model->getStaffId($username);
					$this->admin_model->update_profil_staff_tableStaff($temp_id_staff[0]['Id_Staff'],$jenis_kelamin,$bagian,intval($gaji));
					redirect("home_admin/profil_staff");
					//$this->load->view("header_inweb_admin_view",$var_param);
					//$this->load->view('rubah_profil_siswa_berhasil');
					//$this->load->view("footer_view");
				}
			}
		}
		public function hapus_guru($Kode_Guru){
			$this->admin_model->delete_guru($Kode_Guru);
			redirect("home_admin/profil_guru");
			//$this->load->view("konfirmasi_staff_dihapus");
		}

		public function edit_data_guru($Kode_Guru){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp_data_user = $this->admin_model->loadEditableDataGuru($Kode_Guru);
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"rubah_profil","data" =>$temp_data_user);


				$this->load->view('rubah_profil_guru',$var_param);
				$this->load->view("footer_view");
			}
		}

		public function proc_rubah_profil_guru($username)
		{
			if($this->input->post('btn_cancel')=="Cancel"){
				redirect('home_admin/profil_guru');
			}
			$password = $this->input->post("txt_password");
			$alamat = $this->input->post("txt_alamat");
			$telp = $this->input->post("txt_telp");
			$nama = $this->input->post("txt_nama");
			$jenis_kelamin = $this->input->post("txt_jenis_kelamin");
			$mata_pelajaran = $this->input->post("txt_mapel");
			$program = $this->input->post("txt_program");
			$status_guru = $this->input->post("txt_status");
			$gaji = $this->input->post("txt_gaji");


			//form validation
			$this->form_validation->set_rules("txt_password","Password","trim|required");
			$this->form_validation->set_rules("txt_alamat","Address","trim|required");
			$this->form_validation->set_rules("txt_telp","Telephone","trim|required");

			//config untuk upload gambar
			 $config =  array(
                  'upload_path'     => "./assets/images/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf",
                  'overwrite'       => TRUE,
                  'file_name'       => $username,
                  'max_size'        => "2048000",  // Can be set to particular file size
                  'max_height'      => "3200",
                  'max_width'       => "3200"  
                );    
			if ($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Pengisian form ada yang kosong atau salah!!!</div>');
					$temp_kode_guru = $this->admin_model->getGuruKode($username);
					$stringpindah = 'home_admin/edit_data_staff/'.$temp_kode_guru[0]['Kode_Guru']; 
					redirect($stringpindah);
			}
			else
			{
				//data buat page
				$temp_data_user = $this->home_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"rubah_profil","data" =>$temp_data_user);

				//upload gambar
				$this->load->library('upload', $config);
				if($this->upload->do_upload())
				{
					$this->upload->data();
					$this->admin_model->update_profil_guru_tableUser($username,$password,$alamat,$telp);
					$temp_kode_guru = $this->admin_model->getGuruKode($username);
					$this->admin_model->update_profil_guru_tableGuru($temp_kode_guru[0]['Kode_Guru'],$jenis_kelamin,$mata_pelajaran,$program,$status_guru,intval($gaji));
					redirect("home_admin/profil_guru");
					//$this->load->view("header_inweb_admin_view",$var_param);
					//$this->load->view('rubah_profil_siswa_berhasil');
					//$this->load->view("footer_view");
				}
			}
		}

		public function hapus_siswa($Id_Siswa){
			$this->admin_model->delete_siswa($Id_Siswa);
			redirect("home_admin/profil_siswa");
			//$this->load->view("konfirmasi_staff_dihapus");
		}

		public function edit_data_siswa($Id_Siswa){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp_data_user = $this->admin_model->loadEditableDataSiswa($Id_Siswa);
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"rubah_profil","data" =>$temp_data_user);


				$this->load->view('rubah_profil_siswa_dariAdmin',$var_param);
				$this->load->view("footer_view");
			}
		}

		public function proc_rubah_profil_siswa($username)
		{
			if($this->input->post('btn_cancel')=="Cancel"){
				redirect('home_admin/profil_siswa');
			}
			$password = $this->input->post("txt_password");
			$alamat = $this->input->post("txt_alamat");
			$telp = $this->input->post("txt_telp");
			$nama = $this->input->post("txt_nama");
			$jenis_kelamin = $this->input->post("txt_jenis_kelamin");
			$program = $this->input->post("txt_program");
			$kode_kelas = $this->input->post("txt_kode_kelas");

			//form validation
			$this->form_validation->set_rules("txt_password","Password","trim|required");
			$this->form_validation->set_rules("txt_alamat","Address","trim|required");
			$this->form_validation->set_rules("txt_telp","Telephone","trim|required");

			//config untuk upload gambar
			 $config =  array(
                  'upload_path'     => "./assets/images/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf",
                  'overwrite'       => TRUE,
                  'file_name'       => $username,
                  'max_size'        => "2048000",  // Can be set to particular file size
                  'max_height'      => "3200",
                  'max_width'       => "3200"  
                );    
			if ($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Pengisian form ada yang kosong atau salah!!!</div>');
					$temp_id_siswa = $this->admin_model->getSiswaId($username);
					$stringpindah = 'home_admin/edit_data_siswa/'.$temp_id_siswa[0]['No_SSC']; 
					redirect($stringpindah);
			}
			else
			{
				//data buat page
				$temp_data_user = $this->home_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"rubah_profil","data" =>$temp_data_user);

				//upload gambar
				$this->load->library('upload', $config);
				if($this->upload->do_upload())
				{
					$this->upload->data();
					$this->admin_model->update_profil_siswa_tableUser($username,$password,$alamat,$telp);
					$temp_id_siswa = $this->admin_model->getSiswaId($username);
					$this->admin_model->update_profil_siswa_tableSiswa($temp_id_siswa[0]['No_SSC'],$jenis_kelamin,$program, $kode_kelas);
					redirect("home_admin/profil_siswa");
					//$this->load->view("header_inweb_admin_view",$var_param);
					//$this->load->view('rubah_profil_siswa_berhasil');
					//$this->load->view("footer_view");
				}
			}
		}

		public function menambahkan_siswa()
		{
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$program = array();
				$pertahun = array();
				$persemester = array();

				$biaya = $this->staff_model->ambil_biaya();
				for ($i=0; $i < count($biaya); $i++) { 
					foreach ($biaya[$i] as $key => $value) {
						if ($key == "Nama_Program") {
							//ambil bagian jamnya saja lalu ubah kedalam int
							$program[$i] = $value;
						} elseif ($key == "Biaya_per_Tahun") {
							$pertahun[$i] = $value;
						} else {
							$persemester[$i] = $value;
						}		
					}
				}

				$temp = $this->staff_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"pendaftaran", "data" => $temp, "program" => $program , "pertahun" => $pertahun
					, "persemester" => $persemester );
				$this->load->view('admin_pendaftaran_siswa',$var_param);	
			}
		
		}

		public function proc_daftar_siswa(){
				$username = $this->input->post("txt_username");
				$password = $this->input->post("txt_password");
				$nama = $this->input->post("txt_nama");
				$sex = $this->input->post("sex");
				$alamat = $this->input->post("txt_alamat");
				$telp = $this->input->post("txt_telp");
				$staff = $this->input->post("txt_staff");
				$program = $this->input->post("program");
				$biaya = $this->input->post("biaya");
				$asal = $this->input->post("txt_asal");

				
				$this->form_validation->set_rules("txt_username","Username","trim|required|min_length[5]|max_length[24]");
				$this->form_validation->set_rules("txt_password","Password","trim|required|min_length[5]|max_length[24]");
				$this->form_validation->set_rules("txt_nama","Name","trim|required|max_length[30]");
				$this->form_validation->set_rules("txt_alamat","Address","trim|required");
				$this->form_validation->set_rules("txt_telp","Telephone","trim|required");
				$this->form_validation->set_rules("txt_asal","School","trim|required");
				
				if ($this->form_validation->run()==FALSE | empty($program) | empty($biaya)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Pengisian form ada yang kosong atau salah!!!</div>');
					redirect("home_admin/menambahkan_siswa");
				} else {

					$index = 0;
					$output = "";
					$pembayaran = $this->staff_model->ambil_biaya();
					for ($i=0; $i < count($pembayaran); $i++) { 
						foreach ($pembayaran[$i] as $key => $value) {
							if ($key == "Nama_Program") {
								if ($value == $program) {
									$index = $i;
								}
							} 	
						}
					}

					$dur = "";

					if ($biaya == "semester") {
						$output = "Biaya_per_Semester";
						$dur = "1 Semester";
					}
					else{
						$output = "Biaya_per_Tahun";
						$dur = "1 Tahun";
					}


					$id_biaya = $pembayaran[$index]['Id_Biaya'];

					$usercheck = $this->staff_model->check_username($username);

					if ($usercheck > 0) {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Username sudah ada!!!</div>');
						redirect("home_admin/menambahkan_siswa");
					} else {
						$this->staff_model->daftarkan_user($username,$password,$telp,$alamat,$dur);
						$id_siswa = $this->staff_model->ambil_id_siswa($username);
						$this->staff_model->daftarkan_siswa($id_siswa[0]['id'],$nama,$sex,$id_biaya,$asal,"Lunas",0);

						$temp = $this->staff_model->loadData($this->session->userdata('username'));
						$var_param= array("user"=>$this->session->userdata('username'),
						"halaman"=>"pendaftaran", "data" => $temp, "biaya" => $pembayaran[$index][$output],
						"id_user" => @$id_siswa[0]['id'], "nama" => $nama, "staff" => $staff, "type" => "Pendaftaran" );
						$this->session->set_flashdata('msg', '<div class="alert alert-info text-center">Pendaftaran Berhasil</div>');
						redirect("home_admin/menambahkan_siswa");
					}
				}
		}
	}
?>