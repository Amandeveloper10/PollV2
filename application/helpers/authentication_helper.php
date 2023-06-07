<?php
/**
 *
 * This helper is used for Login Authentication
 *
 * @author : <developer.wiz01@sketchwebsolutions.com>
 * @param : none
 * @return : Success or Failure of Authentication
 * @since Version 0.0.1
 *
 */
function admin_authenticate() {
  $CI = & get_instance();
  
  if ($CI->session->userdata('futureAdmin') == null) {
    $CI->session->set_flashdata('errormessage', 'Invalid Accesss');
    $redirect = base_url();
    redirect($redirect);
  }
}

function backend_user_details($field = '') {
    $CI = & get_instance();
    $details = [];
    if ($CI->session->userdata('futureAdmin') != null) {
        $details = $CI->session->userdata('futureAdmin')->detail;
    }  else {
        return false;
    }
    if (isset($field) && $field != '') {
        return $details->{$field};
    } else {
        return $details;
    }
}

function backend_user_id() {
    $CI = & get_instance();
    $details = [];
    if ($CI->session->userdata('futureAdmin') != null) {
        return $CI->session->userdata('futureAdmin')->uid;
    }  else {
        return false;
    }
}

function checkConfig1() {
  $CI = & get_instance();
    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Adminauthmodel');
    // Call a function of the model
   $config = $CI->Adminauthmodel->get_row_data('setting_system_config', array('id' => '1'));
//   echo "<pre>"; print_r($config); die;
   return $config;
}

function checkOrganization1() {
  $CI = & get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Adminauthmodel');

    // Call a function of the model
   $config = $CI->Adminauthmodel->get_row_data('setting_organization', array('id' => '1'));

//   echo "<pre>"; print_r($config); die;
   return $config;



}

function getWeeks($date, $rollover)
{
$cut = substr($date, 0, 8);
$daylen = 86400;

$timestamp = strtotime($date);
$first = strtotime($cut . "00");
$elapsed = ($timestamp - $first) / $daylen;

$weeks = 1;

for ($i = 1; $i < $elapsed; $i++)
{
$dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
$daytimestamp = strtotime($dayfind);

$day = strtolower(date("l", $daytimestamp));

if($day == strtolower($rollover))  $weeks ++;
}

return $weeks;
}


function getTimeDiff($dtime,$atime)
    {
        $nextDay = $dtime>$atime?1:0;
        $dep = explode(':',$dtime);
        $arr = explode(':',$atime);
        $diff = abs(mktime($dep[0],$dep[1],0,date('n'),date('j'),date('y'))-mktime($arr[0],$arr[1],0,date('n'),date('j')+$nextDay,date('y')));
        $hours = floor($diff/(60*60));
        $mins = floor(($diff-($hours*60*60))/(60));
        $secs = floor(($diff-(($hours*60*60)+($mins*60))));
        if(strlen($hours)<2){$hours="0".$hours;}
        if(strlen($mins)<2){$mins="0".$mins;}
        if(strlen($secs)<2){$secs="0".$secs;}
        return $hours.':'.$mins;
    }



/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */
