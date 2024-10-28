<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Function to get all bookings
    public function bookings_GetAll()
    {
        $query = $this->db->get('booking');
        return $query->result_array();
    }

    // Function to save a tour package
    public function saveTourPackage($tourpackagedata)
    {
        $this->db->insert("tourpackage", $tourpackagedata);
        return $this->db->insert_id();
    }

    // Function to save an itinerary
    public function saveItinerary($itinerarydata)
    {
        $this->db->insert("itinerary", $itinerarydata);
    }

    // Function to get a tour package for editing
    public function get_edit($tourpackage_id)
    {
        $tourpackage = $this->db->get_where("tourpackage", array('tourpackage_id' => $tourpackage_id))->row();
        return $tourpackage;
    }

    // Function to update a tour package
    public function updateTourPackage($tourpackage_id, $tourpackagedata)
    {
        $this->db->where('tourpackage_id', $tourpackage_id);
        $this->db->update('tourpackage', $tourpackagedata);
        return true;
    }

    // Function to delete a tour package
    public function deleteTourPackage($deleteid)
    {
        // Start a transaction
        $this->db->trans_start();

        $this->db->delete('contact_passenger', array('contact_id' => $deleteid));
        $this->db->delete('booking', array('tourID' => $deleteid));
        $this->db->delete('contact', array('id' => $deleteid));
        $this->db->delete('itinerary', array('tourPackageID' => $deleteid));
        $this->db->delete('tour', array('id' => $deleteid));
        $this->db->delete('tourpackage', array('tourpackage_id' => $deleteid));

        $this->db->trans_complete();

        // Check if the transaction was successful
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed, handle the error
            return false;
        } else {
            // Transaction succeeded
            return true;
        }
    }

    // Function to get all user accounts
    public function get_all()
    {
        $query = $this->db->get('userregistration');
        return $query->result_array();
    }

    // Function to edit a user account
    public function editUser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('userregistration');
        return $query->row_array();
    }

    // Function to delete a user account
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('userregistration');
    }

    // Function to update a user account
    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('userregistration', $data);
    }

	public function getItinerariesByTourPackageId($tourpackage_id) {
        $this->db->where('tourPackageID', $tourpackage_id);
        $query = $this->db->get('itinerary'); // Assuming 'itineraries' is the table name
        return $query->result_array(); // Return the result as an array of rows
    }

	public function updateItinerary($id, $data) {
	    $this->db->where('id', $id);
		$this->db->update('itinerary', $data);
	}

	public function getItineraryByPackageId($tourpackage_id) {
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

	//tourpackage-booking
	public function get_tourpackage($city, $country, $price, $tourDescription, $duration) {
        $this->db->where('city', $city);
        $this->db->where('country', $country);
        $this->db->where('price', $price);
        $this->db->where('tourDescription', $tourDescription);
        $this->db->where('duration', $duration);
        $query = $this->db->get('tourpackage');

        return $query->row_array(); // Return the row as an associative array
    }
		
}
