<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Authentication class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */
class Auth extends CI_Controller
{
	/**
	 * Sign in
	 * @author Eric Mensah <ericmensah@codewrite.org>
	 * @return null
	 */
	public function sign_in()
	{
		// is post data avaliable
		if ($this->input->post('phone')) {

			$phone =  ltrim($this->input->post('phone', true), '0');
			$phone = '233'.str_replace([' ', '+'], '', $phone);
			$otp = random_int(1000, 9999);
			
				$sms_data[] = [
					'phone' => $phone,
					'otp' => $otp,
				];
				
				$org = $this->setting->getValue('organization_name', 'CODEWRITE TECHNOLOGY LTD');
				
				$msg = "$org Two step verification ".'OTP Code: {$otp}.'."Don't share this code with anyone.\nPowered by CODEWRITE.";
				
				if($this->setting->getValue('sms_units', 0) > 0){
				    
					$smsRes = $this->sms->sendPersonalised($msg, $sms_data);
					if( $smsRes->status === true){
					    
					   $this->session->set_flashdata('otp_data', [
					       'otp' => $otp,
					       'phone' => $phone,
					       ]);
					   
					   $this->verification->create([
					       'phone' => $phone,
					       'otp' => $otp,
					       'expire' => date("Y-m-d H:i:s",
					       strtotime("now +1 hours") ),
					       ]);
					       
					   redirect('verification');
					}
					else {
						$this->session->set_userdata('error', $smsRes->message);
					}
				}
				else{
					$this->session->set_flashdata('error', 
					"System is out of sms units Contact Admin: ".$this->setting->getValue('admin_contact', '0246092155') );
				}
		}

		if($this->auth->isLoggedIn()){
			redirect('dashboard');
		}

		$this->load->view('auth/signin');
	}

	public function verification()
	{
		$data = $this->session->flashdata('otp_data');
		
		if($data){
		    
			if($this->verification->hasExpired($data)){
			    $this->session->set_userdata('error', "Your OTP code has expired!");
			    redirect('sign-in');
			}
		}
		else{
			redirect('sign-in');
		}
		$this->load->view('auth/verification',$data);
	}
	public function verify_otp()
	{
		// is post data avaliable
		if ($this->input->post('phone') && $this->input->post('otp')) {
		    
    			$phone =  $this->input->post('phone', true);
    			$otp = $this->input->post('otp', true);
    			$data['phone'] = $phone;
    			$data['otp'] = $otp;
        			
        			if(!$this->verification->hasExpired($data))
        			{
        			    if(!$this->user->getCount(['phone' => $phone]) ){
        			        $data['role_id'] = 3;
        			        $data['active'] = 1;
        		
        			       $this->user->create($data);
        			    }
            			if($this->auth->loginUser($phone,$otp, true)){
            			    $this->verification->invalidate($data);
            				$out = [
            					'status' => true,
            					'message' => 'OTP code verified successfully!'
            				];
            			}
        			}
    		        else 
    		        {
    		            $out = [
            					'status' => false,
            					'message' => 'OTP code is invalid!'
            				];
    		        }
    		        
			  $this->output
				->set_content_type('application/json')
				->set_output(json_encode($out));
		}
	}

	/**
	 * Logout user
	 */
	public function logout()
	{
		if ($this->auth->logoutUser()) {
			redirect('sign-in');
		}
		redirect('dashboard');
	}

	/**
	 * Get direct url or return to home
	 */
	private function redirectUrl()
	{
		$url = urldecode($this->input->get('redirect_url', true));
		return $url ? $url : 'dashboard';
	}
}
