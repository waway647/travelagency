<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class User_tourpackage_model extends CI_Model {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
	}

    public function getTourPackages() 
    {
        $tourpackage = $this->db->get("tourpackage")->result();
		return $tourpackage;
    }

	public function get_tourpackage_row($tourpackage_id) 
    {
        $this->db->where('tourpackage_id', $tourpackage_id);
        $query = $this->db->get('tourpackage');
        return $query->row_array(); // Return the row as an associative array
    }

    public function getItinerary($tourpackage_id)
    {
        $this->db->where('tourPackageID', $tourpackage_id);
        $query = $this->db->get('itinerary'); 

        var_dump($query->result());

        return $query->result();
    }

    public function savepassengerTo_bin($passenger)
    {
        $this->db->insert("passenger_bin", $passenger);
		return true;
    }

        public function getpassenger_edit($passenger_id)
        {
            //$assets = $this->db->get_where("tbl_asset", array('id' => $id))->result();
            $passenger = $this->db->get_where("passenger_bin", array('id' => $passenger_id))->row();
            return $passenger;
        }

        public function updatepassenger($passenger_id, $passenger)
        {
            $this->db->where('id', $passenger_id);
            $this->db->update('passenger_bin', $passenger);
            return true;
        }

        public function deletepassenger($passenger_id)
        {
            $this->db->where('id', $passenger_id);
            $this->db->delete('passenger_bin');
            return true;
        }

    public function getPassengerCount()
    {
        return $this->db->count_all_results('passenger_bin');
    }

    public function getpassenger_bin()
    {
        $query = $this->db->get('passenger_bin');
        return $query->result();
    }

    public function insert_passenger($passenger)
    {
        $data = array(
            'passengerTitle' => $passenger->passengerTitle,
            'passengerFname' => $passenger->passengerFname,
            'passengerMinit' => $passenger->passengerMinit,
            'passengerLname' => $passenger->passengerLname,
            'passengerBirthday' => $passenger->passengerBirthday,
            'passengerGender' => $passenger->passengerGender,
            'passengerNationality' => $passenger->passengerNationality,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
    
        // Attempt to insert and check for success
        if ($this->db->insert('passenger', $data)) {
            return $this->db->insert_id(); // Return the ID of the inserted row
        } else {
            // Log or handle insertion failure
            return false;
        }
    }

    public function erase_passenger_bin()
    {
        $this->db->truncate('passenger_bin');
    }

    public function insert_contact($contact) 
    {
        $data = array(
            'contact_firstName' => $contact['contact_firstName'],
            'contact_midInitial	' => $contact['contact_midInitial'],
            'contact_lastName' => $contact['contact_lastName'],
            'contact_email' => $contact['contact_email'],
            'contact_contactNumber' => $contact['contact_contactNumber'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('contact', $data);
        return $this->db->insert_id();
    }

    public function group_passenger_contact($passenger_id, $contact_id)
    {
        $data = array(
            'contact_id' => $contact_id,
            'passenger_id' => $passenger_id
        );
        $this->db->insert('contact_passenger', $data);
    }

    public function insert_tour($tourPackageID, $tourStartDate, $tourEndDate)
    {
        $data = array(
            'tourPackageID' => $tourPackageID,
            'tourStartDate' => $tourStartDate,
            'tourEndDate' => $tourEndDate,
            'status' => 'confirmed',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tour', $data);
        return $this->db->insert_id();
    }

    public function insert_booking($tourID, $contactID)
    {
        $data = array(
            'tourID' => $tourID,
            'contactID' => $contactID,
            'status' => 'confirmed',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('booking', $data);
    }
}




