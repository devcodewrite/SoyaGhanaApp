<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Database class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */

class Database extends MY_Controller
{

	/**
	 * Show courses page and process course form
	 * @author Eric Mensah <ericmensah@codewrite.org>
	 * @return null
	 */
	public function groups()
	{
		$data = null;
		$this->load->view('pages/database/groups/groups', $data);
	}

	public function add_group()
	{
		if($this->input->post(null, true)){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('code', 'Code', 'required|is_unique[groups.code]');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('avatar', 'Avatar', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			$record = $this->input->post(null, true);

			if($this->group->add($record)){
				$out = [
					'status' => true, 
					'message' => 'Group successfully created!',
					'data' => $record,
				];
			}
			else {
				$message = $this->session->flashdata('error_message');
				$out = [
					'status' => true, 
					'message' => $message?$message:"Group couldn't be created!",
				];
			}
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));

			return;
		}

		$this->load->view('pages/database/groups/add_group');
	}
	public function edit_group($id = null)
	{
		if($this->input->post('id', true)){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('code', 'Code', 'required|is_unique[groups.code]');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('avatar', 'Avatar', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			$record = $this->input->post(null, true);

			if($this->group->change($record['id'], $record)){
				$out = [
					'status' => true, 
					'message' => 'Group successfully updated!',
					'data' => $record,
				];
			}
			else {
				$message = $this->session->flashdata('error_message');
				$out = [
					'status' => true, 
					'message' => $message?$message:"Record couldn't be updated!",
				];
			}
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));

			return;
		}

		$data = null;
		if($id == null) show_404();
		$data['group'] = $this->group->getOne($id);

		$this->load->view('pages/database/groups/add_group', $data);
	}

	public function roles()
	{
		$this->load->view('pages/database/roles/roles');
	}

	public function view_role($id = null)
	{
		$data = null;
		if($id == null) show_404();
		$data['role'] = $this->role->getOne($id);
		
		$this->load->view('pages/database/roles/view_role', $data);
	}

}
