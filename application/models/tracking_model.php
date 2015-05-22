<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tracking_model extends CI_Model 
{
	
	public function track()
	{
		sleep(2);
		$tracking_id = $this->input->post("tracking_id", true);
		
		$statuses = $this->db->select("location")->get_where("shipment_statuses", array("tracking_id" => $tracking_id));
		
		$return = array("result" => 0);
		
		if($statuses->num_rows()) $return = array("result" => 1, "locations" => $statuses->result());
		
		echo json_encode($return);
		exit;		
	}
	
	
	
	
}






?>