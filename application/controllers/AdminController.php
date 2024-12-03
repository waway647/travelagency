<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class AdminController extends Account {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->database();
        $this->load->model("Admin_model");
        $this->load->helper('url');
		$this->load->helper('accesscontrol_helper'); 
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
}