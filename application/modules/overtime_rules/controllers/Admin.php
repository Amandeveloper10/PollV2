<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for overtime_rules [HMVC]. Handles all the datatypes and methodes required
 * for overtime_rules section of future
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
        $this->load->model('admin/OvertimeRulesModel');
    }

    /**
     * Index Page for this overtime_rules controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->OvertimeRulesModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('overtime_rules/admin/list',$this->data);
        }else{
            $this->middle = 'overtime_rules/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this overtime_rules controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->OvertimeRulesModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this overtime_rules controller.
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
            $this->data['data_single'] = $this->OvertimeRulesModel->load_single_data($id);
            $this->data['id'] = $id;  
        } 
        
        $this->data['all_component'] = $this->OvertimeRulesModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('overtime_rules/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status overtime_rules controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->OvertimeRulesModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->OvertimeRulesModel->delete_this($id);
    }
	
	public function check_overtime() {
        $overtime_name = $_POST['overtime_name'];  
        $id = $_POST['id'];


        if(empty($id)){
            $check_overtime = $this->OvertimeRulesModel->get_row_data('master_overtime_rules',array('overtime_name'=>$overtime_name));
        }else{
            $check_overtime = $this->OvertimeRulesModel->checkovertime($overtime_name,$id);
        }


        if(!empty($check_overtime)){
            echo 'This Overtime Name is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }

}
/* End of file admin.php */
/* Location: ./application/modules/overtime_rules/controllers/admin.php */
