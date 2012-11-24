<?php

class User_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	function check_login()
	{	
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->db->where('utype', '1');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
	
		if($query->num_rows == 1)
		{
			$row = $query->row();
			return true;
		}
			else 	
		{
			return false;
		}
	}
}
	
?>
