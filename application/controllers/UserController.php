<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

include_once (dirname(__FILE__) . "/Account.php");
class UserController extends Account {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('encryption');
        $this->load->helper('accesscontrol_helper'); // Load the helper
	}

	// for M Y  P R O F I L E
	public function show_myprofile()
	{
		if (!$this->session->userdata('logged_username')) {
			$this->load->view('webpages/login_register/signIn');
		}
		else
		{
			$loginID = $this->session->userdata('loginID_session');

			$data['userinfo'] = $this->User_model->getuserprofile($loginID);
			$this->load->view("webpages/myprofile/user_myProfile", $data);
		}
	}

			public function showedit_myprofile($loginID)
			{
				$loginID = $this->session->userdata('loginID_session');

				$data['userinfo'] = $this->User_model->getuserprofile($loginID);
				$this->load->view("webpages/myprofile/user_editmyProfile", $data);
			}

			public function update_myprofile($user_id)
			{
				$userinfo["firstName"] = $this->input->post("firstName");
				$userinfo["midInitial"] = $this->input->post("midInitial");
				$userinfo["lastName"] = $this->input->post("lastName");
				$userinfo["email"] = $this->input->post("email");
				$userinfo["mobileNum"] = $this->input->post("mobileNum");
				$userinfo["bday"] = $this->input->post("bday");
				$userinfo["gender"] = $this->input->post("gender");
				$userinfo["nationality"] = $this->input->post("nationality");

				$userupdate = $this->User_model->updateprofile($user_id, $userinfo);
				if($userupdate == true)
				{
					redirect('http://localhost/travelagency_ci/index.php/UserController/show_myprofile');
				}
			}
			

	// for T O U R  P A C K A G E
	public function show_user_tourpackages()
	{
		if($this->session->userdata('logged_username'))
		{
			$keyword = $this->input->get('kw');
			$tourpackages = $this->User_model->getTourPackages($keyword); // Implement this method in your model
	
			if ($this->input->is_ajax_request()) {
				echo json_encode(['data' => $tourpackages]);
			} else {
				$data['tourpackages'] = $tourpackages;
				$this->load->view('webpages/tour_packages/user_tourpackages', $data);
			}
		}
		else
		{
			redirect('http://localhost/travelagency_ci/index.php/Account/redirect_signIn');
		}
	}

			public function tourPackages_session()
			{
				$tourpackageID_frompost = $this->input->post("tourpackage_id");

				// Get the tour package details
				$tourpackage = $this->User_model->get_tourpackage_row($tourpackageID_frompost);

				if ($tourpackage) {

					$sessiontourpackageData = array(
						'tourpackage_id' => $tourpackage['tourpackage_id'],
						'city' => $tourpackage['city'],
						'country' => $tourpackage['country'],
						'price' => $tourpackage['price'],
						'tourDescription' => $tourpackage['tourDescription'],
						'duration' => $tourpackage['duration'],
					);

					$this->session->set_userdata($sessiontourpackageData); 

					// Load the view to display session data
					$this->part1();
				} else {
					// Handle the case where the data does not match
					echo "No matching tour package found.";
				}
			}


	// for B O O K I N G  F O R M
	public function part1() 
	{
		$passenger_data = $this->session->userdata('tourpackage_id');
		if ($passenger_data) {
			// If user is not in part2 or part3, truncate the passenger_bin table
			$this->User_model->erase_passenger_bin();
		}

		$tourpackagedata = $this->session->userdata('tourpackage_id');
		if(!$tourpackagedata)
		{
			redirect('http://localhost/travelagency_ci/index.php/UserController/show_user_tourpackages');
		}   
		else
		{
			$this->load->view('webpages/booking/user_bookingform_1');
		}
    }

			public function part1_submit() 
			{
				$booktour_package = $this->input->post('booktour_package');
				$booktour_date = $this->input->post('booktour_date');

				list($tourpackage_id, $city, $country, $price, $tourDescription, $duration) = explode('|', $booktour_package);

				$this->session->set_userdata('tourpackage_id', $tourpackage_id);
				$this->session->set_userdata('city', $city);
				$this->session->set_userdata('country', $country);
				$this->session->set_userdata('price', $price);
				$this->session->set_userdata('tourDescription', $tourDescription);
				$this->session->set_userdata('duration', $duration);
				$this->session->set_userdata('booktour_date', $booktour_date);	// date

				//Date End Calculations
				$tourStartDate = new DateTime($booktour_date);

				$tourEndDate = clone $tourStartDate;
				$tourEndDate->modify("+$duration days");
				
				$this->session->set_userdata('tourStartDate', $tourStartDate->format('Y-m-d'));
				$this->session->set_userdata('tourEndDate', $tourEndDate->format('Y-m-d'));

				// Get the itinerary data
				$data['itineraries'] = $this->User_model->getItinerary($tourpackage_id);

				// Check if $data['itineraries'] is not empty
				if (!empty($data['itineraries'])) {
					// Prepare an array to hold itinerary session data
					$itineraryData = [];
			
					foreach ($data['itineraries'] as $itinerary) {
						// Store each itinerary's attributes in an associative array
						$itineraryData[] = [
							'day' => $itinerary->day,
							'activity' => $itinerary->activity,
							'startTime' => $itinerary->startTime,
							'endTime' => $itinerary->endTime,
							'location' => $itinerary->location,
						];
					}
			
					// Set the itinerary data to the session
					$this->session->set_userdata('itineraries', $itineraryData);
			
					if($this->session->userdata('itineraries'))
					{
						redirect('http://localhost/travelagency_ci/index.php/UserController/part2');
					}
				} 
				else 
				{
					redirect('http://localhost/travelagency_ci/index.php/UserController/part1');
				}
			}

			public function part2() 
			{
				if($this->session->userdata('booktour_date'))
				{
					$this->load->view('webpages/booking/user_bookingform_2');
				}
				else
				{
					redirect('http://localhost/travelagency_ci/index.php/UserController/part1');
				}  
			}

			public function part2_passenger_submit() 
			{
				$passenger = array(
					'passengerTitle' => $this->input->post('passengerTitle'),
					'passengerFname' => $this->input->post('passengerFname'),
					'passengerMinit' => $this->input->post('passengerMinit'),
					'passengerLname' => $this->input->post('passengerLname'),
					'passengerBirthday' => $this->input->post('passengerBirthday'),
					'passengerGender' => $this->input->post('passengerGender'),
					'passengerNationality' => $this->input->post('passengerNationality')
				);
				
				$result = $this->User_model->savepassengerTo_bin($passenger);
				if($result)
				{
					$this->session->set_userdata('passenger_data', $passenger);
					redirect('http://localhost/travelagency_ci/index.php/UserController/part2');
				}

				
			}

				public function part2_passenger_edit($passenger_id)
				{
					$data['passenger'] = $this->User_model->getpassenger_edit($passenger_id);
					$this->load->view("webpages/booking/user_bookingform_2_edit", $data);
				}

				public function part2_passenger_update($passenger_id)
				{
					$passenger["passengerTitle"] = $this->input->post("passengerTitle");
					$passenger["passengerFname"] = $this->input->post("passengerFname");
					$passenger["passengerMinit"] = $this->input->post("passengerMinit");
					$passenger["passengerLname"] = $this->input->post("passengerLname");
					$passenger["passengerBirthday"] = $this->input->post("passengerBirthday");
					$passenger["passengerGender"] = $this->input->post("passengerGender");
					$passenger["passengerNationality"] = $this->input->post("passengerNationality");

					$result = $this->User_model->updatepassenger($passenger_id,$passenger);
					if($result == true)
					{
						redirect('http://localhost/travelagency_ci/index.php/UserController/part2');
					}
				}

				public function part2_passenger_delete($passenger_id)
				{
					$result = $this->User_model->deletepassenger($passenger_id);
					if($result == true)
					{
						redirect('http://localhost/travelagency_ci/index.php/UserController/part2');
					}
				}
			
			public function part2_contact_submit() 
			{
				$contact = array(
					'contact_firstName' => $this->input->post('contact_firstName'),
					'contact_midInitial' => $this->input->post('contact_midInitial'),
					'contact_lastName' => $this->input->post('contact_lastName'),
					'contact_email' => $this->input->post('contact_email'),
					'contact_contactNumber' => $this->input->post('contact_contactNumber')
				);
			
				$this->session->set_userdata('contact', $contact);

				// Retrieve the session data for 'contact' array and check for 'contact_firstName'
				$session_contact = $this->session->userdata('contact');
				if (isset($session_contact['contact_firstName'])) 
				{
					//Total Price Calculations
					$price = $this->session->userdata('price');
					$passengerCount = $this->User_model->getPassengerCount();
			
					if ($passengerCount > 0) 
					{
						$totalPrice = $price * $passengerCount;
						$totalPrice = round($totalPrice, 2);
						$this->session->set_userdata('totalPrice', $totalPrice);
						echo "Total Price: " . $this->session->userdata('totalPrice');
						redirect('http://localhost/travelagency_ci/index.php/UserController/part3');
					} 
					else 
					{
						$this->session->set_flashdata('error_message', 'Cannot continue. Please enter at least one passenger.');
						redirect('http://localhost/travelagency_ci/index.php/UserController/part2');
					}
			
					// Redirect to part 3
					//redirect('UserController/part3');
				} 
				else 
				{
					echo "Contact information not found in session.";
				}
			}

			public function part3() {
				if($this->session->userdata('contact'))
				{
					$this->load->view('webpages/booking/user_bookingsummary');
				}
				else
				{
					redirect('http://localhost/travelagency_ci/index.php/UserController/part1');
				}
			}

			public function part3_submit() {
				// Start the transaction
				$this->db->trans_start();
			
				// Step 1: Get data from session
				$tourpackage_id = $this->session->userdata('tourpackage_id');
				$tourStartDate = $this->session->userdata('tourStartDate');
				$tourEndDate = $this->session->userdata('tourEndDate');
				$contact = $this->session->userdata('contact');
				$loginID = $this->session->userdata('loginID_session');
			
				// Step 2: Insert contact into the 'contact' table
				$insertContact = $this->User_model->insert_contact($contact);
			
				if (!$insertContact) {
					// Rollback transaction on failure
					$this->db->trans_rollback();
					return;
				}
			
				// Step 3: Get passengers from passenger_bin
				$getpassengers = $this->User_model->getpassenger_bin();
			
				if ($getpassengers) {
					// Step 4: Loop through each passenger and insert into the passenger table
					foreach ($getpassengers as $passenger) {
						$insertedPassengerId = $this->User_model->insert_passenger($passenger);
			
						if ($insertedPassengerId) {
							// Step 5: Group passenger and contact
							$this->User_model->group_passenger_contact($insertedPassengerId, $insertContact);

							$this->User_model->erase_passenger_bin();
						} else {
							// Rollback on error
							$this->db->trans_rollback();
							echo "Error inserting passenger: " . json_encode($passenger) . "\n";
							return; // Exit after rollback
						}
					}
			
					// Step 6: Insert tour details into the 'tour' table
					$insertTour = $this->User_model->insert_tour($tourpackage_id, $tourStartDate, $tourEndDate);
			
					if (!$insertTour) {
						echo "Error inserting tour.\n";
						$this->db->trans_rollback();
						return; // Exit after rollback
					}
					
					// Step 7: Insert booking details, linking the tour and the contact
					$this->User_model->insert_booking($insertTour, $insertContact, $loginID);

					$this->session->set_userdata('booking_success', true);
				} else {
					echo "No passengers found in passenger_bin.\n";
					$this->db->trans_rollback();
					return; // Exit after rollback
				}
			
				// Complete the transaction
				$this->db->trans_complete();
			
				// Check if the transaction was successful
				if ($this->db->trans_status() === FALSE) {
					echo "Transaction failed.";
				} else {
					$this->session->unset_userdata(
						array(
							'contact',
							'itineraries',
							'tourpackage_id', 
							'city', 
							'country', 
							'price', 
							'tourDescription', 
							'duration', 
							'tourStartDate',
							'tourEndDate',
						));
					redirect('http://localhost/travelagency_ci/index.php/UserController/success');
				}
			}
			

			public function success() {
				if(!$this->session->userdata('booking_success'))
				{
					redirect('http://localhost/travelagency_ci/index.php/UserController/show_user_tourpackages');
				}

				$this->load->view('webpages/booking/user_bookingsuccess');
				$this->session->unset_userdata('booking_success');
			}
			

			public function loadRecord_passenger($rowno = 0)
			{
				$this->load->library('pagination');
			
				$rowperpage = 5;
			
				if ($rowno != 0) {
					$rowno = ($rowno - 1) * $rowperpage;
				}
			
				// Count total records
				$allcount = $this->db->count_all('passenger_bin');
			
				// Fetch records with limit
				$this->db->select('*');
				$this->db->from('passenger_bin');
				$this->db->limit($rowperpage, $rowno);
				$tourPackages = $this->db->get()->result_array();
			
				
			
				// Pagination configuration
				$config['base_url'] = base_url() . 'UserController/loadRecord_passenger';
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

			public function loadRecord2($rowno = 0)
			{
				$this->load->library('pagination');
			
				$rowperpage = 10;
			
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
			
				
			
				// Pagination configuration
				$config['base_url'] = base_url() . 'UserController/loadRecord2';
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
}
