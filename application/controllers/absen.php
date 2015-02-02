<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class absen extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');

		//login modul 
		$this->load->model('absen_model');
	}

	public function index(){
		$username = $this->input->post("txt_username");

		//Mendapatkan Waktu yang nantinya digunakan untuk menentukan apakah yang mengabsen telat apa tidak
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

		//validasi
		$this->form_validation->set_rules("txt_username","Username","trim|required");

		$this->load->view("header_view",$ready);
		//tampilin
		if ($this->form_validation->run()==FALSE)
		{
			//validation fails
			$this->load->view("absen_view");
			$this->load->view("footer_view");
		}
		else 
		{
			if($this->input->post("btn_absen")=="Absen")
			{
				//pastikan usernya ada dan kalo ada namanya langsung diambil simpan di variabel nama
				$usr_result = $this->absen_model->check_username($username);
				$usr_name = $this->absen_model->ambil_nama($username);
				$temp = $usr_name[0];
				$nama = $temp['nama'];

				//Untuk menentukan shift pada waktu si user mengabsen
				$index = 0;
				//array output
				$out = array();
				//default status nya berhasil absen tanpa telat
				$status = "Berhasil";

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
						$query_waktu = $this->absen_model->ambil_shift_staff();

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
						$query_tugas = $this->absen_model->ambil_tugas($username,$day,$dec_shift[$index]);

						//Jika staff tidak mempunyai tugas di hari dan/atau waktu pada ia mengabsen, maka ada error message
						if (count($query_tugas) == 0) {
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Bukan shiftnya pak!!!</div>');
							redirect('absen/index');
						} else {
								
								//simpan row dari query_tugas dalam suatu variabel temp					
								$temp2 = $query_tugas[0];
								$id_tugas = $temp2['id_tugas'];

								//decision telat apa tidaknya
								//Jika nilai jam sekarang lebih besar daripada nilai jam pada shift, maka status akan di ubah menjadi "Terlambat"
								if ($dec_time[$index] >= $hoursnow) {

									//ambil waktu mulai dari array dengan index yang telah diketahui sebelumnya
									$var1 = $query_waktu[$index];

									//ambil bagian menitnya saja lalu ubah kedalam integer
									$var2 = (int)substr($var1["waktu_mulai"],3,2);
									if ($var2 > $minutesnow) {
										//Jika nilai jamnya = nilai jam shift, namun menitnya lebih dari menit shift nya, maka status akan menjadi "Terlambat"
										$status = "Terlambat";
									}
								}
								else{
									$status = "Terlambat";
								}

								//check apakah staff sudah absen untuk suatu shift
								$check_duplikat = $this->absen_model->duplikat($nama,$id_tugas);

								//Kalau staff ngabsen tapi belum pada jadwalnya, maka ada error message
								if ($dec_outtime[$index - 1] >= $hoursnow && $status != "Terlambat" && $index > 1) {
									$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Bukan jadwalnya ngabsen pak!!!</div>');
									redirect('absen/index');
								}
								else{
									//Kalau staff ngabsen tapi sebelumnya udah absen, maka ada error message
									if ($check_duplikat > 0) {
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Udah ngabsen kan tadi pak!!!</div>');
										redirect('absen/index');
									} else {
										//Kalau staff ngabsen telat, dimasukin ke laporan dengan status telat berikut error message
										if ($status == "Terlambat"){
											$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Telat Woy!!!</div>');
											$query_absen = $this->absen_model->isi_absen($id_tugas,$nama,$status);
											redirect('absen/index');
										}
										//Kalau staff ngabsen berhasil, dimasukin laporan dengan status tidak terlambat
										elseif ($status == "Berhasil"){
											$query_absen = $this->absen_model->isi_absen($id_tugas,$nama,$status);
											redirect('absen/index');
										}else{
											$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error woy admin!!!</div>');
											redirect('absen/index');
										}
										$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error woy admin!!!</div>');
										redirect('absen/index');
									}
								}
								
						}
					}
					else
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Salah username</div>');
						redirect('absen/index');
					}
			}
			else
			{
				redirect('absen/index');
			}
		}
	}
	public function berhasil(){
		$this->load->view('header_view');
		$this->load->view('absen_berhasil');
		$this->load->view('footer_view');
	}
}

?>