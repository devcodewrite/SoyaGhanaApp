<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Locale model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Locale_model extends MY_Model {
    var $table = 'locales';

    var $hasOne = [
        'districts' => 'district_id'
    ];
}