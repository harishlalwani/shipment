<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{		
		if($this->input->post("tracking_id"))
		{
			$this->load->model("tracking_model");
			$this->tracking_model->track();	
		}
		$this->db->select('city, id');
		$this->db->from('cities');
		$data = $this->db->get()->result_array();
		
		$this->bodyData['destinations'] = $data;
		$this->template->render('home');
	}
	
	public function about()
	{
		$this->template->render('about');
	}
	
	public function our_offices()
	{
		$this->template->render('office');
	}
	
	public function contact()
	{
		$this->template->render('contact');
	}
	
	public function register()
	{
		$this->template->render('register_shipment');
	}
	
	public function add_shipment()
	{
		if($this->input->post())
		{
			$this->load->model("admin/shipment_model");
			$this->shipment_model->add_shipment();
		}
		$tracking_id = $this->db->insert_id();
		$activity = "Customer added shippment $tracking_id ";
		$this->add_activity($activity);
		
		$this->template->render('add_shipment', true);
	}
	
	function add_activity($activity)
	{
		$userdata 			= $this->input->userdata('logged_in');
		if(!empty($userdata))
		$data['user_id'] 	= $userdata['id'];
		else
		$data['user_id']	= 0;
		$data['activity']   = $activity;
		$this->db->insert('activities', $data);
	}
	
	public function upsert_shipment() {
		$this->load->model("admin/shipment_model");
		$this->shipment_model->add_shipment();
		redirect('register');
	}
	
	public function view_pricing() {
		$this->db->select('*');
		$this->db->from('weights');
        $data = $this->db->get()->result_array();
		$this->bodyData['weights'] = $data;
		
		$this->db->select('*, GROUP_CONCAT(price order by weight_id) as prices, source.city as source , cities.city as destination ');
		$this->db->from('cities');
		$this->db->where('prices.destination_id' , $this->input->post('rt2-to'));
		$this->db->where('prices.source_id' , $this->input->post('rt2-from'));
		$this->db->group_by('prices.destination_id');
		$this->db->join('prices', 'prices.destination_id = cities.id');
		$this->db->join('cities as source', 'prices.source_id = source.id');
        $data = $this->db->get()->result_array();
		/* echo $this->db->last_query(); */
		/* print_r($data);exit; */
		$this->bodyData['destinations'] = $data;
		
				
		$this->template->render('pricing_table');
	}
	
	
}