<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class home_guru extends CI_Controller
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
			$this->load->model('guru_model');
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
				$temp = $this->guru_model->loadData($this->session->userdata('username'));

				//gunakan tanda @ supaya tidak ada warning tentang undefined offset

				//simpan disuatu array yang memiliki key -> value
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"beranda", "data" => $temp);
				
				//jadikan parameter dari view header untuk menentukan halaman mana yang muncul
				$this->load->view("header_guruweb_view",$var_param);

				//jadikan parameter dari home_siswa untuk memberikan data tentang siswa tersebut
				$this->load->view('home_guru_view',$var_param);
				$this->load->view("footer_view");		
			}
		}
		
		public function logout(){
			$var_param['this_user'] = $this->session->userdata('username');
			//$this->login_model->set_login_invalid($var_param['this_user']);
			$newdata = array('username'=>$var_param['this_user'], 'loginuser'=>FALSE);
			$this->session->unset_userdata($newdata);
	   		$this->session->sess_destroy();
	   		redirect('login');
		}

		public function jadwal() {
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$temp_data_user = $this->guru_model->loadData($this->session->userdata('username'));
				$temp_jadwal_guru = $this->guru_model->ambil_jadwal_guru($this->session->userdata('username'));
				
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"jadwal","data"=>$temp_data_user,"data_jadwal_guru" => $temp_jadwal_guru);
				
				$this->load->view("header_guruweb_view",$var_param);
				$this->load->view('jadwal_guru_view',$var_param);
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
				$temp_data_user = $this->home_model->loadGuru($this->session->userdata('username'));
				$temp_hari_mulai = $this->guru_model->get_jadwal_kelas_guru($this->session->userdata('username'));
				$temp_absensi_siswa = $this->guru_model->get_absen_guru($temp_data_user[0]['Nama']);
				$temp_gaji_guru = $this->guru_model->get_gaji_guru($temp_data_user[0]['Nama']);
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"absensi","data"=>$temp_data_user,"data_hari_mulai" => $temp_hari_mulai,"data_absensi_guru"=>$temp_absensi_siswa,"data_gaji_guru"=>$temp_gaji_guru);
				$this->load->view("header_guruweb_view",$var_param);
				$this->load->view('absensi_guru_view',$var_param);
				$this->load->view("footer_view");	
			}
		}
	}

?>