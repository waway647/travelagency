<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Admin_model extends CI_Model {

	public function saveTourPackage($tourpackagedata)
	{
		$this->db->insert("tourpackage",$tourpackagedata);
		return $this->db->insert_id();
	}

	public function saveItinerary($itinerarydata)
	{
		$this->db->insert("itinerary",$itinerarydata);
	}

	public function get_edit($tourpackage_id)
	{
		//$assets = $this->db->get_where("tbl_asset", array('id' => $id))->result();
		$tourpackage = $this->db->get_where("tourpackage", array('tourpackage_id' => $tourpackage_id))->row();
		return $tourpackage;
	}

			public function updateTourPackage($tourpackage_id, $tourpackagedata)
			{
				$this->db->where('tourpackage_id', $tourpackage_id);
				$this->db->update('tourpackage', $tourpackagedata);
				return true;
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

	public function deleteTourPackage($deleteid)
	{
		// Start a transaction
		$this->db->trans_start();

		$this->db->delete('grouppassenger', array('groupID' => $deleteid));
		$this->db->delete('booking', array('tourID' => $deleteid));
		$this->db->delete('group', array('id' => $deleteid));
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
