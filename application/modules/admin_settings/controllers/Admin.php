<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for admin_settings [HMVC]. Handles all the datatypes and methodes required
 * for admin_settings section of future
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
        $this->load->model('admin/AdminSettingsModel');
    }

    /**
     * Index Page for this tenancy controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->AdminSettingsModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('admin_settings/admin/list',$this->data);
        }else{
            $this->middle = 'admin_settings/admin/list';
            $this->layout();
        }
    }

   
    /**
     * add/edit save for this admin_settings controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->AdminSettingsModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this admin_settings controller.
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
            
            $this->data['data_single'] = $this->AdminSettingsModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        $this->data['all_parent_menu']=$this->AdminSettingsModel->getallparentmenu();
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_designation'] = $this->AdminSettingsModel->get_result_data('master_designation',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('admin_settings/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }
	
	 public function status($id) {
        $this->AdminSettingsModel->status_change($id);
    }
	
	 public function delete($id) {
        $this->AdminSettingsModel->delete_this($id);
    }



}
/* End of file admin.php */
/* Location: ./application/modules/admin_settings/controllers/admin.php */
