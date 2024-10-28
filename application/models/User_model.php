<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class User_model extends CI_Model {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
	}

    /* for M Y  P R O F I L E */
    public function getuserprofile($loginID)
    {
        $userinfo = $this->db->get_where("userregistration", array('loginID' => $loginID))->row();
        return $userinfo;
    }

            public function updateprofile($user_id, $userinfo)
            {
                $this->db->where('id', $user_id);
                $this->db->update('userregistration', $userinfo);
                return true;
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

    public function insert_booking($tourID, $contactID, $loginID)
    {
        // Generate a unique booking reference
        $bookingReference = $this->generate_unique_booking_reference();

        $data = array(
            'tourID' => $tourID,
            'contactID' => $contactID,
            'booking_reference' => $bookingReference,  // Add the booking reference
            'loginID' => $loginID,
            'status' => 'confirmed',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        // Insert booking into the database
        $this->db->insert('booking', $data);
    }

            private function generate_unique_booking_reference()
            {
                // Generate a 6-character random string of letters and numbers
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $referenceLength = 6;
                $bookingReference = '';

                // Create the random string
                for ($i = 0; $i < $referenceLength; $i++) {
                    $bookingReference .= $characters[rand(0, strlen($characters) - 1)];
                }

                // Ensure the booking reference is unique by checking the database
                while ($this->is_booking_reference_exists($bookingReference)) {
                    // If the reference exists, generate a new one
                    $bookingReference = '';
                    for ($i = 0; $i < $referenceLength; $i++) {
                        $bookingReference .= $characters[rand(0, strlen($characters) - 1)];
                    }
                }

                return $bookingReference;
            }

            private function is_booking_reference_exists($bookingReference)
            {
                // Check if the booking reference already exists in the database
                $this->db->where('booking_reference', $bookingReference);
                $query = $this->db->get('booking');

                return $query->num_rows() > 0;
            }
}




