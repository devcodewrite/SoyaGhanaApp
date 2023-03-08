<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Setting model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Setting_model extends MY_Model {
    
    var $table = 'settings';

    /**
     * Retrive a settings value
     * @param $key
     * @return String
     */
    public function getValue(string $key = '', string $default = '')
    {
        $where = ['keyword' => $key];
        $query = $this->db->get_where($this->table, $where);
        return $query->row('value')?$query->row('value'):$default;
    }

    /**
     * Retrive app name
     * @return String
     */
    public function getAppName()
    {
        return $this->getValue('app_name');
    }
    /**
     * Retrive current year
     * @return String
     */
    public function getSemester()
    {
        $semester = $this->semester->getOne($this->getValue('current_semester'));
        if($semester) {
            return $semester->title;
        }
        else {
            return '';
        }
    }

    /**
     * Retrive current year
     * @return String
     */
    public function getYear()
    {
        return $this->getValue('current_year');
    }

    /**
     * Retrive available years
     * @return Array
     */
    public function getAvailableYears()
    {
        return explode(',', $this->getValue('available_years'));
    }

     /**
     * Retrive available payment types
     * @return Array
     */
    public function getPaymentTypes()
    {
        return explode(',', $this->getValue('payment_types'));
    }
    
    /**
     * Set a settings value
     * @param $key, $value
     * @return Boolean
     */
    public function setValue(string $key, $value)
    {
        $this->db->where('keyword', $key);
        $this->db->replace($this->table, ['keyword' => $key, 'value'=> $value]);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Get authenticated user's photo url or an avatar
     * @return String
     */
    public function getLogo()
    {
        $logo = $this->getValue('app_logo');
        return $logo? $logo:base_url('assets/images/education.png');
    }

    /**
     * Format date
     * @param $date, $format
     */
    public function dateFormat($date, $format)
    {
        return date($format, strtotime($date));
    }
}