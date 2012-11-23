<?php

class User_model extends CI_Model{

	function User_model()
	{
	parent::__construct();
	}
	function check_login($email,$password)
	{
		$sha1_password = sha1($password);
		$query_str = "Select u_id FROM users WHERE email = ? and password= ?";
		$result = $this->db->query ($query_str, array($email, $sha1_password));
	
	
		if ($result->num_rows() == 1)
		{
			return $result->row(0)->u_id;
		}
			else 
		{
			return false;
		}
	}
}
	
?>
