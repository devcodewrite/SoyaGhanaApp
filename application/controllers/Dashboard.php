<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Dashboard class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Dashboard extends MY_Controller {

	 public function index()
	 {
		
		if($this->auth->getUser())
			if($this->auth->getRole()->title === 'Member'){
				$this->load->view("pages/members/e-market");
			}else {
				$this->load->view("pages/dashboard/administrator");
			}
	 }
}
