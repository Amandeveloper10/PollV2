<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for tenancy_contracts [HMVC]. Handles all the datatypes and methodes required
 * for tenancy_contracts section of future
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
        $this->load->model('admin/TenancyModel');
    }

    /**
     * Index Page for this tenancy controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->TenancyModel->load_all_data_tenancy();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('tenancy_contracts/admin/list_tenancy',$this->data);
        }else{
            $this->middle = 'tenancy_contracts/admin/list_tenancy';
            $this->layout();
        }
    }

    /**
     * Index Page for this tenancy_contracts controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index_tenancy($id=NULL,$did=NULL,$iid=NULL) {
      //  echo $id.'@'.$did.'@'.$iid;exit;
       //echo $this->uri->segment(2); die;
        $all_data = $this->TenancyModel->load_all_data($id);
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
        $this->data['tenancy_id'] = $this->uri->segment(2);
       // echo "<pre>"; print_r($all_data); //die;
        if($iid){
            $this->load->view('tenancy_contracts/admin/list',$this->data);
        }else{
            $this->middle = 'tenancy_contracts/admin/list';
            $this->layout();
        }
    }
    
     public function save_index_tenancy($id=NULL) {
      //  echo $id.'@'.$did.'@'.$iid;exit;
       //echo $this->uri->segment(2); die;
        $all_data = $this->TenancyModel->load_all_data($id);
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
        $this->data['tenancy_id'] = $this->uri->segment(2);
       // echo "<pre>"; print_r($all_data); //die;
        
            $this->load->view('tenancy_contracts/admin/list',$this->data);
      
    }

    /**
     * add/edit save for this tenancy_contracts controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->TenancyModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this tenancy_contracts controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  

        $this->data['tenancy_id'] = $_POST['tenancy_id'];
        if (!empty($id)) {
            $this->data['data_single'] = $this->TenancyModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->TenancyModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('tenancy_contracts/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }




     /**
     * add/edit save for this tenancy controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form_tenancy($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->TenancyModel->modify_tenancy($id);            
        }        
    }


    /**
     * edit Page load for this tenancy controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form_tenancy() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->TenancyModel->load_single_data_tenancy($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->TenancyModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('tenancy_contracts/admin/form_tenancy',$this->data, TRUE);
        echo $view; exit();         
    }



    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->TenancyModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/tenancy_contracts/controllers/admin.php */
