<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class home_siswa extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->database();
			$this->load->model('login_model');
			$this->load->model('home_model');
			$this->load->model('siswa_model');
			$this->load->model('pembayaran_model');
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
				
				//jadikan parameter dari view header untuk menentukan halaman mana yang muncul
				$this->load->view("header_inweb_view",$var_param);

				//jadikan parameter dari home_siswa untuk memberikan data tentang siswa tersebut
				$this->load->view('home_siswa_view',$var_param);
				$this->load->view("footer_view");		
			}
		}

		public function logout(){
			$var_param['this_user'] = $this->session->userdata('username');
			$this->login_model->set_login_invalid($var_param['this_user']);
			$newdata = array('username'=>$var_param['this_user'], 'loginuser'=>FALSE);

			//untuk menghancurkan session ketika logout
			$this->session->unset_userdata($newdata);
	   		$this->session->sess_destroy();

	   		redirect('login');
		}

		public function nilaiTO(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp_data_user = $this->home_model->loadData($this->session->userdata('username'));
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"Nilai TO","data"=>$temp_data_user);
				$this->load->view("header_inweb_view",$var_param);
				$this->load->view('nilaiTO_siswa_view',$var_param);
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
				$temp_data_user = $this->home_model->loadData($this->session->userdata('username'));
				$temp_hari_mulai = $this->siswa_model->get_jadwal_kelas_siswa($this->session->userdata('username'));
				$temp_absensi_siswa = $this->siswa_model->get_absen_siswa($temp_data_user[0]['Nama']);
				$temp_absensi_siswa_tanggal = $this->siswa_model->get_absen_siswa_tanggal($temp_data_user[0]['Nama']);
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"absensi","data"=>$temp_data_user,"data_hari_mulai" => $temp_hari_mulai,"data_absensi_siswa"=>$temp_absensi_siswa,"data_absensi_siswa_tanggal" =>$temp_absensi_siswa_tanggal);
				$this->load->view("header_inweb_view",$var_param);
				$this->load->view('absensi_siswa_view',$var_param);
				$this->load->view("footer_view");	
			}
		}
		public function pembayaran(){
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				//simpan semua data yang penting dalam variabel temp
				$temp_data_user = $this->home_model->loadData($this->session->userdata('username'));
				$temp_data_pembayaran = $this->pembayaran_model->get_pembayaran($this->session->userdata('username'));
				$temp_status = $this->pembayaran_model->get_sisaStatus_pembayaran($this->session->userdata('username'));

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"pembayaran","data" =>$temp_data_user,"data_pembayaran" => $temp_data_pembayaran,"data_status" => $temp_status );
				$this->load->view("header_inweb_view",@$var_param);
				$this->load->view('pembayaran_siswa_view',$var_param);
				$this->load->view("footer_view");	
			}
		}
	}

?>