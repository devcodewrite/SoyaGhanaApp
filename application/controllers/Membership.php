<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Membership class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */

class Membership extends MY_Controller
{

	/**
	 * Show dashboard page
	 * @author Eric Mensah <ericmensah@codewrite.org>
	 * @return null
	 */
	public function registration()
	{
		$this->load->view('pages/members/registration');
	}

	public function unapproved()
	{
		$this->load->view('pages/members/unapproved');
	}
	public function e_market()
	{
		$this->load->view('pages/members/e-market');
	}
	public function add()
	{
		$data = [];
		if ($this->input->post(null)) {
			$this->form_validation->set_rules('name', 'Full Name', 'required');
			$this->form_validation->set_rules('sex', 'Sex', 'required');
			$this->form_validation->set_rules('refererId', 'Referer ID', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('phone', 'Phone number', 'required|is_unique[members.phone]');
			$this->form_validation->set_rules('bio', 'Biography', 'required');
			$this->form_validation->set_rules('group_ids[]', 'Membership Groups', 'required');
			if(!$this->input->post('region_id') && !$this->input->post('locale_name')){
				$this->form_validation->set_rules('locale_id', 'Location', 'required');
			}
			$this->form_validation->set_rules('id_card_type', 'ID card type', 'required');
			$this->form_validation->set_rules('national_id', 'ID Card Number', 'required|is_unique[members.national_id]');

			if ($this->input->post('type', true) === 'corporate') {
				$this->form_validation->set_rules('company_size', 'Company Size', 'required');
				$this->form_validation->set_rules('company', 'Business Name', 'required');
				$this->form_validation->set_rules('business_descriptor', 'Short discriptor', 'required');
				$this->form_validation->set_rules('business_type', 'Business Type', 'required');
			
				//$this->form_validation->set_rules('business_email', 'Business Email', 'required');
				$this->form_validation->set_rules('business_contact', 'Business Contact', 'required');
			}

			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				$record = $this->input->post(NULL, true);
				if($record['type'] === 'personal'){
					unset($record['company_size']);
				}

				$record['socials'] = json_encode([
					'website' => (isset($record['social_website']) ? $record['social_website'] : null),
					'facebook' => (isset($record['social_facebook']) ? $record['social_facebook'] : null),
					'twitter' => (isset($record['social_twitter']) ? $record['social_twitter'] : null),
					'linkedin' => (isset($record['social_linkedin']) ? $record['social_linkedin'] : null),
				]);

				if ($this->member->getCount(['memberId' => $record['refererId']]) == 0) {
					$out = [
						'status' => false,
						'message' => 'Referer ID is Invalid',
					];
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode($out));
					return;
				}
				$record['memberId'] = $this->setting->getValue('org_prefix', 'SBA') . '-' . date('my') . random_int(100000, 999999);

				if ($this->member->add($record)) {
					$referer = $this->member->getByMemberId($record['refererId'], [
						'id', 'name', 'phone','memberId'
					]);
					$member = $this->member->getByMemberId($record['memberId'], ['id','phone', 'name', 'memberId']);
					
					$sms_data = [];
					$link  = site_url('members/view/'.$member->id);
					array_push($sms_data, [
						'phone' => $referer->phone,
						'msg' => "Hi, $member->name ({$member->memberId}) has registered with your Member ID:{$referer->memberId} as a reference. Visit $link to validate and approve.\nPowered by CODEWRITE",
					]);

					if (sizeof($sms_data) > $this->setting->getValue('sms_units', 0)) {
						$this->session->set_flashdata('error_message', "You have insufficient sms units!");
					}else {
						$this->sms->sendPersonalised('{$msg}', $sms_data);
					}

					$out = [
						'status' => true,
						'message' => 'Member successfully created!',
						'data' => (object)array_merge(
							(array)$record,
							(array)$member,
							['referer' => $referer]
						),
					];
				} else {
					$out = [
						'status' => false,
						'message' => $this->session->flashdata('error_message').$this->session->flashdata('warning_message'),
					];
				}
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));

