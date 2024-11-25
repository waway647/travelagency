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
		$this->load->helper('accesscontrol_helper'); 
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
			$myAdmin["profile_pic"] = $this->input->post('profile_pic');
			$myAdmin["created_at"] = date("Y-m-d H:i:s");
			$myAdmin["updated_at"] = date("Y-m-d H:i:s");

			$insertAdmin = $this->Account_model->insertAdminAcc($myAdmin);
			if ($insertAdmin == true){
				$this->redirect_adminPage();
			}
			else{
				echo "Invalid input! Try Again!";
				$this->load->view('webpages/login_register/adminCreateAcc');
			}
		}

		public function show_profile_pic($username_frompost) {
			$admin_account = $this->Account_model->getAdminAccount($username_frompost);
			
			if ($admin_account && $admin_account->profile_pic) {
				$file_path = FCPATH . $admin_account->profile_pic; // Full path to the image file
				if (file_exists($file_path)) {
					header("Content-Type: image/jpeg");
					readfile($file_path); // Output the image
				} else {
					show_404(); 
				}
			} else {
				show_404(); 
			}
		}

		// for A D M I N  P A G E
	public function showAdmin()
	{
		$this->load->view('adminPage');
	}

	public function showAdminCreateAcc(){
		$this->load->view('webpages/login_register/adminCreateAcc');
	}

    // for A R C H I V E S
	public function showAdminArchives()
	{
		$this->load->view('admin/AdminArchives/adminArchives');
	}

	//for B O O K I N G S
	public function showAdminBookings()
	{
        $data['bookings'] = $this->Admin_model->bookings_GetAll();
		$this->load->view('admin/AdminBookings/adminBookings', $data);
	}

    public function loadRecord3($rowno=0)
    {
        $rowperpage = 10;

        if ($rowno != 0) {
            $rowno = ($rowno-1) * $rowperpage;
        }

        $allcount = $this->db->count_all('booking');

        $this->db->limit($rowperpage, $rowno);
        $users_record = $this->db->get('booking')->result_array();

        $config['base_url'] = base_url().'AdminController/loadRecord3';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        
        $config['num_links'] = 10;

        $config['full_tag_open']    = '<div class="pagging text-center"><ul class="pagination">';
        $config['full_tag_close']   = '</ul></div>';
        
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // for D A S H B O A R D
	public function showAdminDashboard()
	{
		$username = $this->session->userdata('username');
    	$fname = $this->session->userdata('fname');
    	$lname = $this->session->userdata('lname');

    	$data['username'] = $username;
    	$data['fname'] = $fname;
    	$data['lname'] = $lname;

		$this->load->view('admin/adminDashboard', $data);
	}


    // for R E V I E W S
	public function showAdminReviews()
	{
		$this->load->view('admin/AdminReviews/adminReviews');
	}

    // for T O U R  P A C K A G E S
	public function showTourPackages()
	{
		$username = $this->session->userdata('username');
    	$fname = $this->session->userdata('fname');
    	$lname = $this->session->userdata('lname');

    	$data['username'] = $username;
    	$data['fname'] = $fname;
    	$data['lname'] = $lname;
		
		$this->load->view('admin/AdminTourPackage/adminTourPackages');
	}

	public function show_createTourPackage()
	{
		$this->load->view('admin/AdminTourPackage/form_newTourPackage');
	}				

					public function create_tourPackage()
					{
						$tourpackagedata = [
							"city" => $this->input->post("city"),
							"country" => $this->input->post("country"),
							"price" => $this->input->post("price"),
							"tourDescription" => $this->input->post("tourDescription"),
							"duration" => $this->input->post("duration")
						];

						$tourPackageID = $this->Admin_model->saveTourPackage($tourpackagedata);
						if ($tourPackageID) {
							// Collect itinerary data
							$itineraries = $this->input->post("itinerary");
							foreach ($itineraries as $itinerary) {
								$itinerarydata = [
									"tourPackageID" => $tourPackageID,
									"day" => $itinerary["day"],
									"activity" => $itinerary["activity"],
									"startTime" => $itinerary["startTime"],
									"endTime" => $itinerary["endTime"],
									"location" => $itinerary["location"]
								];
								$this->Admin_model->saveItinerary($itinerarydata);
							}
					
							// Redirect to the index page after successful save
							$this->session->set_userdata('username', $this->session->userdata('username'));
							redirect('AdminController/showTourPackages');
						} else {
							// Handle the error
							echo "Failed to save the tour package.";
						}
					}

			public function show_editTourPackage($tourpackage_id)
			{
				$data['tourpackages'] = $this->Admin_model->get_edit($tourpackage_id);
				$this->load->view("admin/AdminTourPackage/form_editTourPackage", $data);
			}

					public function update_TourPackage($tourpackage_id)
					{
						$mydata["city"] = $this->input->post("city");
						$mydata["country"] = $this->input->post("country");
						$mydata["price"] = $this->input->post("price");
						$mydata["tourDescription"] = $this->input->post("tourDescription");
						$mydata["duration"] = $this->input->post("duration");

						$result = $this->Admin_model->updateTourPackage($tourpackage_id,$mydata);
						if($result == true)
						{
							$this->session->set_userdata('username', $this->session->userdata('username'));
							redirect('AdminController/showTourPackages');
							//$this->index();
						}
					}

			public function show_editItinerary($tourpackage_id)
			{
				$data['tourpackage'] = $this->Admin_model->get_edit($tourpackage_id);
				$data['itineraries'] = $this->Admin_model->getItinerariesByTourPackageId($tourpackage_id);
				$this->load->view("admin/AdminTourPackage/form_edit_itinerary", $data);
			}

					public function updateItinerary() {
						$itineraries = $this->input->post('itinerary');
					
						foreach($itineraries as $day => $itinerary) {
							$this->Admin_model->updateItinerary($itinerary['id'], $itinerary);
						}
					
						$this->session->set_userdata('username', $this->session->userdata('username'));
						redirect('AdminController/showTourPackages');
					}

			public function delete_TourPackage($deleteid)
			{

				$result = $this->Admin_model->deleteTourPackage($deleteid);
				if($result == true)
				{
					$this->session->set_userdata('username', $this->session->userdata('username'));
					redirect('AdminController/showTourPackages');
				}
			}

			public function loadRecord1($rowno = 0)
			{
				$this->load->library('pagination');
			
				$rowperpage = 6;
			
				if ($rowno != 0) {
					$rowno = ($rowno - 1) * $rowperpage;
				}
			
				// Count total records
				$allcount = $this->db->count_all('tourpackage');
			
				// Fetch records with limit
				$this->db->select('*');
				$this->db->from('tourpackage');
				$this->db->limit($rowperpage, $rowno);
				$tourPackages = $this->db->get()->result_array();
			
				// Fetch and attach itinerary details
				foreach ($tourPackages as &$package) {
					$package['itinerary'] = $this->getItineraryByPackageId($package['tourpackage_id']);
				}
			
				// Pagination configuration
				$config['base_url'] = base_url() . 'AdminController/loadRecord1';
				$config['use_page_numbers'] = TRUE;
				$config['total_rows'] = $allcount;
				$config['per_page'] = $rowperpage;
				$config['num_links'] = 10;
			
				$config['full_tag_open'] = '<div class="pagging text-center"><ul class="pagination">';
				$config['full_tag_close'] = '</ul></div>';
				$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close'] = '</span></li>';
				$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
				$config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
				$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
				$config['prev_tag_close'] = '</span></li>';
				$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
				$config['first_tag_close'] = '</span></li>';
				$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
				$config['last_tag_close'] = '</span></li>';
			
				$this->pagination->initialize($config);
			
				$data['pagination'] = $this->pagination->create_links();
				$data['result'] = $tourPackages;
				$data['row'] = $rowno;
			
				echo json_encode($data);
			}
			
			public function getItineraryByPackageId($tourpackage_id)
			{
				// Fetch itinerary records for the given tour package ID
				$this->db->select('*');
				$this->db->from('itinerary');
				$this->db->where('tourPackageID', $tourpackage_id);
			
				$query = $this->db->get();
			
				// Return the result as an array
				if ($query->num_rows() > 0) {
					return $query->result_array();  // If data is found, return as an array
				} else {
					return array();  // If no itinerary is found, return an empty array
				}
			}

			// for T R A N S A C T I O N S
			public function showTransactions()
			{
				$this->load->view('admin/AdminTransactions/adminTransactions');
			}	


			// For U S E R  A C C O U N T S
			public function showUserAccounts()
			{
				$data['editUser'] = $this->Admin_model->get_all();
				$this->load->view('admin/AdminUserAccounts/adminUserAccounts', $data);
			}

			public function editUserAccount($id)
			{
				$data['editUser'] = $this->Admin_model->editUser($id);
				$this->load->view('admin/AdminUserAccounts/editUserAccount', $data);
			}

			public function deleteUserAccount($id)
			{
				$result = $this->Admin_model->deleteUser($id);
				if ($result) {
					echo "Asset successfully deleted!";
					redirect('AdminController/showUserAccounts');
				} else {
					echo "Failed to delete data!";
				}
			}

			public function updateUserAccount($id)
			{
				$myUser['username'] = $this->input->post('username');
				/* $myUser['pass'] = $this->input->post('pass'); */
				$myUser['firstName'] = $this->input->post('firstName');
				$myUser['midInitial'] = $this->input->post('midInitial');
				$myUser['lastName'] = $this->input->post('lastName');
				$myUser['email'] = $this->input->post('email');
				$myUser['mobileNum'] = $this->input->post('mobileNum');
				$myUser['bday'] = $this->input->post('bday');
				$myUser['gender'] = $this->input->post('gender');
				$myUser['nationality'] = $this->input->post('nationality');
				$myUser['updated_at'] = $this->input->post('updated_at');

				$result = $this->Admin_model->updateUser($id, $myUser);
				if ($result) {
					echo "Asset successfully edited!";
					redirect('AdminController/showUserAccounts');
				} else {
					echo "Failed to update data!";
				}
			}

			public function loadRecord2($rowno=0)
			{
				$rowperpage = 12;

				if ($rowno != 0) {
					$rowno = ($rowno-1) * $rowperpage;
				}

				$allcount = $this->db->count_all('userregistration');

				$this->db->limit($rowperpage, $rowno);
				$users_record = $this->db->get('userregistration')->result_array();

				$config['base_url'] = base_url().'AdminController/loadRecord2';
				$config['use_page_numbers'] = TRUE;
				$config['total_rows'] = $allcount;
				$config['per_page'] = $rowperpage;
				
				$config['num_links'] = 10;

				$config['full_tag_open']    = '<div class="pagging text-center"><ul class="pagination">';
				$config['full_tag_close']   = '</ul></div>';
				
				$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close']    = '</span></li>';
				$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
				$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['prev_tag_close']  = '</span></li>';
				$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
				$config['first_tag_close'] = '</span></li>';
				$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['last_tag_close']  = '</span></li>';

				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
				$data['result'] = $users_record;
				$data['row'] = $rowno;

				header('Content-Type: application/json');
				echo json_encode($data);
			}

		public function LogOut()
		{
			$this->session->sess_destroy();
			$this->load->view('webpages/login_register/signIn');
		}
}
