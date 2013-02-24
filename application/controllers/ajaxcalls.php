<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Ajaxcalls extends CI_Controller {
	
	public function loaddatocbo() {
		
		$strQry = $this->input->post('query');
		
		//$records = $this->db->query("SELECT b_id, name FROM barangay LIMIT 3")->result();
		$records = $this->db->query($strQry)->result();
		$jsn = json_encode($records);
		echo $jsn;
		
	}
}