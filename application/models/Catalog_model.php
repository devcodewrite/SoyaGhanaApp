<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Catalog model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Catalog_model extends MY_Model {
    var $table = 'catalogs';
    var $hasOne = [
        'members:owner' => 'member_id',
    ];
   
    var $order = ['id' => 'desc'];

    /**
     * create a member
     * @param $data
     * @return Boolean
     */
    public function add(array $data)
    {
        $gdata = $this->extract($data);
        $gdata['member_id'] = $this->auth->getMembership()->id;

        // transact to ensure both process are completed
        $this->db->trans_start();
            $this->create($gdata); // create
            $mId = $this->insertId();
            if(!$this->uploadPhoto($mId,'avatar', 'avatar', true, '90%',['w' => '400', 'h' => '400'])){
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
           if(!$this->uploadPhoto($id,'avatar', 'avatar', false,'80%', ['w' => '400', 'h' => '400'])){
               return false;
           }
       $this->db->trans_complete();

       return $this->db->trans_status();
    }
}