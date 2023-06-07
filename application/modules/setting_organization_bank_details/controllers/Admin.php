<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for setting_organization_bank_details [HMVC]. Handles all the datatypes and methodes required
 * for setting_organization_bank_details section of future
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
        $this->load->model('admin/SetOrgBankModel');
    }

    /**
     * Index Page for this setting_organization_bank_details controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->SetOrgBankModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('setting_organization_bank_details/admin/list',$this->data);
        }else{
            $this->middle = 'setting_organization_bank_details/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this setting_organization_bank_details controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->SetOrgBankModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this setting_organization_bank_details controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->SetOrgBankModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('setting_organization_bank_details/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status setting_organization_bank_details controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->SetOrgBankModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->SetOrgBankModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/setting_organization_bank_details/controllers/admin.php */
