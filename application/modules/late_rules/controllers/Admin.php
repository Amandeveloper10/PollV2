<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for late_rules [HMVC]. Handles all the datatypes and methodes required
 * for late_rules section of future
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
        $this->load->model('admin/LateRulesModel');
    }

    /**
     * Index Page for this late_rules controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->LateRulesModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('late_rules/admin/list',$this->data);
        }else{
            $this->middle = 'late_rules/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this late_rules controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->LateRulesModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this late_rules controller.
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
            $this->data['data_single'] = $this->LateRulesModel->load_single_data($id);
            $this->data['id'] = $id;  
        } 
        $this->data['all_grade'] = $this->LateRulesModel->get_result_data('master_grade',array('is_active'=>'Y','delete_flag'=>'N')); 
        $this->data['all_dept'] = $this->LateRulesModel->get_result_data('master_department',array('is_active'=>'Y','delete_flag'=>'N'));
         $this->data['all_leaverule'] = $this->LateRulesModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));
       
        //echo "<pre>"; print_r($this->data['all_leaverule']); die;
        $view = $this->load->view('late_rules/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status late_rules controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->LateRulesModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->LateRulesModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/late_rules/controllers/admin.php */
