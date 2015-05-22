<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Template {
	
	//Admin view folder
	private $admin_folder = "admin/";
	
	//CI var
	var $ci;
	
	//Views vars
	public $headerData = array();
	public $bodyData = array();
	public $footerData = array();
	
	//Title Vars
	public $page_title = "";
	
	//Message vars
	public $messages = array();
	
	function __construct()
	{
		//Load ci
		$this->ci =& get_instance();
	}
	
	//Set data
	public function render($name, $admin=false , $sign=false ){
		
		//Folder
		$folder = $admin ? $this->admin_folder : "";
		
		//Header, Main load and footer
		$toload = array(
			$folder."header",
			$folder.$name,
	    	$folder."footer"
		 );
		//change if signin
		if($sign)
		{
			$toload = array(
				$folder."sign_header",
				$folder.$name,
				$folder."sign_footer"
			 );
		}
		 
		 
		 
		 $data = $this->getRenderData();
		
		//Load each
		foreach($toload as $key => $view) $this->ci->load->view($view, $data[$key]);
	}
	
	//Load CSS
	public function loadCSS($files)
	{		
		//Add Key to array (array_merge fix)
		if(!isset($this->headerData['loadCSS'])) $this->headerData['loadCSS'] = array();
		
		//Add to array
		$this->headerData['loadCSS'] = array_merge($this->headerData['loadCSS'], (array) $files);
	}
	
	//Load JS
	public function loadJS($files)
	{
		//Add Key to array (array_merge fix)
		if(!isset($this->headerData['loadJS'])) $this->headerData['loadJS'] = array();
		
		//Add to array
		$this->headerData['loadJS'] = array_merge($this->headerData['loadJS'], (array) $files);
	}
	
	//Load Library
	public function load_library($libraries)
	{
		//Add each
		foreach((array) $libraries as $library)
		{
			
			//Validate
			if(!@$this->libraries[$library]) die("FAILED TO FIND LIBRARY: ".$library);
			
			//Add
			foreach($this->libraries[$library] as $type => $files)
			{				
				if($type=="js")      $this->loadJS($files);
				elseif($type=="css") $this->loadCSS($files);
			}
		}
	}
	
	//Messages function
	public function setMessage($type, $message){
		
		$type == "error" ? "danger" : strtolower($type);
		
		$allowed_types = array(
								"success",
								"info",
								"warn",
								"danger"
							   );
		if(!in_array($type, $allowed_types)) die("Bad type error type: ".$type);	
		
		//Create array type if not set
		if(!isset($this->messages[$type])) $this->messages[$type] = array();
		
		//Append
		$this->messages[$type][] = $message;	
	}
	
	//Add errors
	public function add_errors($errors)
	{
		//Format if array
		if(is_array($errors)) $errors = listify($errors);
		
		//Add
		$this->setMessage("danger", $errors);
	}
	
	//Return render array
	public function getRenderData(){	
	
		//Return array of all data	
		return array($this->headerData, $this->bodyData='u', $this->footerData);
	}
	
	
}






?>