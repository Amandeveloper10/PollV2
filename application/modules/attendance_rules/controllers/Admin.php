<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for attendance_rules [HMVC]. Handles all the datatypes and methodes required
 * for attendance_rules section of future
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
        $this->load->model('admin/AttRulesModel');
    }

    /**
     * Index Page for this attendance_rules controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->AttRulesModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); die;
        if($id){
            $this->load->view('attendance_rules/admin/list',$this->data);
        }else{
            $this->middle = 'attendance_rules/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this attendance_rules controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->AttRulesModel->modify($id);            
        }        
    }

    /**
     * edit Page load for this attendance_rules controller.
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
            $this->data['data_single'] = $this->AttRulesModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $this->data['all_grade'] = $this->AttRulesModel->get_result_data('master_grade',array('delete_flag'=>'N','is_active'=>'Y'));
        $this->data['all_work_shift'] = $this->AttRulesModel->get_result_data('master_work_shift',array('delete_flag'=>'N','is_active'=>'Y'));
        $this->data['all_leaverule'] = $this->AttRulesModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));
        $view = $this->load->view('attendance_rules/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


  /*  public function check_grade() {
        $grade_id = $_POST['grade_id'];  
        $rule_id = $_POST['rule_id'];


        if(empty($rule_id)){
            $check_grade = $this->AttRulesModel->get_row_data('master_attendance_rules',array('grade'=>$grade_id,'delete_flag'=>'N'));
        }else{
            $check_grade = $this->AttRulesModel->check_grade($grade_id,$rule_id);
        }


        if(!empty($check_grade)){
            echo 'This Grade Rule is already inserted.';
        }else{
            echo 'done';
        }

        exit();         
    }*/

    public function check_grade() {
        
        $work_shift_id = $_POST['work_shift_id'];  
        $day_type = $_POST['day_type'];
        $rule_id = $_POST['rule_id'];
        //echo  $day_type; die;


        if(empty($rule_id)){
            $check_grade = $this->AttRulesModel->get_row_data('master_attendance_rules',array('work_shift_id'=>$work_shift_id,'delete_flag'=>'N','day_type' => $day_type));

        }else{
            $check_grade = $this->AttRulesModel->check_grade($work_shift_id,$rule_id,$day_type);
        }


        if(!empty($check_grade)){
            echo 'This Work Shift is already inserted.';
        }else{
            echo 'done';
        }

        exit();         
    }

    /**
     * status attendance_rules controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->AttRulesModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->AttRulesModel->delete_this($id);
    }
}
/* End of file admin.php */
/* Location: ./application/modules/attendance_rules/controllers/admin.php */
