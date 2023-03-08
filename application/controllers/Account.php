<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Account class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Account extends MY_Controller {

	/**
	 * Show and update profle
	 * @author Eric Mensah <ericmensah@codewrite.org>
	 * @return null
	 */
	 public function profile()
	 {
		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email Address', 'valid_email');

			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				$record = $this->input->post(null, true);

				if ($this->user->change($this->auth->getUserId(), $record)) {
					$out = [
						'status' => true,
						'message' => "User account updated successfully.",
						'data' => $record,
					];
				}
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
			return;
		}

		$data['user'] = $this->auth->getUser();

		$this->load->view('pages/account/profile', $data);
	 }

	 public function update_phone()
	 {
		if ($this->input->post()) {
			$this->form_validation->set_rules('otp_mobile_number', 'Phone number', 'required');

			if ($this->form_validation->run() == FALSE) {
				$out = [
					'status' => false,
					'message' => strip_tags(validation_errors('', '')),
				];
			} else {
				$phone =  $this->input->post('otp_mobile_number', true);
				$phone = str_replace([' ', '+'], '', $phone);
				$otp = random_int(1000, 9999);
	
				$record = [
					'phone' => $phone,
					'otp' => $otp
				];

				$sendOtp = false;
				if ($this->user->update($this->auth->getUserId(), $record)) {
					$sendOtp = true;
				}
				if ($sendOtp) {
					$sms_data[] = [
						'phone' => $phone,
						'otp' => $otp,
					];
					$org = $this->setting->getValue('organization_name', 'CODEWRITE TECHNOLOGY LTD');
					$msg = "$org Two step verification ".'OTP Code: {$otp}.'."Don't share this code with anyone.\nPowered by CODEWRITE.";
					if($this->setting->getValue('sms_units', 1) > 0){
						$smsRes = $this->sms->sendPersonalised($msg, $sms_data);
	
						if( $smsRes->status === false){
							$out = [
								'status' => false,
								'message' =>$smsRes->message,
								
							];
						}
						else {
							$out = [
								'status' => true,
								'message' => "OTP code sent successully!",
							];
							$this->session->set_flashdata('otp', $record);
						}
					}else{
						$out = [
							'status' => false,
							'message' => "Unknown error occured! OTP code couldn't be sent! Contact Admin: ".$this->setting->getValue('admin_contact', '0246092155'),
						];
					}
				}
			}

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
			return;
		}

		$data['user'] = $this->auth->getUser();

		$this->load->view('pages/account/profile', $data);
	 }

	 public function terms()
	 {
		$this->load->view('pages/account/terms');
	 }
}
