<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Select2json class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Select2json extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check if user is logged in

        if($this->auth->isLoggedIn()){

            // check if use has the right permission to access route
        }
        else {
           show_error("Unauthorized Access", 401);
        }
    }

	public function members()
	{
		$search = trim(urldecode($this->input->get('term', true)));
		if(empty($search)) {
			echo json_encode([
				'results' => [],
				'pagination' => false,
			  ]);
			  return;
		}
		$where = [];

		$fields = ['memberId', 'name', 'thumb_photo_url'];
		$search_cols = ['name', 'memberId'];

		$query = $this->member->search($search,$search_cols,$fields,false, $where);
		
		$data = [];
		foreach($query as $row) {
			array_push($data,[ 'id' => $row->memberId,
								'text' => "$row->name",
								'avatar' => $row->thumb_photo_url
							]);
		}

		$out = [
			'results' => $data,
			'pagination' => false,
		  ];
	
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}


	public function districts()
	{
		$search = trim(urldecode($this->input->get('term', true)));
		if(empty($search)) {
			echo json_encode([
				'results' => [],
				'pagination' => false,
			  ]);
			  return;
		}
		$where = [];

		$fields = ['id', 'name', 'category'];
		$search_cols = ['name', 'category'];

		$query = $this->district->search($search,$search_cols,$fields,false, $where);
		
		$data = [];
		foreach($query as $row) {
		    
			array_push($data,[ 'id' => $row->id,
								'text' => "$row->name $row->category",
							]);
		}

		$out = [
			'results' => $data,
			'pagination' => false,
		  ];
	
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}
	
		public function locales()
	{
		$search = trim(urldecode($this->input->get('term', true)));
		if(empty($search)) {
			echo json_encode([
				'results' => [],
				'pagination' => false,
			  ]);
			  return;
		}
		$where = [];

		$fields = ['id', 'name', 'district_id'];
		$search_cols = ['name'];

		$query = $this->locale->search($search,$search_cols,$fields,false, $where);
		
		$data = [];
	
		foreach($query as $row) {
			array_push($data,[ 'id' => $row->id,
								'text' => "$row->name  - ".($row->district?$row->district->name.' '.$row->district->category:'Unknown district'),
							]);
		}

		$out = [
			'results' => $data,
			'pagination' => false,
		  ];
	
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}

}
