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
		date_default_timezone_set('Asia/Jakarta');
		$date = getdate();
		$day = $date['weekday'];
		$month = $date['month'];
		$year = $date['year'];
		$ready['day'] = $day;
		$ready['month'] = $month;
		$ready['year'] = $year;
		


		if ($this->form_validation->run()==FALSE)
		{
			//validation fails
			$this->load->view("login_view",$ready);
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
							$temp1 = $this->login_model->check_role($username, $password);
							$sessiondata = array('username'=> $username, 'loginuser'=> TRUE);
							$this->session->set_userdata($sessiondata);
							$temp2 = $temp1[0];
							$role = $temp2['role'];
							if ($role == "Siswa") {
								redirect("home_siswa/home");
							}
							elseif ($role == "Staff") {
								redirect("home_staff/home");
							}
							elseif ($role == "Guru") {
								redirect("home_guru/home");
							}
							elseif ($role == "Manajer") {
								redirect("home_manajer/home");
							}
							else{
								redirect("home_admin/home");
							}
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