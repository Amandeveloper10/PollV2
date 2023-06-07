<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for setting_system_config [HMVC]. Handles all the datatypes and methodes required
 * for setting_system_config section of future
 */
class Admin extends MX_Controller {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        admin_authenticate();
        $this->load->model('admin/SystemConfigModel');
    }

    /**
     * Index Page for this setting_system_config controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
     public function index($id=NULL) {
        $all_data = $this->SystemConfigModel->load_single_data(1);
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['data_single'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('setting_system_config/admin/list',$this->data);
        }else{
            $this->middle = 'setting_system_config/admin/list';
        $this->layout();
        }
    }

    /**
     * save form for this setting_system_config controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->SystemConfigModel->modify($id);            
        }        
    }


    
}
/* End of file admin.php */
/* Location: ./application/modules/setting_system_config/controllers/admin.php */
