<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Datatablejson class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Datatablejson extends CI_Controller {

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
		$fields = [];
		$result = $this->member->getByColumn(['verified' => 'yes']);

		$out = [
			'data' => $result,
		];

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}

	public function registrations()
	{
		$fields = [];
		$result = $this->member->getByColumn(['verified' => 'no']);
		$out = [
			'data' => $result,
		];
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}

	public function groups()
	{
		$result = $this->group->getAll();
		$out = [
			'data' => $result,
		];
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}
	public function catalogs()
	{
		$where = []; $order = [];$limit = null;
		if($this->auth->getRole()->title === 'Member'){
			$where = array_merge($where, ['member_id' => $this->auth->getMembership()->id]);
		}

		$inp_order = $this->input->get('order');
		if($this->catalog->meta(($inp_order?$inp_order:''))){
			$order_col = $this->input->get('order');
			$order = [
				$order_col => 'asc',
			];
		}

		if($this->input->get('limit')){
			$limit = $this->input->get('limit', true);
		}
		

		$result = $this->catalog->getByColumn($where,[],$order,$limit);
		$out = [
			'data' => $result,
		];
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}

	public function users()
	{
		$fields = ['id','name','phone','email', 'photo_url', 'thumb_photo_url', 'role_id', 'enable_two_factor_auth','last_login','created_at'];

		$where = [];
		if($this->input->get('role_id')){
			$where = array_merge($where, ['role_id' => $this->input->get('role_id', true)]);
		}
		$result = $this->user->getByColumn($where,$fields);
		
		$out = [
			'data' => $result,
		];
	
		  $this->output
			->set_content_type('application/json')
			->set_output(json_encode($out));
	}
	
	
	private function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
	public function post_data()
	{   
	    if($this->input->get('getData') && $this->input->get('getData') =="ok"){
	   	    $start=$this->input->get('start');
	        $end=$this->input->get('limit');
	        
            $post_data= $this->member->catalog_post($start,$end);
        }
         if ($this->agent->is_mobile()){$height2='height:auto;max-height:280px;';$height='height:auto;';}else{$height2='height:200px;';$height='height:350px;';}
	     $counter=0;
	     echo "<div class='row mx-0'>";
	     foreach($post_data as $all_post){
	            $post_title=$all_post['item'];
	            $likes=$all_post['likes'];
	            $views=$all_post['views'];
	            $shares=$all_post['shares'];
	            $post_title=$all_post['item'];
	            $post_price=$all_post['price'];
	            $post_currency=$all_post['currency'];
	            $post_title1=substr_replace($all_post['item'], '...', 30);
	            $avatar=$all_post['avatar'];
	            $post_description=substr_replace($all_post['description'], '...', 60);
	            $post_description1=$all_post['description'];
	            $name=$all_post['name'];
	            $post_user_id=$all_post['member_id'];
	            $post_user_local_id=$all_post['locale_id'];
	            $local=$this->locale->getOne($post_user_local_id);
	            //$region=$local->region->name;
	            $user_profile= $all_post['thumb_photo_url'];
	            $user_phone=$all_post['phone'];
	            $user_address=$all_post['address'];
	            $height="";$height2="";
	            $show_prices="";
	            $p=$all_post['created_at'];
	            $time_created=$this->time_elapsed_string($all_post['created_at']);
	            
	            
	            if(!empty($post_price) && $post_price !=='0.00'){
	                $show_prices="<span class='badge p-2 bg-danger' style='color:#fff;position:absolute;z-index:2;display:block;opacity: .8;'>$post_currency $post_price</span>";
	            }
	            if ($this->agent->is_mobile()){$height2='height:auto;max-height:330px;';$height='height:auto;';}else{$height2='max-height:400px;height:auto;';$height='height:auto;';}
	         echo "
	            <div class='col-xl-12 col-md-12 px-0 col-12 mt-3'>
                    <a href='tel:$user_phone' data-toggle='tooltip' data-placement='bottom' title='$post_title'>
                        <div class='card card-h-50 shadow-primary' style='$height background:#F5F8FA;border:3px solid #E4E6EF;'>
                            $show_prices
                            <image src='$avatar'  style='$height2 object-fit: cover;width:100%;boder-radius:15px 15px;'/>
                            
                            <a href='tel:' data-toggle='tooltip' data-placement='bottom' title='$post_title'>
                                <div class='row' style='padding:8px;'>
                                    <div class='col-xl-2 col-2'>
                                        <a href='view/$post_user_id' data-toggle='tooltip' data-placement='bottom' title='$name'>
                                        <img style='width:40px;height:40px;border-radius:50%;border:2px solid #Fff;object-fit: cover;' src='$user_profile'
                                        alt='Filla Motion $post_title' id='myprofile ' ></a>
                                    </div>
                                    <div class='col-xl-10 col-10'>
                                        <a href='view/$post_user_id' data-toggle='tooltip' data-placement='bottom' title='$name'>
                                             <span class='text-muted '>$name - $user_phone<br></span>
                                         </a>
                                        <a href='tel:$user_phone' data-toggle='tooltip' data-placement='bottom' title='$post_title'>
                                            <span style='color:#000;font-size:14px;'><b>$post_title1</b></span><br>
                                        </a>
                                       
                                    </div>
                                    <div class='col-xl-12 col-12'>
                                        <a href='view/$post_user_id' data-toggle='tooltip' data-placement='bottom' title='$post_description1'>
                                             <span class='text-muted '>$post_description<br></span>
                                         </a>
                                         
                                        <span class='text-black'>Address: $user_address  <b> </b></span>
                                    </div>
                                    <div class='offset-col-1 mb-0 mt-0'><hr style='margin-bottom:2px!important;margin-top:2px!important;'></div>
                                        
                                        <div class='col-4'><span class='muted'>$views Views</span></div>
                                        <div class='col-4'><i class='fa fa-thumbs-up' style='font-size:14px;background:blue;color:#fff;border-radius:50px;padding:3px;'></i> <span class='muted'>$likes</span></div>
                                        <div class='col-4'><span class='muted'>$shares shares</span></div>
                                       
                                        
                                    <div class='offset-col-1 mb-0 mt-0'><hr style='margin-bottom:2px!important;margin-top:2px!important;'></div>
                                        <div class='col-5'>$time_created <i class='fa fa-globe'></i></div>
                                        <div class='col-3'><i class='fa fa-thumbs-up' style='font-size:20px;'></i> <b>Like</b></div>
                                        <div class='col-4'><i class='fa fa-share-alt' style='font-size:20px;'></i> <b>Share</b></div>
                                    
                                </div>
                            </a>
                        </div>
                    </a>
                
                </div>
                
	         ";
	         $counter++;
	     }
    					        
    	echo "</div>"; 
	}

}
