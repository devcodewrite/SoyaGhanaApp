<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Group model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Group_model extends MY_Model {
    var $table = 'groups';

    var $belongsToMany = [
        'members' => 'member_groups', 
    ];

    var $order = ['id' => 'asc'];

    /**
     * create a member
     * @param $data
     * @return Boolean
     */
    public function add(array $data)
    {
        $gdata = $this->extract($data);
        $gdata['added_by'] = $this->auth->getUserId();

        // transact to ensure both process are completed
        $this->db->trans_start();
            $this->create($gdata); // create
            $mId = $this->insertId();
            if(!$this->uploadPhoto($mId,'avatar', 'avatar')){
                return false;
            }
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * update a member data
     * @param $id, $data
     */
    public function change($id, $data)
    {
       $gdata = $this->extract($data);
       // transact to ensure both process are completed
       $this->db->trans_start();
           $this->update($id, $gdata); // create guardian
           if(!$this->uploadPhoto($id,'avatar', 'avatar')){
               return false;
           }
       $this->db->trans_complete();

       return $this->db->trans_status();
    }
}