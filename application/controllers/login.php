<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');

		//login modul 
		$this->load->model('login_model');
	}

	public function index()
	{
		$username = $this->input->post("txt_username");
		$password = $this->input->post("txt_password");

		//set validations
		$this->form_validation->set_rules("txt_username","Username","trim|required");
		$this->form_validation->set_rules("txt_password","Password","trim|required");
		$this->load->view("header_view");

		if ($this->form_validation->run()==FALSE)
		{
			//validation fails
			$this->load->view("login_view");
			$this->load->view("footer_view");
		}
		else
		{
			//validation succeeds
			if($this->input->post('btn_login')=="Login")
			{
				//check username and password correct
				$usr_result = $this->login_model->get_user($username, $password);
					if($usr_result > 0)
					{
						$login_check = $this->login_model->check_login_twice($username, $password);
						if($login_check > 0)
						{
							$this->login_model->set_login_valid($username, $password);
							$sessiondata = array('username'=> $username, 'loginuser'=> TRUE);
							$this->session->set_userdata($sessiondata);
							redirect("home_siswa/home");
						}
						else
						{
							$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Anda sudah login di tempat lain!</div>');
							redirect('login/index');
						}
					}
					else
					{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
						redirect('login/index');
					}
			}
			else
			{
				redirect('login/index');
			}
		}
	}
	
} ?>