<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class home_staff extends CI_Controller
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
				$temp = $this->staff_model->loadData($this->session->userdata('username'));

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"beranda", "data" => $temp);
				
				//jadikan parameter dari view header untuk menentukan halaman mana yang muncul
				$this->load->view("header_staffweb_view",$var_param);

				//jadikan parameter dari home_siswa untuk memberikan data tentang siswa tersebut
				$this->load->view('home_staff_view',$var_param);
				$this->load->view("footer_view");		
			}
		}

		//untuk menghancurkan session ketika logout
		public function logout(){
			$var_param['this_user'] = $this->session->userdata('username');
			//$this->login_model->set_login_invalid($var_param['this_user']);
			$newdata = array('username'=>$var_param['this_user'], 'loginuser'=>FALSE);
			$this->session->unset_userdata($newdata);
	   		$this->session->sess_destroy();
	   		redirect('login');
		}

		public function mengabsen(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp = $this->staff_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"mengabsen", "data" => $temp);
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('mengabsen',$var_param);
				$this->load->view("footer_view");	
			}
		}

		public function cari_nama(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp = $this->staff_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"cari_nama", "data" => $temp);
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('cari_nama',$var_param);
				$this->load->view("footer_view");	
			}
		}

		public function absensi(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp_hari_mulai = $this->staff_model->get_jadwal_staff($this->session->userdata('username'));
				$temp_absensi_staff = $this->staff_model->get_absen_staff($temp_data_user[0]['Nama']);
				$arrTgl = array();

				for ($i=0; $i < count($temp_absensi_staff) ; $i++) { 
					foreach ($temp_absensi_staff[$i] as $key => $value) {
						if ($key == 'Tanggal') {
							$arrTgl[$i] = $value;
						}
					}
				}

				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"absensi", "data" => $temp_data_user, "jadwal" => $temp_hari_mulai, "absen" => $temp_absensi_staff,
					"tanggal" => $arrTgl);
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('absensi_staff',$var_param);
				$this->load->view("footer_view");	
			}
		}

		public function pendaftaran(){
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
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('pendaftaran_view',$var_param);	
			}
		}

		public function proc_daftar(){
				$username = $this->input->post("txt_username");
				$password = $this->input->post("txt_password");
				$nama = $this->input->post("txt_nama");
				$asal = $this->input->post("txt_asal");
				$sex = $this->input->post("sex");
				$alamat = $this->input->post("txt_alamat");
				$telp = $this->input->post("txt_telp");
				$staff = $this->input->post("txt_staff");
				$program = $this->input->post("program");
				$biaya = $this->input->post("biaya");

				
				$this->form_validation->set_rules("txt_username","Username","trim|required|min_length[5]|max_length[24]");
				$this->form_validation->set_rules("txt_password","Password","trim|required|min_length[5]|max_length[24]");
				$this->form_validation->set_rules("txt_nama","Name","trim|required|max_length[30]");
				$this->form_validation->set_rules("txt_asal","School","trim|required");
				$this->form_validation->set_rules("txt_alamat","Address","trim|required");
				$this->form_validation->set_rules("txt_telp","Telephone","trim|required");
				
				if ($this->form_validation->run()==FALSE | empty($program) | empty($biaya)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Pengisian form ada yang kosong atau salah!!!</div>');
					redirect("home_staff/pendaftaran");
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
						redirect("home_staff/pendaftaran");
					} else {
						$this->staff_model->daftarkan_user($username,$password,$telp,$alamat,$dur);
						$id_siswa = $this->staff_model->ambil_id_siswa($username);
						$this->staff_model->daftarkan_siswa($id_siswa[0]['id'],$nama,$sex,$id_biaya,$asal,"Lunas",'0');

						$temp = $this->staff_model->loadData($this->session->userdata('username'));
						$var_param= array("user"=>$this->session->userdata('username'),
						"halaman"=>"pendaftaran", "data" => $temp, "biaya" => $pembayaran[$index][$output],
						"id_user" => @$id_siswa[0]['id'], "nama" => $nama, "staff" => $staff, "type" => "Pendaftaran" );
						$this->load->view("header_staffweb_view",$var_param);
						$this->load->view('pendaftaran2_view',$var_param);
					}
				}
		}

		public function bayar(){
					if($this->input->post('btn_proses')=="Proses"){

						$fee = (int)$this->input->post("txt_fee");
						$paid = (int)$this->input->post("txt_paid");
						$id = $this->input->post("txt_id");
						$nama = $this->input->post("txt_nama");
						$staff = $this->input->post("txt_staff");
						$type = $this->input->post("txt_type");
						

						$this->form_validation->set_rules("txt_paid","Pembayaran","trim|required");
						if ($this->form_validation->run()==FALSE) {
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Form masih ada yang kosong!!!</div>');
							redirect("home_staff/pendaftaran");
						}
						else{
							$status = "Lunas";
							$left = 0;

							$eq = $fee - $paid;
							$left = $eq;
							if ($eq != 0) {
								$status = "Belum Lunas";
							}

							$this->staff_model->pembayaran($type,$nama,$staff,$paid);
							$this->staff_model->update_status($id,$status);
							$this->staff_model->update_sisa($id,$left);

							if ($type = "Pendaftaran") {
								$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Berhasil Mendaftar </div>');
								redirect("home_staff/pendaftaran");
							} else {
								$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Berhasil Membayar </div>');
								redirect("home_staff/pembayaran");
							}
							
							
							
						}
					}
		}

		public function bayaran(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp = $this->staff_model->loadData($this->session->userdata('username'));

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"bayaran", "data" => $temp);
				
				//jadikan parameter dari view header untuk menentukan halaman mana yang muncul
				$var_param= array("user"=>$this->session->userdata('username'),
						"halaman"=>"pembayaran", "data" => $temp);
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('pembayaran',$var_param);
			}

		}

		public function proc_cari(){

				$nama = $this->input->post("txt_nama");

				$realnama = $this->staff_model->cari_nama($nama);
				if (count($realnama) == 0) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Tidak ada nama tersebut</div>');
					redirect("home_staff/cari_nama");
				} else {
					$temp = $this->staff_model->loadData($this->session->userdata('username'));

					//gunakan tanda @ supaya tidak ada warning tentang undefined offset

					//simpan disuatu array yang memiliki key -> value
					$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"hasil_cari", "data" => $temp, "real" => $realnama);
				
					//jadikan parameter dari view header untuk menentukan halaman mana yang muncul
					$this->load->view("header_staffweb_view",$var_param);
					$this->load->view('hasil_cari',$var_param);
				}
				

		}

		public function proc_bayaran(){
			$temp = $this->staff_model->loadData($this->session->userdata('username'));
			if($this->input->post('btn_proses')=="Proses"){
					$nama = $this->input->post("txt_nama");

					$this->form_validation->set_rules("txt_nama","Name","trim|required|max_length[30]");

					if ($this->form_validation->run()==FALSE) {
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Form masih ada yang Salah!!!</div>');
							redirect("home_staff/bayaran");
					}
					else{
						$staff = $temp[0]['Nama'];
						$biaya = $this->staff_model->ambil_pembayaran($nama);
						if (count($biaya) == 0) {
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Tuliskan Nama Lengkap</div>');
							redirect("home_staff/bayaran");
						} else {
							$var_param= array("user"=>$this->session->userdata('username'),
							"halaman"=>"pendaftaran", "data" => $temp, "biaya" => @$biaya[0]['Sisa_Pembayaran'],
							"id_user" => @$biaya[0]['Id_User'], "nama" => $nama, "staff" => $staff, "type" => "Pembayaran" );
							$this->load->view("header_staffweb_view",$var_param);
							$this->load->view('pendaftaran2_view',$var_param);
						}
					}

				}
		}


		public function proc_mengabsen(){
			date_default_timezone_set('Asia/Jakarta');
			$date = getdate();
			$day = $date['weekday'];
			$month = $date['month'];
			$year = $date['year'];
			$hours = $date['hours'];
			$minutes = $date['minutes'];
			$seconds = $date['seconds'];
			$ready['day'] = $day;
			$ready['month'] = $month;
			$ready['year'] = $year;
			$ready['hours'] = $hours;
			$ready['minutes'] = $minutes;
			$ready['seconds'] = $seconds;

			//Jika user tidak ada maka langsung diberi message error
			$username = $this->input->post("txt_username");
			$staff = $this->input->post("txt_staff");

			//Mendapatkan Waktu yang nantinya digunakan untuk menentukan apakah yang mengabsen telat apa tidak
		
				if($this->input->post("btn_absen")=="Absen")
				{
					//pastikan usernya ada dan kalo ada namanya langsung diambil simpan di variabel nama
					$usr_result = $this->staff_model->check_username($username);
					
					$temp = $usr_name[0];
					$nama = $temp['nama'];
					$type = $this->input->post("type");

					if ($type == "siswa") {
						$usr_name = $this->staff_model->ambil_nama_siswa($username);
					} else {
						$usr_name = $this->staff_model->ambil_nama_guru($username);
					}
					

					//Untuk menentukan shift pada waktu si user mengabsen
					$index = 0;
					//array output
					$out = array();

					//Jika user tidak ada maka langsung diberi message error
					if($usr_result > 0)
					{
						/*
						dec_time digunakan untuk menyimpan waktu dimulainya semua shift
						dec_shift digunakan untuk menyimpan semua kode shift
						dec_outtime digunakan untuk menyimpan waktu berakhirnya semua shift
						dalam 1 index yang sama untuk ketiga array tersebut, merupakan 1 row query yang bersesuaian.
						*/
						$dec_time = array();
						$dec_shift = array();
						$dec_outtime = array();

						//ambil semua shift dari staff untuk menentukan shift manakah yang sedah berlangsung pada waktu staff mengabsen
						$query_waktu = $this->staff_model->ambil_shift();

						//simpan data sesuai array yang telah ditentukan sebelumnya
						for ($i=0; $i < count($query_waktu); $i++) { 
							foreach ($query_waktu[$i] as $key => $value) {
								if ($key == "waktu_mulai") {
									//ambil bagian jamnya saja lalu ubah kedalam int
									$dec_time[$i] = (int)substr($value,0,2);
								} elseif ($key == "kode_shift") {
									$dec_shift[$i] = $value;
								} else {
									$dec_outtime[$i] = $value;
								}
								
							}
						}
						//ubah value jam dan menit yang didapat dari date kedalam format int
						$hoursnow = (int)$hours;
						$minutesnow = (int)$minutes;

						//variabel untuk menghentikan while ketika suatu value tercapai
						$breaker = true;

						//menentukan index array yang menyimpan data tentang shift yang sedang berlangsung ketika staff mengabsen
						while ($breaker) {
							if ($dec_time[$index] <= $hoursnow) {
								$breaker = false;
							}
							$index = $index + 1;
						}

						//ambil data id tugas dari suatu staff dengan kdoe shift dan hari yang bersesuaian
						$query_tugas = array();

						if ($type = "siswa") {
							$query_tugas = $this->staff_model->ambil_jadwal_siswa($nama,$day,$dec_shift[$index]);
						} else {
							$query_tugas = $this->staff_model->ambil_jadwal_guru($nama,$day,$dec_shift[$index]);
						}
						

						//Jika staff tidak mempunyai tugas di hari dan/atau waktu pada ia mengabsen, maka ada error message
						if (count($query_tugas) == 0) {
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Bukan shiftnya pak!!!</div>');
							redirect('home_staff/mengabsen');
						} else {
								
								//simpan row dari query_tugas dalam suatu variabel temp					
								$temp2 = $query_tugas[0];
								$id_tugas = $temp2['id_jadwal'];
								
								//check apakah staff sudah absen untuk suatu shift
								if ($type = "siswa") {
									$duplikat =  $this->staff_model->duplikat_siswa($nama,$id_tugas);
								} else {
									$duplikat = $this->staff_model->duplikat_guru($id_tugas);
								}
								

								//Kalau staff ngabsen tapi belum pada jadwalnya, maka ada error message
								if ($index > 1) {
									if ($dec_outtime[$index - 1] >= $hoursnow) {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Bukan jadwalnya ngabsen pak!!!</div>');
										redirect('home_staff/mengabsen');
									}
								}
								else{
									//Kalau staff ngabsen tapi sebelumnya udah absen, maka ada error message
									if ($check_duplikat > 0) {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Udah ngabsen kan tadi pak!!!</div>');
										redirect('home_staff/mengabsen');
									} else {
										if ($type = "siswa") {
											$this->staff_model->isi_absen_siswa($id_tugas,$nama,$staff);
										}
										else{
											$this->staff_model->isi_absen_guru($id_tugas,$nama,$staff);
										}
										
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Absen disimpan!!!</div>');
										redirect('home_staff/mengabsen');
									}
								}
								
						}
					}
					else
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Salah username</div>');
						redirect('home_staff/mengabsen_siswa');
					}
				}
		}

		public function see_jadwal(){
				$temp = $this->staff_model->loadData($this->session->userdata('username'));

				$kelas = $this->staff_model->kelas();
				$shift = $this->staff_model->shift();
				$guru = $this->staff_model->guru();
				$jadwal = $this->staff_model->jadwal();

				$jadwalOrdered = array();
				$codeSubject = array();

				for ($i=0; $i < count($guru) ; $i++) { 
					$codeSubject[$guru[$i]['Kode_Guru']] = $guru[$i]['Mata_Pelajaran'];
				}

				for ($i=0; $i < count($jadwal) ; $i++) { 
					$keyCandidate = $jadwal[$i]['Kode_Kelas'];
					$indexDay = 6;
					$arrOrdering = array();
					if ($jadwal[$i]['Hari'] == "Monday") {
						$indexDay = 0;
					} elseif ($jadwal[$i]['Hari'] == "Tuesday") {
						$indexDay = 1;
					} elseif ($jadwal[$i]['Hari'] == "Wednesday") {
						$indexDay = 2;
					} elseif ($jadwal[$i]['Hari'] == "Thursday") {
						$indexDay = 3;
					} elseif ($jadwal[$i]['Hari'] == "Friday") {
						$indexDay = 4;
					} elseif ($jadwal[$i]['Hari'] == "Saturday") {
						$indexDay = 5;
					}
					/*
					$arrOrdering = $jadwal[$i];
					if ($jadwal[$i]['Kode_Shift'] == "S01") {
						$jadwalOrdered[$keyCandidate]['0'][$indexDay] = $arrOrdering;
					} elseif ($jadwal[$i]['Kode_Shift'] == "S02") {
						$jadwalOrdered[$keyCandidate]['1'][$indexDay] = $arrOrdering;
					}
					*/
					$arrOrdering = $jadwal[$i];
					if ($jadwal[$i]['Kode_Shift'] == "B01") {
						$jadwalOrdered[$keyCandidate]['0'][$indexDay] = $arrOrdering;
					} elseif ($jadwal[$i]['Kode_Shift'] == "B02") {
						$jadwalOrdered[$keyCandidate]['1'][$indexDay] = $arrOrdering;
					}
				}

				$arrHari = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"see_jadwal", "data" => $temp
					, "kelas"=> $kelas, "shift" => $shift, "guru"=>$guru, "tabel_jadwal"=>$jadwalOrdered, "kodePelajaran"=>$codeSubject);
				
				//jadikan parameter dari view header untuk menentukan halaman mana yang muncul
				$this->load->view("header_staffweb_view",$var_param);

				//jadikan parameter dari home_siswa untuk memberikan data tentang siswa tersebut
				$this->load->view('all_jadwal',$var_param);
				$this->load->view("footer_view");		
		}

		public function proc_jadwal(){

		}

		public function add_kelas(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$program = array();
				$idProg = array();
				$persemester = array();

				$biaya = $this->staff_model->ambil_biaya();
				for ($i=0; $i < count($biaya); $i++) { 
					foreach ($biaya[$i] as $key => $value) {
						if ($key == "Nama_Program") {
							//ambil bagian jamnya saja lalu ubah kedalam int
							$program[$i] = $value;
						} elseif ($key == "Id_Biaya") {
							$idProgram[$i] = $value;
						} else {
							$persemester[$i] = $value;
						}		
					}
				}

				$temp = $this->staff_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"add_kelas", "data" => $temp, "program" => $program , "idProgram" => $idProgram);
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('staff_tambahKelas_view',$var_param);	
			}
		
		}

		public function proc_add_Kelas(){
			if($this->input->post('btn_tambah')=="tambah") {
				$kodeKelas = $this->input->post("txt_codKelas");
				$program = $this->input->post("program");
				$idProgram = "";

				
				$this->form_validation->set_rules("txt_codKelas","kodkelas","trim|required|integer");
				
				if ($this->form_validation->run()==FALSE | empty($program)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Pengisian form ada yang kosong atau salah!!!</div>');
					redirect("home_staff/proc_add_Kelas");
				} else {


					
					$classcheck = $this->staff_model->check_class($kodeKelas);

					if ($classcheck > 0) {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Kode kelas sudah ada!!!</div>');
						redirect("home_staff/proc_add_Kelas");
					} else {

						$idProgram = $this->staff_model->ambil_biaya();
						for ($i=0; $i < count($idProgram); $i++) { 
							foreach ($idProgram[$i] as $key => $value) {
								if ($key == "Nama_Program" && $program == $value) {
									$ambil_id = $this->staff_model->ambil_id_biaya($program);
									$idProgram = $ambil_id[0][id_biaya];
								} 	
							}
						}

						$this->staff_model->tambahKelas($kodeKelas,$idProgram);

						$temp = $this->staff_model->loadData($this->session->userdata('username'));
						$var_param= array("user"=>$this->session->userdata('username'),
						"halaman"=>"proc_add_Kelas", "data" => $temp, "biaya" => $pembayaran[$index][$output],
						"id_user" => @$id_siswa[0]['id'], "nama" => $nama, "staff" => $staff, "type" => "Pendaftaran" );
						$this->load->view("header_staffweb_view",$var_param);
						$this->load->view('staff_tambahKelas_view',$var_param);

						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Berhasil Menambahkan Kelas</div>');
								redirect("home_staff/add_kelas");
					}
				}
			}
		}
	}

?>