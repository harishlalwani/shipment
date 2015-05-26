<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
	   parent::__construct();
	   $this->load->library('session');
	   $userdata = $this->session->userdata('logged_in');
	   $allowed  = array('index', 'check_database', 'login'); 
	   
	   // Check that the user is logged in
        if (empty($userdata)) {
            // Prevent infinite loop by checking that this isn't the login controller     
		
            if (!in_array($this->router->method, $allowed)) 
            {                        
                redirect(base_url()."admin");
            }
        }
	}
	public function index()
	{		
		$userdata = $this->session->userdata('logged_in');
	   
	   if(empty($userdata))
	   {
		 redirect('admin/login');
	   }
	   else
	   {
		 redirect('admin/dashboard', 'refresh');
		}
	}
	
	public function login()
	{
		//This method will have the credentials validation
	   $this->load->library('form_validation');
	 
	   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	 
		if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 $this->template->render('sign', true, true);
	   }
	   else
	   {
		 //Go to private area
		 redirect('admin/dashboard', 'refresh');
	   }
	   
	}
	
	 function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   redirect('admin/index', 'refresh');
	}
	
	public function dashboard()
	{	
		$this->template->render('dashboard', true);
	}
	
	public function check_database()
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');
	   $password = $this->input->post('password');
	 
	   $this->load->model("admin/user_model");
	   //query the database
	   $result = $this->user_model->login($username, $password);
	   
	   if($result)
	   {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'id' 		=> $row->id,
			 'username' => $row->username,
			 'type' 	=> $row->type
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
		 }
		 return true;
	   }
	   else
	   {
		 $this->load->library('form_validation');
		 $this->form_validation->set_message('check_database', 'Invalid username or password');
		 return false;
	   }
	 }
	
	public function add_shipment()
	{
		if($this->input->post())
		{
		
			$this->load->model("admin/shipment_model");
			
		}
		
		
		$this->template->render('add_shipment', true);
	}
	
	public function add_shipment_status()
	{
		if($this->input->post())
		{
			$this->load->model("admin/shipment_model");
			$this->template->messages['error'] = $this->shipment_model->add_shipment_status();
			$tracking_id = $this->input->post("tracking_id", true);
		
			$locs2 	 = $this->input->post("loc2", true);
			$activity = "updated shipment $tracking_id to $locs2";
			$this->add_activity($activity);
			redirect("admin/add_shipment_status");
		
		}
		
		$this->template->render('add_shipment_status', true);
	}
	
	public function view_users() {
		/* $this->load->model('admin/user_model');
		$userdata = $this->session->userdata('logged_in');
		$data = $this->user_model->getuser($userdata['id']); */
		//$this->template->write_view('user_list', json_encode($data)); 
		
		$this->template->render('users_list', true);
	}
	
	public function getusers() {
		$this->load->model('admin/user_model');
		$userdata = $this->session->userdata('logged_in');
		//print_r($this->user_model->getuser($userdata['id']));
		$data = $this->user_model->getuser($userdata['id']);
		
		foreach($data as $key => $value)
		{
			$value[] = '<a href="edit_user/'.$value['id'].'" > Edit </a> &nbsp <a href="delete_user/'.$value['id'].'" > Delete </a>'; 
			$d[] = array_values($value);
		}
		
		echo json_encode(array("aaData" => $d));
		exit;
	}
	
	public function edit_user($id) {
		$this->db->select('id,username,type');
		$this->db->where('id', $id);
        $this->db->from('users');
        $data = $this->db->get()->result_array();
		$this->bodyData['user'] = $data[0];
		$this->template->render('user_form', true);
	}
	
	public function add_user() {
		$this->template->render('user_form', true);
	}
	
	public function upsert_user() {
		$id					= $this->input->post('id');
		$data['username'] 	= $this->input->post('username');
		$data['password'] 	= MD5($this->input->post('password'));
		$data['type'] 		= $this->input->post('type');
		if($id != '') {
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			$this->session->set_flashdata('message_name', 'User details has been updated successful!');
		}
		else {
			$this->db->insert('users', $data);
			$this->session->set_flashdata('message_name', 'User details has been added successfully!');
		}
		redirect('admin/view_users');
	}
	
	public function delete_user($id) {
		$this->db->where('id', $id);
		$this->db->delete('users');
		$this->session->set_flashdata('message_name', 'User deleted successfully!');
		$this->template->render('users_list', true);
	}
	
	public function upsert_shipment() {
		//$id							= $this->input->post('id');
		/* $data['tracking_id']		= $this->input->post('tracking_id');
		$data['fullname'] 			= $this->input->post('fullname');
		$data['address'] 			= $this->input->post('address');
		$data['phone'] 				= $this->input->post('phone');
		$data['email'] 				= $this->input->post('email');
		$data['receiver_name'] 		= $this->input->post('receiver_name');
		$data['receiver_address'] 	= $this->input->post('receiver_address');
		$data['city'] 				= $this->input->post('city');
		$data['receiver_phone'] 	= $this->input->post('receiver_phone');
		$data['receiver_instruction'] 	= $this->input->post('receiver_instruction');
		$data['weight'] 			= $this->input->post('weight');
		$data['item'] 				= $this->input->post('item');
		$data['status'] 			= $this->input->post('status');
		$data['created'] 			= strtotime(date('Y-m-d H:i:s'));
		$data['created_by'] 		= $this->session->userdata('username');
		$data['last_updated'] 		= 0; */
		/* if($id != '') {
			$this->db->where('id', $id);
			$this->db->update('shipments', $data);
			$this->session->set_flashdata('message_name', 'Shipment details has been updated successful!');
		}
		else {
			
			//$this->db->insert('users', $data);
			$this->session->set_flashdata('message_name', 'Shipment details has been added successfully!');
		} */
		$this->load->model("admin/shipment_model");
		
		
		$res=$this->shipment_model->add_shipment();
			
			$tracking_id = $res;
			$activity = "added shipment $tracking_id ";
			if($this->input->post('id'))
			$activity = "updated shipment $tracking_id ";
			$this->add_activity($activity);
		redirect('admin/view_shipments');
	}
	
	public function view_shipments() {
		$this->load->model('admin/shipment_model');
		/*$userdata = $this->session->userdata('logged_in');
		$data = $this->user_model->getuser($userdata['id']); */
		//$this->template->write_view('user_list', json_encode($data)); 
		$data = $this->shipment_model->getshipment();
		//print_r($data);
		//echo $this->db->last_query();exit;
		foreach($data as $key => $value)
		{
			$userdata=$this->session->userdata('logged_in');
			
			$value['status 1'] = '';
			$value['status 2'] = '';
			if($value['locations'] != '')
			{
				$locationsArr = explode(',',$value['locations']);
				$value['status 1'] = $locationsArr[0];
				$value['status 2'] = $locationsArr[1];
			}
			if($userdata['type']=='su') { 
			$value[] = '<a href="edit_shipment/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO EDIT!\');"> Edit </a> &nbsp <a href="delete_shipment/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO DELETE!\');"> Delete </a>';
			}
			unset($value['locations']);
			array_shift($value);
			$d[] = array_values($value);
		}
		$this->bodyData['shipment'] = $d;
		$this->template->render('shipment_list', true);
	}
	
	//unused func
	public function getshipments() {
		$this->load->model('admin/shipment_model');
		$data = $this->shipment_model->getshipment();
		//print_r($data);
		//echo $this->db->last_query();exit;
		foreach($data as $key => $value)
		{
			$userdata=$this->session->userdata('logged_in');
			
			$value['status 1'] = '';
			$value['status 2'] = '';
			if($value['locations'] != '')
			{
				$locationsArr = explode(',',$value['locations']);
				$value['status 1'] = $locationsArr[0];
				$value['status 2'] = $locationsArr[1];
			}
			if($userdata['type']=='su') { 
			$value[] = '<a href="edit_shipment/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO EDIT!\');"> Edit </a> &nbsp <a href="delete_shipment/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO DELETE!\');"> Delete </a>';
			}
			unset($value['locations']);
			array_shift($value);
			$d[] = array_values($value);
		}
		
		echo json_encode(array("aaData" => $d));
		exit;
	}
	
	public function edit_shipment($id) {
		$this->load->model('admin/shipment_model');
		$data = $this->shipment_model->getshipment($id);
		$this->bodyData['shipment'] = $data[0];
		$this->template->render('add_shipment', true);
	}
	
	public function view_pricing() {
		$this->db->select('*');
		$this->db->from('weights');
        $data = $this->db->get()->result_array();
		$this->bodyData['weights'] = $data;
		
		/* $this->db->select('*, GROUP_CONCAT(price order by weight_id) as prices, source.destination as source ');
		$this->db->from('destinations');
		$this->db->group_by('prices.destination_id');
		$this->db->join('prices', 'prices.destination_id = destinations.id');
		$this->db->join('destinations as source', 'prices.source_id = source.id'); */
		
		$this->db->select('*, GROUP_CONCAT(price order by weight_id) as prices, source.city as source , cities.city as destination ');
		$this->db->from('cities');
		$this->db->group_by('prices.destination_id');
		$this->db->join('prices', 'prices.destination_id = cities.id');
		$this->db->join('cities as source', 'prices.source_id = source.id');
        $data = $this->db->get()->result_array();
		//echo $this->db->last_query();
		//print_r($data);exit;
		$this->bodyData['destinations'] = $data;
		
				
		$this->template->render('pricing_table', true);
	}
	
	public function view_all_destinations() {
		$this->db->select('*');
		$this->db->from('weights');
        $data = $this->db->get()->result_array();
		$this->bodyData['weights'] = $data;
		
		$this->db->select('prices.*, weights.weight, price as prices, source.city as source , cities.city as destination ');
		$this->db->from('cities');
		//$this->db->group_by('prices.destination_id');
		$this->db->join('prices', 'prices.destination_id = cities.id');
		$this->db->join('cities as source', 'prices.source_id = source.id');
		$this->db->join('weights as weights', 'prices.weight_id = weights.id');
        $data = $this->db->get()->result_array();
		//echo $this->db->last_query();
		//print_r($data);exit;
		$this->bodyData['destinations'] = $data;
		
				
		$this->template->render('view_all_destinations', true);
	}
	
	
	
	public function view_weights() {
		$this->db->select('*');
		$this->db->from('weights');
        $data = $this->db->get()->result_array();
		$this->bodyData['weights'] = $data;
		
		$this->template->render('weight_form', true);
	}
	
	public function add_weight() {
		$weights = $this->input->post('weight');
		$data = array();
		foreach($weights as $value)
		{
			$data[]['weight'] = $value;
		}
		
		$this->db->insert_batch('weights', $data);
        $this->session->set_flashdata('message_name', "New weight categories added successfully");
		redirect('admin/view_weights');
		
	}
	
	public function add_destination() {
		$this->db->select('*');
		$this->db->from('weights');
        $data = $this->db->get()->result_array();
		$this->bodyData['weights'] = $data;
		$this->db->select('*');
		$this->db->from('cities');
        $data = $this->db->get()->result_array();
		$this->bodyData['cities'] = $data;
		$this->template->render('add_destination', true);
		
	}
	
	public function save_destination() {
		$this->db->select('*');
		$this->db->from('weights');
        $weights = $this->db->get()->result_array();
		
		$idDes = $this->input->post('destination');
		$idSor = $this->input->post('source');
		$data = array();
		foreach($weights as $value)
		{
			$data[] = array ( 'destination_id' => $idDes, 'source_id' => $idSor,'weight_id'=> $value['id'], 'price' => $this->input->post($value['id']));
		}
		
		$this->db->insert_batch('prices', $data);
        $this->session->set_flashdata('message_name', "Destination added successfully");
		redirect('admin/view_pricing');
	}
	
	public function add_activity($activity)
	{
		$userdata 			= $this->session->userdata('logged_in');
		$data['user_id'] 	= $userdata['id'];
		$data['activity']   = $activity;
		$this->db->insert('activities', $data);
		
	}
	
	public function view_activity()
	{
		$this->template->render('list_activity',true);
	}
	
	public function get_activities()
	{
		$this->db->select('users.username, activities.activity');
		$this->db->join('users', 'users.id = activities.user_id','left');
		$this->db->from('activities');
		$data =  $this->db->get()->result_array();
		
		$d = array();
		foreach($data as $key => $value)
		{
			$d[] = array_values($value);
		}
		
		echo json_encode(array("aaData" => $d));
		exit;
	}
	
	public function edit_destination_price($id) {
		$this->db->select('*');
		$this->db->from('weights');
        $data = $this->db->get()->result_array();
		$this->bodyData['weights'] = $data;
		
		$this->db->select('prices.*, weights.weight, price as prices, source.city as source , cities.city as destination ');
		$this->db->from('cities');
		//$this->db->group_by('prices.destination_id');
		$this->db->join('prices', 'prices.destination_id = cities.id');
		$this->db->where('prices.id', $id);
		$this->db->join('cities as source', 'prices.source_id = source.id');
		$this->db->join('weights as weights', 'prices.weight_id = weights.id');
        $data = $this->db->get()->result_array();
		//echo $this->db->last_query();
		//print_r($data);exit;
		$this->bodyData = $data[0];
		
				
		$this->template->render('edit_destination_price', true);
	}
	
	public function save_price() {
		$idDes = $this->input->post('destination_id');
		$idSor = $this->input->post('source_id');
		$weight = $this->input->post('weight_id');
		$data = array();
		$data = array (  'price' => $this->input->post('price'));
		$this->db->where('destination_id', $idDes);
		$this->db->where('source_id', $idSor);
		$this->db->where('weight_id', $weight);
		$this->db->update('prices', $data);
		$this->db->last_query();
        $this->session->set_flashdata('message_name', "Price updated successfully");
		redirect('admin/view_all_destinations');
	}
	
	public function view_all_shipment_status() {
		$this->template->render('view_all_shipment_status', true);
	}
	
	public function get_shipment_status()
	{
		$this->db->select('shipments.tracking_id, Group_concat(shipment_statuses.location order by shipment_statuses.id) as location ,Group_concat(shipment_statuses.id SEPARATOR "-") as id');
		$this->db->join('shipment_statuses', 'shipment_statuses.tracking_id = shipments.tracking_id');
		$this->db->group_by('shipments.tracking_id');
		//$this->db->where('shipments.tracking_id != ""');
		$this->db->from('shipments');
		$this->db->order_by('shipment_statuses.created');
		$data =  $this->db->get()->result_array();
		$userdata = $this->session->userdata('logged_in');
		$d = array();
		foreach($data as $key => $value)
		{
			
			//print_r($value['location']);
			
			$r = explode(",", $value['location']);
			$value['location 1'] = $r[0];
			$value['location 2'] = $r[1]; 
			
			if($userdata['type']=='su') { 
			$value[] = '<a href="edit_shipment_status/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO EDIT!\');"> Edit </a> &nbsp <a href="delete_shipment/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO DELETE!\');"> Delete </a>';
			}
			else
			 { 
			$value[] = '<a href="edit_shipment_status/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO EDIT!\');"> Edit </a> ';
			}
			unset($value['id']);
			unset($value['location']);
			$d[] = array_values($value);
			
		}
		//print_r($d);
		echo json_encode(array("aaData" => $d));
		exit;
	}
	
	public function edit_shipment_status($ids)
	{
		$this->db->select('shipments.tracking_id, Group_concat(shipment_statuses.location order by shipment_statuses.id) as location ,Group_concat(shipment_statuses.id) as id');
		$this->db->join('shipment_statuses', 'shipment_statuses.tracking_id = shipments.tracking_id');
		$this->db->group_by('shipments.tracking_id');
		//$this->db->where('shipments.tracking_id != ""');
		$r = explode("-", $ids);
		$ids = implode(",", $r);
		$this->db->from('shipments');
		$this->db->where("shipment_statuses.id IN ($ids)" );
		$this->db->order_by('shipment_statuses.created');
		$data =  $this->db->get()->result_array();
		$this->bodyData = $data[0];
		
				
		$this->template->render('edit_shipment_status', true);
		
		//print_r($this->bodyData);exit;
	}
	
	public function delete_shipment($id) {
		$id= str_replace("-",",",$id);
		$this->db->where("id in($id)");
		$this->db->delete('shipment_statuses');
		$this->session->set_flashdata('message_name', 'Status deleted successfully!');
		redirect('admin/view_all_shipment_status');
	}
	
	


}