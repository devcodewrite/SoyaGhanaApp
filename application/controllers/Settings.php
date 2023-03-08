<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Settings class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Settings extends MY_Controller {

	public function permissions()
	{
	   $this->load->view('templates/head');
	   $this->load->view('templates/header');
	   $this->load->view('pages/settings/perms');
	   $this->load->view('templates/footer');
	}

	public function system()
	{
		if($this->input->post()){
			$data = $this->input->post(NULL, true);

			if(empty($data['value'])){
				$out = $data;
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
				return;
			}
			if($this->setting->setValue($data['name'], $data['value'])){
				$out = $data;
				
				  $this->output
					->set_content_type('application/json')
					->set_output(json_encode($out));
				return;
			}
		}
	   $this->load->view('pages/settings/system');
	}
}
