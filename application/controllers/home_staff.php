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

		public function mengabsen_siswa(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp = $this->staff_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"mengabsen siswa", "data" => $temp);
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('mengabsen_siswa',$var_param);
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
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"absensi", "data" => $temp);
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('absensi_siswa_view',$var_param);
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
				$alamat = $this->input->post("txt_alamat");
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
					$usr_name = $this->staff_model->ambil_nama($username);
					$temp = $usr_name[0];
					$nama = $temp['nama'];

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
						$query_waktu = $this->staff_model->ambil_shift_siswa();

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
						$query_tugas = $this->staff_model->ambil_jadwal($nama,$day,$dec_shift[$index]);

						//Jika staff tidak mempunyai tugas di hari dan/atau waktu pada ia mengabsen, maka ada error message
						if (count($query_tugas) == 0) {
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Bukan shiftnya pak!!!</div>');
							redirect('home_staff/mengabsen_siswa');
						} else {
								
								//simpan row dari query_tugas dalam suatu variabel temp					
								$temp2 = $query_tugas[0];
								$id_tugas = $temp2['id_jadwal'];
								
								//check apakah staff sudah absen untuk suatu shift
								$check_duplikat = $this->staff_model->duplikat($nama,$id_tugas);

								//Kalau staff ngabsen tapi belum pada jadwalnya, maka ada error message
								if ($index > 1) {
									if ($dec_outtime[$index - 1] >= $hoursnow) {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Bukan jadwalnya ngabsen pak!!!</div>');
										redirect('home_staff/mengabsen_siswa');
									}
								}
								else{
									//Kalau staff ngabsen tapi sebelumnya udah absen, maka ada error message
									if ($check_duplikat > 0) {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Udah ngabsen kan tadi pak!!!</div>');
										redirect('home_staff/mengabsen_siswa');
									} else {
										echo $this->staff_model->isi_absen_siswa($id_tugas,$nama,$staff);
										var_dump($id_tugas);
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Absen disimpan!!!</div>');
										redirect('home_staff/mengabsen_siswa');
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
	}

?>