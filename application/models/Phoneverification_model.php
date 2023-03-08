<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Phone verifcation model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Phoneverification_model extends MY_Model {
    var $table = 'phone_verifications';
    
    public function hasExpired($where){
        
        $query = $this->db->select("*")
                    ->from($this->table)
                    ->where('expire >', 'now()', true)
                    ->get();
        
        return $query->num_rows()  === 0;
                    
    }
    
    public function replace($phone, $data)
    {
        $this->db->where('phone', $phone);
        return $this->db->replace($this->table, $data);
    }
    
    public function invalidate($where){
        $where = $this->extract($where);
        $this->db->delete($this->table, $where);
    }
}