<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Catalog  class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */

class Catalogs extends MY_Controller
{

	/**
	 * Show courses page and process course form
	 * @author Eric Mensah <ericmensah@codewrite.org>
	 * @return null
	 */
	public function index()
	{
	    	if ($this->input->post('id') 
	    	&& $this->input->post('action') === 'delete') {
	    	    
	    	    if($this->catalog->delete($this->input->post('id', true))){
	    	        
					$out = [
						'status' => true,
						'message' => 'Record successfully delete!',
					];
				} else {
					$out = [
						'status' => false,
						'message' => "Record couldn't be deleted!",
					];
				}
				
					$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
				
				return;
	    	}
		$data = null;
		$this->load->view('pages/catalogs/list', $data);
	}

	public function upload_media()
	{
	}

	public function add()
	{
		if ($this->input->post(null, true)) {
			$this->form_validation->set_rules('item', 'Product Name', 'required');
			$this->form_validation->set_rules('sku', 'Sku', 'required|is_unique[catalogs.sku]');
			$this->form_validation->set_rules('description', 'Description', 'required');
			//$this->form_validation->set_rules('avatar', 'Avatar', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			$record = $this->input->post(null, true);
			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				if ($this->catalog->add($record)) {
					$out = [
						'status' => true,
						'message' => 'Catalog successfully created!',
						'data' => $record,
					];
				} else {
					$message = $this->session->flashdata('error_message').$this->session->flashdata('warning_message');
					$out = [
						'status' => true,
						'message' => $message ? $message : "Catalog couldn't be created!",
					];
				}
			}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));

			return;
		}

		$this->load->view('pages/catalogs/add');
	}
	public function edit($id = null)
	{
		if ($this->input->post('id', true)) {
			$this->form_validation->set_rules('item', 'Product Name', 'required');
			//$this->form_validation->set_rules('sku', 'Sku', 'required|is_unique[catalogs.sku]');
			$this->form_validation->set_rules('description', 'Description', 'required');
			//$this->form_validation->set_rules('avatar', 'Avatar', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
			$record = $this->input->post(null, true);

			if ($this->catalog->change($record['id'], $record)) {
				$out = [
					'status' => true,
					'message' => 'Catalog successfully updated!',
					'data' => $record,
				];
			} else {
				$message = $this->session->flashdata('error_message');
				$out = [
					'status' => true,
					'message' => $message ? $message : "Record couldn't be updated!",
				];
			}
		}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));

			return;
		}

		$data = null;
		if ($id == null) show_404();
		$data['catalog'] = $this->catalog->getOne($id);

		$this->load->view('pages/catalogs/add', $data);
	}

	public function view($id = null)
	{
		$data = null;
		if ($id == null) show_404();
		$data['catalog'] = $this->catalog->getOne($id);

		$this->load->view('pages/catalogs/view', $data);
	}
}
