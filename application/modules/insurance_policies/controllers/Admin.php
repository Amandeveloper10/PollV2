<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for insurance_policies [HMVC]. Handles all the datatypes and methodes required
 * for insurance_policies section of future
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
        $this->load->model('admin/InsuranceModel');
    }

    /**
     * Index Page for this insurance_policies controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->InsuranceModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('insurance_policies/admin/list',$this->data);
        }else{
            $this->middle = 'insurance_policies/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this insurance_policies controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->InsuranceModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this insurance_policies controller.
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
            $this->data['data_single'] = $this->InsuranceModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->InsuranceModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('insurance_policies/admin/form',$this->data, TRUE);
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
        $this->InsuranceModel->delete_this($id);
    }
	
	public function check_policy() {
        $policy_name = $_POST['policy_name'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_policy = $this->InsuranceModel->get_row_data('insurance_policies',array('policy_name'=>$policy_name,'delete_flag'=>'N','is_active'=>'Y'));
        }else{
            $check_policy = $this->InsuranceModel->check_policy($policy_name,$id);
        }


        if(!empty($check_policy)){
            echo 'This Policy Name is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }
}
/* End of file admin.php */
/* Location: ./application/modules/insurance_policies/controllers/admin.php */
