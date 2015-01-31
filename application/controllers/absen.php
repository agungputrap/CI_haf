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

		//validasi
		$this->form_validation->set_rules("txt_username","Username","trim|required");

		$this->load->view("header_view");
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
				$usr_result = $this->absen_model->check_username($username);
					if($usr_result > 0)
					{
						$check_duplikat = $this->absen_model->duplikat($username);
						if ($check_duplikat > 0)
						{
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">You Already Do It!!!</div>');
							redirect('absen/index');	
						}
						else
						{
							$this->absen_model->isi_absen($username);
							redirect("absen/berhasil");	
						}
					}
					else
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username</div>');
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