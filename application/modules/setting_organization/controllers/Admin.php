<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for setting_organization [HMVC]. Handles all the datatypes and methodes required
 * for setting_organization section of future
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
        $this->load->model('admin/OrganizationModel');
    }

    /**
     * Index Page for this setting_organization controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
     public function index($id=NULL) {
        $all_data = $this->OrganizationModel->load_single_data(1);
        $all_data_location = $this->OrganizationModel->load_single_data_location();
        $all_data_bank = $this->OrganizationModel->load_single_data_bank();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['data_single'] = $all_data;
        $this->data['data_single_location'] = $all_data_location;
        $this->data['data_single_bank'] = $all_data_bank;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('setting_organization/admin/list',$this->data);
        }else{
            $this->middle = 'setting_organization/admin/list';
        $this->layout();
        }
    }

    /**
     * save form for this setting_organization controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->OrganizationModel->modify($id);            
        }        
    }


    
}
/* End of file admin.php */
/* Location: ./application/modules/setting_organization/controllers/admin.php */
