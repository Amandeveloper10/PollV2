<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for grade [HMVC]. Handles all the datatypes and methodes required
 * for grade section of future
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
        $this->load->model('admin/GradeModel');
    }

    /**
     * Index Page for this grade controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->GradeModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('grade/admin/list',$this->data);
        }else{
            $this->middle = 'grade/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this grade controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->GradeModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this grade controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  
      //  echo $id;exit;
 $this->data['leave_rule'] = $this->GradeModel->load_leave_rule();
            
            $this->data['work_shift'] = $this->GradeModel->load_work_shift();
            $this->data['over_time'] = $this->GradeModel->load_over_time();
             $this->data['late'] = $this->GradeModel->load_late($id);
        if (!empty($id)) {
            $this->data['data_single'] = $this->GradeModel->load_single_data($id);
           
            $this->data['id'] = $id;  
        }  
      //  echo "<pre>"; print_r($this->data['leave_rule']); //die;
        $view = $this->load->view('grade/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status grade controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->GradeModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->GradeModel->delete_this($id);
    }

    public function check_grade() {
        $grade = $_POST['grade'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_grade = $this->GradeModel->get_row_data('master_grade',array('grade_name'=>$grade,'delete_flag'=>'N','is_active'=>'Y'));
        }else{
            $check_grade = $this->GradeModel->check_grade($grade,$id);
        }


        if(!empty($check_grade)){
            echo 'This Grade is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }

     public function checkminmax_sal() {
        $min_salary = $_POST['min_salary'];  
        $max_salary = $_POST['max_salary'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_min_max_sal = $this->GradeModel->check_min_max_sal($min_salary,$max_salary,$id);
        }else{
            $check_min_max_sal = $this->GradeModel->check_min_max_sal($min_salary,$max_salary,$id);
        }


        if(!empty($check_min_max_sal)){
            echo 'This Salary Range already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }

    
}
/* End of file admin.php */
/* Location: ./application/modules/grade/controllers/admin.php */
