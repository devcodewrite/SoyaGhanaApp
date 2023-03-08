<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Sms class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */

class Sms extends MY_Controller
{

	public function send()
	{
		if ($this->input->post()) {
			// validate data and verify user
			$this->form_validation->set_rules('message', 'Message', 'required');
			$this->form_validation->set_rules('phones[]', 'Phone numbers', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error_message', validation_errors('', ''));
			} else {
				$record   = $this->input->post(null);
				$sms_data = [];
				foreach($record['phones'] as $phone){
					array_push($sms_data, [
						'phone' => $phone,
						'msg' => "\nPowered by CODEWRITE",
					]);
				}
				if(sizeof($sms_data) > $this->setting->getValue('sms_units', 0)){
					$this->session->set_flashdata('error_message', "You have insufficient sms units!");
				}
				if($this->sms->sendPersonalised($record['message'].'{$msg}', $sms_data)){
					$data = [];
					foreach($sms_data as $d){
						array_push($data, [
							'phone' => $d['phone'],
							'message' => $record['message'],
							'added_by' => $this->auth->getUserId(),
						]);
					}
					if ($this->sms->createAll($data)) {
						$this->session->set_flashdata('success_message', "Sms sent successfully!");
					} else {
						$this->session->set_flashdata('error_message', "Data couldn't be created!");
					}
				}else {
					$this->session->set_flashdata('error_message', "Sms couldn't be sent!");
				}
				
			}
			redirect(uri_string());
		}

		$this->load->view('templates/head');
		$this->load->view('templates/header');
		$this->load->view('pages/sms/sms');
		$this->load->view('templates/footer');
	}

	/**
	 * Sms Credits
	 */

	public function credits()
	{
		$data['user'] = $this->auth->getUser();
		$this->load->view('templates/head');
		$this->load->view('templates/header');
		$this->load->view('pages/sms/credits', $data);
		$this->load->view('templates/footer');
	}

	public function confirm_payment($ref = null)
	{
		if ($ref === null) {

			show_error("Unauthorized Access", 401);
			return;
		}

		if ($this->smscredit->getCount(['ref' => $ref]) > 0) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['status' => false, 'message' => 'Sorry, payment already made!']));
			return;
		}
		//set data from configuration
		$secret_key = $this->config->item('cw_paystack_secret_key');
		$url = $this->config->item('paystack_base_url') . "/transaction/verify/$ref";

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer $secret_key",
				"Cache-Control: no-cache",
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			$response = json_encode(['status' => false, 'message' => $err]);
		} else {
			$res = json_decode($response);
			if ($res->status) {
				$user = $this->auth->getUser();
				$quantity = intval(($res->data->amount / 100) / $this->config->item('sms_amount_per_unit'));
				$record = [
					'amount' => $res->data->amount / 100,
					'added_by' => $user->id,
					'ref' => $ref,
					'quantity' => $quantity,
				];
				
				if ($this->smscredit->create($record)) {
					$sms_data = [];
					$sms_data[] = [
						'phone' => $this->config->item('cw_phone'),
						'name' => $this->setting->getValue('school_name'),
						'amount' => number_format($res->data->amount / 100, 2),
						'units' => $quantity,
					];
					$link = site_url('backdoor/approval/'.$ref);
					$msg = 'Hi, {$name} has made paid an amount of GHS {$amount} for {$units} units sms credits.' . "\nApproval link: $link.";
					$smsRes = $this->sms->sendPersonalised($msg, $sms_data);

					$response = json_encode(['status' => true, 'message' => "Payment made successfully!"]);
				}
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output($response);
	}
}
