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
		}

		public function home()
		{
			if ($this->session->userdata('username') == NULL) 
			{
				redirect('login/index');
			}
			else
			{
				$var_param= array("user"=>$this->session->userdata('username'),"halaman"=>"beranda", "data" => $this->home_model->loadData($this->session->userdata('username')));
				//var_dump($var_param1);
				var_dump($var_param);
				echo "\n";
				//var_dump($var_param);
				$this->load->view("header_inweb_view",$var_param);
				$this->load->view('home_siswa_view',$var_param);
				$this->load->view("footer_view");		
			}
		}

		public function logout(){
			$var_param['this_user'] = $this->session->userdata('username');
			$this->login_model->set_login_invalid($var_param['this_user']);
			$newdata = array('username'=>$var_param['this_user'], 'loginuser'=>FALSE);
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
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"Nilai TO");
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
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"absensi");
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
				$var_param= array("user"=>$this->session->userdata('username'),
					"halaman"=>"pembayaran");
				$this->load->view("header_inweb_view",$var_param);
				$this->load->view('pembayaran_siswa_view',$var_param);
				$this->load->view("footer_view");	
			}
		}
	}

?>