<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Ajaxcalls extends CI_Controller {
	
	public function loaddatocbo() {
		
		$strQry = $this->input->post('query');
		
		//$records = $this->db->query("SELECT b_id, name FROM barangay LIMIT 3")->result();
		$records = $this->db->query($strQry)->result();
		$jsn = json_encode($records);
		echo $jsn;
		
	}
	
	public function filteredreport() {
		$from = $this->input->post('dateFrom');
		$to = $this->input->post('dateTo');
		$brgy = $this->input->post('barangay');
		$accidenttype = $this->input->post('accidenttype');
		$strQry = '';
		$criteria = '';
		
		if($this->input->post('dateFrom') && $this->input->post('dateTo'))
			$criteria .= sprintf(" a.stamp BETWEEN '%s' AND '%s'", $from, $to);
		
		
		if($this->input->post('barangay'))
			$criteria .= (strlen($criteria) > 0) ? sprintf(" AND b.b_id=%d",$brgy) :  sprintf(" b.b_id=%d",$brgy);
		
		if($this->input->post('accidenttype'))
			$criteria .= (strlen($criteria) > 0) ? sprintf(" AND at.at_id=%d", $accidenttype) : sprintf(" at.at_id=%d", $accidenttype);
		

		$criteria = (strlen($criteria) > 0) ? sprintf(" WHERE %s", $criteria) : '';
		
		// default
		$strQry .= "SELECT a.a_id, at.name AS accident, b.name AS barangay, a.acdntdate, a.stamp, DAYNAME(a.stamp) AS `day` FROM ((accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id) LEFT JOIN barangay b ON a.brgy=b.b_id)";
		
		$strQry = $strQry . $criteria;

		
		$records = $this->db->query($strQry)->result();
		$data['accidents'] = $records;
		//$records = json_encode($records);
		
		//echo $records;
		//echo $strQry;
		//echo $criteria;

		$this->load->view('admin/accidents/ajx_filtered_reports', $data);
		
	}
	
	public function report() {
		
		$strQuery = sprintf("SELECT COUNT(a.acdnttype) AS `count`, at.at_id, at.name, DATE(a.stamp) AS `Date` FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE ((DATE(a.stamp) BETWEEN '2013-01-01' AND '2013-01-04') AND at.at_id IN (SELECT a.acdnttype FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE DATE(a.stamp) BETWEEN '2013-01-01' AND '2013-01-03' GROUP BY a.acdnttype ORDER BY COUNT(a.acdnttype) DESC)) GROUP BY DATE(a.stamp), a.acdnttype ORDER BY at.name DESC");
		
		$record = $this->db->query($strQuery)->result();
		
		$record = json_encode($record);
		
		echo $record;
	}
}