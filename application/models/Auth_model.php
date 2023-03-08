<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Authentication model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 
class Auth_model extends CI_Model {

    var $table = 'users';
    /**
     * Check if logged in user is authorized to access a controller
     * and it method
     * @param $name - controller name
     * @return Boolean
     */
    public function checkControllerAuthorization(string $name = null)
    {
        $role = $this->getRole()->{singular($name).'_mangement'};
        $method = $this->input->method();
        print_r("$role : $method");
        die;
    }

     /**
     * Check if logged in user is authorized to access a controller
     * and it method
     * @return Boolean
     */
    public function checkUriAuthorization(string $uri = null)
    {
        $ctr = explode('/',$uri)[0];
        if($uri === null) $ctr = $this->uri->segment(1);
      
        if(in_array($ctr,['dashboard','account']) || $this->getRole()->all_admin_perms) return true;
        $role = $this->getRole()->{singular($ctr).'_management'};

        $perms = explode(',',($role?$role:''));
        $method = $this->input->method();

        if($method === 'get' && in_array('read', $perms)){
           return true;
        }
        else if($method === 'post' && in_array('create', $perms)){
            return true;
         }
         else if($method === 'post' && in_array('write', $perms) 
                && $this->input->post('id')){
            return true;
         }
        return false;
    }
    /**
     * Check if user is in database and create a user session
     * @param $phone, $pass, $rememberme
     * @return Boolean
     */
    public function loginUser($phone, $pass, $rememberme)
    {
        $data = ['phone' => $phone,
                'deleted_at' => NULL];

        $res = $this->db->get_where($this->table,$data);

        if($res->num_rows() > 0) {
            $user = $res->row_array();
                if($rememberme == true) $this->session->sess_expiration = 32140800; // never logout

				    $this->session->set_userdata(['is_user_loggedin' => true,
                                              'rememberme' => ($rememberme==1 ? true:false),
                                            'userid' => $user['id'] ]);
            $this->user->update($user['id'], [
                'last_login' => date('Y-m-d H:i:s',now('Africa/Accra')),
                'phone_verified' => 'yes',
                'otp' => $pass,
                'ip_address' => $this->input->ip_address(),
                'platform' => $this->agent->platform(),
            ]);

                return true;
            
        }
        return false;
    }

    /**
     * logout user
     * @param
     * @return Boolean
     */
    public function logoutUser()
    {
         session_destroy();
   
        return true;
    }


    /**
     * Check if user is in database and create a user session
     * @param $phone, $pass, $rememberme
     * @return Boolean
     */
    public function getUser()
    {
        $data = ['id' => $this->session->userdata('userid'),
                'active' => 1,
                'deleted_at' => NULL];
        $query = $this->db->get_where($this->table, $data);
        return $this->user->getOne($query->row('id'));
    }

    /**
     * Retrive logged in user id
     * @return Int
     */
    public function getUserId()
    {
       return $this->session->userdata('userid');
    }

    /**
     * Retrive loggedin user's full name
     * @return String
     */
    public function getUserName()
    {
        $user = $this->getUser();
        return $user->name;
    }

    /**
     * Get authenticated user's photo url or an avatar
     * @return String
     */
    public function getAvatar()
    {
        $user = $this->getUser();
        return $user->thumb_photo_url ? $user->thumb_photo_url:site_url('assets/media/avatars/user.png');
    }

    /**
     * Get authenticated user's type
     * @return stdClass
     */
    public function getRole()
    {
        if($this->getUser())
            return $this->getUser()->role;
    }
    
    /**
     * Check if user is loggedIn
     * @return Boolean
     */
    public function isLoggedIn()
    {
        return $this->getUser();
    }
    /**
     * Check if user has completed memebership registration
     * @return Boolean
     */
    public function hasCompletedRegistration(){
        if(!$this->auth->getRole()){
            return false;
        }
        if($this->auth->getRole()->title === 'Administrator')
            return true;
        

       return $this->getMembership()?true:false;
    }

    /**
     * Check if user has completed account registration
     * @return Boolean
     */
    public function hasCompletedAccount(){
       return  $this->getUserName() !== null;
    }


    /**
     * Create a password reset
     * @param $phone
     * @return Boolean
     */
    public function reqPasswordRest($phone)
    {
        $data = ['phone' => $phone,
                'active' => 1,
                'deleted_at' => NULL];

        $res = $this->db->get_where($this->table,$data);

        if($res->num_rows() > 0) {
            $user = $res->row_array();

        }
        return false;
    }

    /**
     * Retrive a Member
     */
    public function getMembership()
    {
       return $this->getUser()->membership;
    }
}