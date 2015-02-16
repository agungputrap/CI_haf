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
	}
?>