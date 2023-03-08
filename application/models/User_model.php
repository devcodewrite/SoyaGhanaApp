<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class User_model extends MY_Model {
    var $table = 'users';

    var $belongsTo = [
        'members:membership' => 'user_id', 
    ];

    var $hasOne = [
        'roles' => 'role_id', 
    ];

     /**
     * update a member data
     * @param $id, $data
     */
    public function change($id, $data)
    {
       $udata = $this->extract($data);
       // transact to ensure both process are completed
       $this->db->trans_start();
           $this->update($id, $udata); // create guardian
           if(!$this->uploadPhoto($id, 'avatar')){
               return false;
           }
       $this->db->trans_complete();

       return $this->db->trans_status();
    }
}