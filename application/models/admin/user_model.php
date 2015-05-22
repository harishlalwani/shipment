<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 
{
	
 function login($username, $password)
 {
   $this -> db -> select('id, username, password, type');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
	function getuser($id = 0) {
            $this->db->select('id,username,type');
			$this->db->where('id <>', $id);
            $this->db->from('users');
           
            return $this->db->get()->result_array();
    }
}
?>