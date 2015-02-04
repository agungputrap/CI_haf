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
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"mengabsen siswa");
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
					"halaman"=>"absensi");
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
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"pendaftaran");
				$this->load->view("header_staffweb_view",$var_param);
				$this->load->view('pendaftaran_view',$var_param);
				$this->load->view("footer_view");	
			}
		}

		public function proc_daftar(){
				$username = $this->input->post("txt_username");
				$password = $this->input->post("txt_password");
				$nama = $this->input->post("txt_nama");
				$alamat = $this->input->post("txt_alamat");
		}
	}

?>