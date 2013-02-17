<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	private $title;
	private $_mConfig;
	
	public function __construct() {
		
		parent::__construct();
		
		// initiates values on some variables
		$this->title = 'Home Page';
		
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
		$this->sessionbrowser->getInfo($params);
		$arr = $this->sessionbrowser->mData;
		
		//call_debug($arr);
		
		// authorizes access
		authUser(array('section' => 'admin/loginad', 'sessvar' => array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname')));
				
		// sets default prefs
		$this->_mConfig = array('full_tag_open' => '<div class="pagination">', 'full_tag_close' => '</div>', 'first_link' => 'First', 'last_link' => 'Last', 'next_link' => '»', 'prev_link' => '«');
	}
	
	public function index() {
		
		$data['title'] = $this->title;
		$data['main_content'] = 'home/home_view';
		$this->load->view('includes/template', $data);

	}
	
	public function test() {
		
		/*
		$links = preg_split('/\//', uri_string());
		$links2 = preg_split('/\//', "");
		
		var_dump($links);
		var_dump($links2);
		
		echo ">>> " . $this->uri->segment(1);
		*/
		
		$str= '<div class="dataTables_paginate paging_bootstrap pagination"><ul>&nbsp;<a href="http://localhost/velky/master/barangay/section/" class="ext_disabled">&lt;</a><li><a href="http://localhost/velky/master/barangay/section/" class="ext_disabled">1</a></li><li class="disabled">2</li><li><a href="http://localhost/velky/master/barangay/section/20" class="ext_disabled">3</a></li><li><a href="http://localhost/velky/master/barangay/section/30" class="ext_disabled">4</a></li><li class="next"><a href="http://localhost/velky/master/barangay/section/20" class="ext_disabled">Next</a></li>&nbsp;<a href="http://localhost/velky/master/barangay/section/80" class="ext_disabled">Last �</a></ul></div>';
		$pattern = '/<li class="disabled"\>([\d])+<\/li>/';
		$toreplace = '<li class="disabled"\><a href="#">$1</a></li>';
		
		$result = preg_replace($pattern, $toreplace, $str);
		
		call_debug($result);
	}
	
}