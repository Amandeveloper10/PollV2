<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for benefits_workman_compensation [HMVC]. Handles all the datatypes and methodes required
 * for benefits_workman_compensation section of future
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
        $this->load->model('admin/BenefitWCModel');
    }

    /**
     * Index Page for this benefits_workman_compensation controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->BenefitWCModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('benefits_workman_compensation/admin/list',$this->data);
        }else{
            $this->middle = 'benefits_workman_compensation/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this benefits_workman_compensation controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->BenefitWCModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this benefits_workman_compensation controller.
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
            $this->data['data_single'] = $this->BenefitWCModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_employee'] = $this->BenefitWCModel->get_result_data('employee',array('delete_flag'=>'N','is_active'=>'Y'));
        $view = $this->load->view('benefits_workman_compensation/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status benefits_workman_compensation controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->BenefitWCModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->BenefitWCModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/benefits_workman_compensation/controllers/admin.php */
