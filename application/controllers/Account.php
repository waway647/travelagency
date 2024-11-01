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
		if($this->session->userdata('username'))
		{
			$this->load->view('admin/adminDashboard');
		}
		else
		{
			$this->load->view('webpages/login_register/signIn');
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

	public function redirect_signIn_to_another()
	{
		$this->load->view('webpages/login_register/signIn');
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

			if(strpos($username_frompost, "admin") !== false)
			{
				$result = $this->Account_model->getAdminlogin($username_frompost, $pass_frompost);
				if ($result == true) {
					/* var_dump($this->session->all_userdata());  */
					$accountresult = $this->Account_model->getAdminAccount($username_frompost);
					if($accountresult)
					{
						$this->session->set_userdata(array(
							'username' => $username_frompost,
							'fname' => $accountresult->fname,
							'minitial' => $accountresult->minitial,
							'lname' => $accountresult->lname,
						));
						$this->redirect_adminPage();
					}	
					else 
					{
						echo "no session";
					}
				}
				else 
				{
					$this->session->set_flashdata('error_message', 'Invalid Username or Password. Try again!.');
					redirect('http://localhost/GitHub/travelagency/index.php/Account/redirect_signIn');
				}
			}
			else
			{
				// Fetch user data from the database
				$result = $this->Account_model->getlogin($username_frompost, $pass_frompost);
				if($result == true) 
				{
					$accountresult = $this->Account_model->getaccount($username_frompost);
					if($accountresult)
					{
						$this->session->set_userdata(array(
							'loginID_session' => $accountresult->loginID,
							'logged_username' => $username_frompost,
							'logged_firstName' => $accountresult->firstName,
							'logged_midInitial' => $accountresult->midInitial,
							'logged_lastName' => $accountresult->lastName,
							'logged_email' => $accountresult->email,
							'logged_mobileNum' => $accountresult->mobileNum,
							'logged_bday' => $accountresult->bday,
							'logged_gender' => $accountresult->gender,
							'logged_nationality' => $accountresult->nationality
						));
						
						$this->redirect_userHomePage();
					}
					else
					{
						echo "no session";
					}
				} 
				else 
				{
					$this->session->set_flashdata('error_message', 'Invalid Username or Password. Try again!');
					redirect('http://localhost/GitHub/travelagency/index.php/Account/redirect_signIn');
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
			$mylogindata["username"] = $this->input->post("username");
			$mylogindata["pass"] = $this->encryption->encrypt($this->input->post('pass'));

			//Store session
			$this->session->set_userdata("username", $mylogindata["username"]);
    		$this->session->set_userdata("pass", $mylogindata["pass"]);

			if ($this->session->userdata("username") && $this->session->userdata("pass")) {
				$this->showSignUp_2();
			} else {
				$this->showSignUp_1();
			}
		}

		public function create_user_2()
		{

			// Get session data
			$mylogindata["username"] = $this->session->userdata("username");
			$mylogindata["pass"] = $this->session->userdata("pass");

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
				"username" => $mylogindata["username"],
				"email" => $mydata["email"],
				"pass" => $mylogindata["pass"]
			];
			$this->db->insert("userlogin", $loginData);

			// Retrieve loginID from userlogin table
			$loginID = $this->Account_model->get_loginID($mylogindata["username"]);
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

		public function showCreateAdminAcc(){
			$this->load->view('webpages/login_register/adminCreateAcc');
		}

		public function createAdminAcc(){

			$key = bin2hex($this->encryption->create_key(16));
	
			$config['encryption_key'] = hex2bin($key);

			$myAdmin['fname'] = $this->input->post('fname');
			$myAdmin['minitial'] = $this->input->post('minitial');
			$myAdmin['lname'] = $this->input->post('lname');
			$myAdmin['username'] = $this->input->post('username');
			$myAdmin['email'] = $this->input->post('email');
			$myAdmin["pass"] = $this->encryption->encrypt($this->input->post('pass'));
			$myAdmin["created_at"] = date("Y-m-d H:i:s");
			$myAdmin["updated_at"] = date("Y-m-d H:i:s");

			$insertAdmin = $this->Account_model->insertAdminAcc($myAdmin);
			if ($insertAdmin == true){
				$this->redirect_signIn();
			}
			else{
				echo "Invalid input! Try Again!";
				$this->load->view('webpages/login_register/adminCreateAcc');
			}
		}

		public function LogOut()
		{
			$this->session->sess_destroy();
			$this->load->view('webpages/login_register/signIn');
		}
}
