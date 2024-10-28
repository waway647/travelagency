<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Account_model');
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->helper('accesscontrol_helper'); // Load the helper
	}

	//homepage
	public function showHomePage()
	{
		$this->load->view('homepage');
	}

	public function redirect_adminPage()
	{
		if ($this->session->userdata('admin_username') && $this->session->userdata('admin_pass')) {
			redirect('Admin_Controllers/Admin_tourpackage/show_tourPackageCRUD');
		}
		else
		{
			$this->redirect_userHomePage();
		}
	}

	public function redirect_signIn()
	{
		if (!$this->session->userdata('logged_username')) {
			$this->load->view('webpages/login_register/signIn');
		}
		else
		{
			$this->load->view('webpages/user_homepage');
		}
	}

	public function redirect_userHomePage()
	{
		if($this->session->userdata('logged_username'))
		{
			$this->load->view('webpages/user_homepage');
		}
		else
		{
			$this->load->view('webpages/login_register/signIn');
		}
	}

		// User Login
		public function proc_login()
		{
			$username_frompost = $this->input->post("username");
			$pass_frompost = $this->input->post("pass");	
	
			// Check if email or username is provided
			if(!$username_frompost || !$pass_frompost) {
				echo "Please provide both Username and password!";
				return;
			}

			if($username_frompost=='admin' && $pass_frompost=='pass123')
			{
				$this->session->set_userdata("admin_username", $username_frompost);
				$this->session->set_userdata("admin_pass", $pass_frompost);
				$this->redirect_adminPage();
			}
			else
			{
				// Fetch user data from the database
				$result = $this->Account_model->getlogin($username_frompost, $pass_frompost);
				if($result == true) {
					//$this->session->set_userdata("username", $username_frompost);
					$this->session->set_userdata(array(
						'logged_username' => $username_frompost,
						'logged_firstName' => $result->firstName,
						'logged_midInitial' => $result->midInitial,
						'logged_lastName' => $result->lastName,
						'logged_email' => $result->email,
						'logged_mobileNum' => $result->mobileNum,
						'logged_bday' => $result->bday,
						'logged_gender' => $result->gender,
						'logged_nationality' => $result->nationality
					));
					
					$this->redirect_userHomePage();
				} else {
					// Show error message and reload the sign-in view
					echo "Invalid login! Try again.";
					$this->load->view('Faculty_signIn');
				}
			}
		}

	//Sign Up
	public function showSignUp_1()
	{
		$this->load->view('webpages/login_register/signUp_1');
	}

	public function showSignUp_2()
	{
		if($this->session->userdata('username'))
		{
			$this->load->view('webpages/login_register/signUp_2');
		}
		else
		{
			$this->redirect_signIn();
		}
	}

		//User Registration
		public function create_user_1()
		{

			$mydata["username"] = $this->input->post("username");
			$mydata["pass"] = $this->encryption->encrypt($this->input->post('pass'));

			//Store session
			$this->session->set_userdata("username", $mydata["username"]);
    		$this->session->set_userdata("pass", $mydata["pass"]);

			if ($this->session->userdata("username") && $this->session->userdata("pass")) {
				$this->showSignUp_2();
			} else {
				$this->showSignUp_1();
			}
		}

		public function create_user_2()
		{

			// Get session data
			$mydata["username"] = $this->session->userdata("username");
			$mydata["pass"] = $this->session->userdata("pass");

			// Get input data
			$mydata["firstName"] = $this->input->post("firstName");
			$mydata["midInitial"] = $this->input->post("midInitial");
			$mydata["lastName"] = $this->input->post("lastName");
			$mydata["email"] = $this->input->post("email");
			$mydata["mobileNum"] = $this->input->post("mobileNum");
			$mydata["bday"] = $this->input->post("bday");
			$mydata["gender"] = $this->input->post("gender");
			$mydata["nationality"] = $this->input->post("nationality");
			$mydata["created_at"] = date("Y-m-d H:i:s");
			$mydata["updated_at"] = date("Y-m-d H:i:s");

			// Insert into userlogin table
			$loginData = [
				"username" => $mydata["username"],
				"email" => $mydata["email"],
				"pass" => $mydata["pass"]
			];
			$this->db->insert("userlogin", $loginData);

			// Retrieve loginID from userlogin table
			$loginID = $this->Account_model->get_loginID($mydata["username"]);
			if ($loginID) {
				$mydata["loginID"] = $loginID;

				// Save data into userregistration table
				$result = $this->Account_model->savedata($mydata);
				if ($result) {
					$this->redirect_signIn();
					//echo "Account created!";
				} else {
					echo "Failed to create account.";
				}
			} else {
				echo "Login ID not found.";
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			$this->load->view('webpages/login_register/signIn');
		}
}