			return;
		}
		$this->load->view('pages/members/registration', $data);
	}

	public function edit($id = null)
	{
		$data = [];
		
		if ($this->input->post('id', true)) {

			$record = $this->input->post(NULL, true);
			if($record['phone']){
			    $this->form_validation->set_rules('phone', 'Phone number', 'required');
			}
			
			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
				$this->output
    				->set_content_type('application/json')
    				->set_output(json_encode($out));
    				
				return;
			}
			
			$record['socials'] = json_encode([
				'website' => (isset($record['social_website']) ? $record['social_website'] : null),
				'facebook' => (isset($record['social_facebook']) ? $record['social_facebook'] : null),
				'twitter' => (isset($record['social_twitter']) ? $record['social_twitter'] : null),
				'linkedin' => (isset($record['social_linkedin']) ? $record['social_linkedin'] : null),
			]);
			if ($this->member->change($record['id'], $record)) {

				$out = [
					'status' => true,
					'message' => 'Member successfully created!',
				];
			} else {
				$out = [
					'status' => false,
					'message' => $this->session->flashdata('error_message').$this->session->flashdata('warning_message'),
				];
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));

			return;
		}
		$page = $this->input->get('page', true);
		$page = $page ? $page : 'overview';
		$data = [];
		$member = $this->member->getOne($id);

		if (!$member) show_404();

		$data['member'] = $member;

		$data['rmembers'] = $this->member->getByColumn(['refererId' => $member->memberId]);

		$this->load->view("pages/members/view-$page", $data);
	}

	public function members()
	{
		$group = $this->input->get('group', true);
		$page = $this->input->get('page', true);
		$query = $this->input->get('query', true);

		if(!$group) redirect("membership/members?".($query?"query=$query&":'')."group=1".($page?"page=$page":''));

		$members = $this->member->getByGroup($group,['verified' => 'yes']);
		$this->load->library('pagination');
		$config['base_url'] = base_url('membership/members/');
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['total_rows'] = sizeof($members);
		$config['per_page'] = 20;
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = ' <ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li class="page-item previous"><span class="page-link"><i class="previous"></i>';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = ' <li class="page-item next"><span class="page-link">';
		$config['last_tag_close'] = '<i class="next"></i></span></li>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '';
		$config['prev_link'] = '';

		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';
		$config['num_tag_open'] = ' <li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);

		$data['members'] = $members;
		$data['groups'] = $this->group->getAll();
		$data['group'] = $this->group->getOne($group);
		$data['sid'] = $group;
		$data['query'] = $query;

		$this->load->view('pages/members/member_profiles', $data);
	}

	public function requests()
	{
		if ($this->input->post('action') === 'verify') {
			$this->form_validation->set_rules('id', 'Member', 'required');
			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				$record = $this->input->post(NULL, true);

				if ($this->member->update($record['id'], ['verified' => 'yes'])) {
					$member = $this->member->getOne($record['id'], ['id', 'name', 'memberId', 'phone', 'refererId']);
					$referer = $this->member->getByMemberId($member->refererId);

					$sms_data = [];
					array_push($sms_data, [
						'phone' => $member->phone,
						'msg' => "Your membership registration has been approved by {$referer->name}. Your Member ID is $member->memberId.\nPowered by CODEWRITE",
					]);

					if (sizeof($sms_data) > $this->setting->getValue('sms_units', 0)) {
						$this->session->set_flashdata('error_message', "You have insufficient sms units!");
					} else {
						$this->sms->sendPersonalised('{$msg}', $sms_data);
					}

					$out = [
						'status' => true,
						'message' => 'Member successfully verified!',
						'data' => $member,
					];
				} else {
					$out = [
						'status' => false,
						'message' => $this->session->flashdata('error_message'),
					];
				}
			}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
			return;
		}

		if ($this->input->post('action') === 'cancel') {
			$this->form_validation->set_rules('id', 'Member', 'required');
			$this->form_validation->set_rules('reason', 'Reason', 'required');

			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				$record = $this->input->post(NULL, true);

				if ($this->member->update($record['id'], ['verified' => 'cancelled'])) {
					$member = $this->member->getOne($record['id'], ['id', 'name', 'memberId', 'phone', 'refererId']);
					$referer = $this->member->getByMemberId($member->refererId);
					$sms_data = [];
					array_push($sms_data, [
						'phone' => $member->phone,
						'msg' => "Your membership registration has been cancelled by $referer->name. Reason: " . $record['reason'] . ".\nPowered by CODEWRITE",
					]);

					if (sizeof($sms_data) > $this->setting->getValue('sms_units', 0)) {
						$this->session->set_flashdata('error_message', "You have insufficient sms units!");
					} else {
						$this->sms->sendPersonalised('{$msg}', $sms_data);
					}

					$out = [
						'status' => true,
						'message' => 'Membership Cancelled successfully!',
						'data' => $member,
					];
				} else {
					$out = [
						'status' => false,
						'message' => $this->session->flashdata('error_message'),
					];
				}
			}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
			return;
		}

		$this->load->view('pages/members/requests');
	}
}
