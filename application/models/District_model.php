<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * District model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class District_model extends MY_Model {
    var $table = 'districts';
    var $hasOne = [
        'regions' => 'region_id'
    ];
}