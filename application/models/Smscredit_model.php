<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sms credit model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Smscredit_model extends MY_Model {
    
    var $table = 'sms_credits';
    var $hasOne = ['users' => 'added_by'];
}