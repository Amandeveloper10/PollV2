<?php
// if (!defined('BASEPATH'))
//     exit('No direct script access allowed');

require_once(APPPATH . 'libraries/REST_Controller.php');

// header("Access-Control-Allow-Origin:*");
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');
// header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, X-CLIENT-ID, X-CLIENT-SECRET');
// header('Access-Control-Allow-Credentials: true');

class Api extends REST_Controller {
    
   
    function __construct() {
        // Construct the parent class
        parent::__construct();
        //$this->load->model("adminsmodel");
        $this->load->helper("commoncomponents");
        $this->load->database();
		$this->image_path = base_url().'uploads/';
        
    }
    







	   
              
}