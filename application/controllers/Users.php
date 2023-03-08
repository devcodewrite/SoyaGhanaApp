<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Users class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */

class Users extends MY_Controller
{

	public function index()
	{
		$this->load->view('pages/users/list');
	}

	public function view($id = null)
	{

		if ($this->input->post('id')) {
			$this->form_validation->set_rules('email', 'Email Address', 'valid_email');

			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				$record = $this->input->post(null, true);

				if ($this->user->change($record['id'], $record)) {
					$out = [
						'status' => true,
						'message' => "User profile updated successfully.",
						'data' => $record,
					];
				}
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
			return;
		}

		
		$user = $this->user->getOne($id);
		if (!$user) show_404();

		$data['user'] = $user;
		$this->load->view('pages/users/user', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('phone', 'Phone number', 'required');
			$this->form_validation->set_rules('email', 'Email Address', 'valid_email');

			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				$record = $this->input->post(null, true);

				if ($this->user->change($record['id'], $record)) {
					$out = [
						'status' => true,
						'message' => "User record updated successfully.",
						'data' => $record,
					];
				}
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
			return;
		}

		$this->load->view('templates/head');
		$this->load->view('templates/header');
		$this->load->view('pages/users/new_user');
		$this->load->view('templates/footer');
	}

	/**
	 * Update account perms
	 */
	public function change_perms()
	{

		if ($this->input->post()) {

			$this->form_validation->set_rules('old_password', 'Old password', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error_message', validation_errors('', ''));
				redirect('account/profile');
			}
			//echo password_hash('pass', PASSWORD_DEFAULT); die();
			if (password_verify(
				$this->input->post('old_password'),
				$this->auth->getUser()->password
			) === FALSE) {
				$this->session->set_flashdata('error_message', 'Invalid old password!');
				redirect('account/profile');
			}
			$pass = $this->input->post('new_password', true);
			$data = [
				'password' => password_hash($pass, PASSWORD_DEFAULT),
			];

			if ($this->user->update($this->auth->getUserId(), $data)) {
				$this->session->set_flashdata('success_message', 'Password changed successfully!');
				redirect('account/profile', '');
			} else {
				$this->session->set_flashdata('error_message', "Changes couldn't be saved!");
				redirect('account/profile');
			}
		}

		show_404();
	}
}
