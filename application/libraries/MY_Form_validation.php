<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();
    }

    function error_array() {
        return $this->_error_array;
    }

    function run($module = '', $group = ''){
        is_object($module) AND $this->CI = &$module;
        return parent::run($group);
    }

}

?>