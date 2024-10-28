<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Admin_tourpackage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Admin_model');
		$this->load->helper('url');
	}

	public function show_tourPackageCRUD()
	{
		$this->load->view('admin/admin_tourPackage/admin_tourPackageCRUD');
	}

	public function show_createTourPackage()
	{
		$this->load->view('admin/admin_tourpackage/form_newTourPackage');
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
					redirect('Admin_controllers/admin_tourpackage/show_tourPackageCRUD');
				} else {
					// Handle the error
					echo "Failed to save the tour package.";
				}
			}

	public function show_editTourPackage($tourpackage_id)
	{
		$data['tourpackages'] = $this->Admin_model->get_edit($tourpackage_id);
		$this->load->view("admin/admin_tourpackage/form_editTourPackage", $data);
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
					redirect('Admin_controllers/admin_tourpackage/show_tourPackageCRUD');
					//$this->index();
				}
			}

	public function show_editItinerary($tourpackage_id)
	{
		$data['tourpackage'] = $this->Admin_model->get_edit($tourpackage_id);
		$data['itineraries'] = $this->Admin_model->getItinerariesByTourPackageId($tourpackage_id);
		$this->load->view("admin/admin_tourpackage/form_edit_itinerary", $data);
	}

			public function updateItinerary() {
				$itineraries = $this->input->post('itinerary');
			
				foreach($itineraries as $day => $itinerary) {
					$this->Admin_model->updateItinerary($itinerary['id'], $itinerary);
				}
			
				redirect('Admin_controllers/Admin_tourpackage/show_tourPackageCRUD');
			}

	public function delete_TourPackage($deleteid)
	{

		$result = $this->Admin_model->deleteTourPackage($deleteid);
		if($result == true)
		{
			redirect('Admin_controllers/admin_tourpackage/show_tourPackageCRUD');
			//$this->index();
		}
	}

	public function loadRecord2($rowno = 0)
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
		$config['base_url'] = base_url() . 'Admin/loadRecord2';
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
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('webpages/login_register/signIn');
	}
}
