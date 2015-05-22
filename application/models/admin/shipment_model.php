<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipment_model extends CI_Model 
{
	
	public function add_shipment() 
	{
		//Insert
		$insert['tracking_id'] = $this->get_tracking_code($this->input->post("city", true));
		$insert['full_name'] = $this->input->post("fullname", true);
		$insert['address'] = $this->input->post("address", true);
		$insert['phone'] = $this->input->post("phone", true);
		$insert['email'] = $this->input->post("email", true);
		
		$insert['receiver_name'] = $this->input->post("receiver_name", true);
		$insert['receiver_address'] = $this->input->post("receiver_address", true);
		$insert['city'] = $this->input->post("city", true);
		$insert['receiver_phone'] = $this->input->post("receiver_phone", true);
		$insert['receiver_instructions'] = Trim($this->input->post("receiver_instruction", true));
		$insert['weight'] = $this->input->post("weight", true);
		$insert['items'] = $this->input->post("items", true);
		$insert['status'] = 1;
		$insert['created'] = time();
		$insert['created_by'] = 1; //Admin id here
		$id = $this->input->post('id');
		
		
		
		if($id != '') {
			unset($insert['tracking_id']);
			$this->db->where('id', $id);
			$this->db->update('shipments', $insert);
			
			$res = $this->getshipment($id);
			$insert['tracking_id'] = $res[0]['tracking_id']; 
			$this->session->set_flashdata('message_name', "Shipment updated, Tracking ID: ".$insert['tracking_id']);
			
		}
		else {
			$this->db->insert("shipments", $insert);
			$this->session->set_flashdata('message_name', "Shipment added, Tracking ID: ".$insert['tracking_id']);
			
		}
		return $insert['tracking_id'];
		//redirect("admin/add_shipment");
	}
	
	public function add_shipment_status()
	{
		$tracking_id = $this->input->post("tracking_id", true);
		$locs[]		 = $this->input->post("loc1", true);
		$locs[] 	 = $this->input->post("loc2", true);
		
		//Check tracking ID
		if(!$this->db->get_where("shipments", array("tracking_id" => $tracking_id), 1)->num_rows()) return "Unknown Tracking ID";
		
		//Add to DB
		foreach($locs as $loc)
		{
			if(!$loc)continue;
			
			$insert['tracking_id'] = $tracking_id;
			$insert['location']    = $loc;
			$insert['created']     = time();
			$insert['created_by']  = 1; //Admin id here
			
			$this->db->insert("shipment_statuses", $insert);			
		}
		
		$this->session->set_flashdata("success", "Shipment status updated");
			
	}
	
	private function get_tracking_code($city)
	{
		
		//Get city code
		$city_code = strtoupper(substr($city, 0, 3));
		
		//Random number code		
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		
		$code = $city_code.$randomString;
		
		//Check DB
		if($this->db->get_where("shipments", array("tracking_id" => $code), 1)->num_rows()) $code = $this->get_tracking_code($city);
		
		return $code;		
	}
	
	function getshipment($id = 0) {
		
		if($id > 0){
			$this->db->select('shipments.*');
			$this->db->where('id =', $id);
		}
		else{
			$this->db->group_by('shipments.id');
			$this->db->join('shipment_statuses', 'shipment_statuses.tracking_id = shipments.tracking_id','left');
			$this->db->select('shipments.id,shipments.tracking_id,full_name,address,receiver_name,receiver_address,weight, GROUP_CONCAT(location Order by shipment_statuses.id DESC) as locations');

		}
		$this->db->from('shipments');
		return $this->db->get()->result_array();
    }
	
	
	
	
}






?>