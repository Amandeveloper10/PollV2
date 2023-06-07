<?php

function checkConfig() {
  $CI = & get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Adminauthmodel');

    // Call a function of the model
   $config = $CI->Adminauthmodel->get_row_data('setting_system_config', array('id' => '1'));

//   echo "<pre>"; print_r($config); die;
   return $config;



}


function checkOrganization() {
  $CI = & get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Adminauthmodel');

    // Call a function of the model
   $config = $CI->Adminauthmodel->get_row_data('setting_organization', array('id' => '1'));

//   echo "<pre>"; print_r($config); die;
   return $config;



}



/* End of file common_helper.php */
/* Location: ./application/helpers/common_helper.php */
