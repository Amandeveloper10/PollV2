<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for leave_rules [HMVC]. Handles all the datatypes and methodes required
 * for leave_rules section of future
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
        $this->load->model('admin/LeaveRulesModel');
    }

    /**
     * Index Page for this leave_rules controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->LeaveRulesModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('leave_rules/admin/list',$this->data);
        }else{
            $this->middle = 'leave_rules/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this leave_rules controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->LeaveRulesModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this leave_rules controller.
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
            $this->data['data_single'] = $this->LeaveRulesModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('leave_rules/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status leave_rules controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->LeaveRulesModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->LeaveRulesModel->delete_this($id);
    }

     public function cron_leave_rules(){
        $all_leaves = $this->LeaveRulesModel->get_result_data('master_leave_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));
        foreach ($all_leaves as $value) {
           //echo $value->credit_month; die;
           if(trim($value->credit_month) == 'Yearly' && $value->period_month == date('F') && $value->period_day == date('d')){
             //echo '<pre>'; print_r($value); //die;
            $all_employee = $this->LeaveRulesModel->get_result_data('employee', array('delete_flag' => 'N', 'is_active' => 'Y'));
                if(!empty($all_employee)){
                foreach ($all_employee as $employee) {
                $empleave = $this->LeaveRulesModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$value->id,'employee_id'=>$employee->id));
                if(!empty($empleave)){
                   $data = array(
                        'employee_id' =>  $employee->id,
                        'credited_month' => $value->period_month,
                        'leave_id'  => $value->id,
                        'opening_balance' =>$value->unit,
                        'credited_leaves' =>$value->unit,
                        'entry_date' => date('Y-m-d'),
                        'date' =>date('Y-m-d'),
                        'type' => 'Yearly',
                        'closing_balance' => $empleave->closing_balance + $value->unit,
                        'note' => $value->period_month,
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                }else{
                    $data = array(
                        'employee_id' =>  $employee->id,
                        'credited_month' => date('F'),
                        'leave_id'  => $value->id,
                        'opening_balance' =>$value->unit,
                        'credited_leaves' =>$value->unit,
                        'entry_date' => date('Y-m-d'),
                         'date' =>date('Y-m-d'),
                        'type' => 'Monthly',
                         'closing_balance' => $value->unit,
                        'note' => date('F'),
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                }
                }
                }
                 
                 
           }elseif(trim($value->credit_month) == 'Monthly' && $value->period_day == date('d')){
              $all_employee = $this->LeaveRulesModel->get_result_data('employee', array('delete_flag' => 'N', 'is_active' => 'Y'));
                if(!empty($all_employee)){
                foreach ($all_employee as $employee) {
                    $empleave = $this->LeaveRulesModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$value->id,'employee_id'=>$employee->id));
                   // echo '<pre>'; print_r($empleave); die;
                    if(!empty($empleave)){
                   $data = array(
                        'employee_id' =>  $employee->id,
                        'credited_month' => date('F'),
                        'leave_id'  => $value->id,
                        'opening_balance' =>$value->unit,
                        'credited_leaves' =>$value->unit,
                        'entry_date' => date('Y-m-d'),
                         'date' =>date('Y-m-d'),
                        'type' => 'Monthly',
                         'closing_balance' => $empleave->closing_balance + $value->unit,
                        'note' => date('F'),
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                    }else{
                        $data = array(
                        'employee_id' =>  $employee->id,
                        'credited_month' => date('F'),
                        'leave_id'  => $value->id,
                        'opening_balance' =>$value->unit,
                        'credited_leaves' =>$value->unit,
                        'entry_date' => date('Y-m-d'),
                         'date' =>date('Y-m-d'),
                        'type' => 'Monthly',
                         'closing_balance' => $value->unit,
                        'note' => date('F'),
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                    }
                }
                }
           }
        }
       // echo '<pre>'; print_r($all_leaves); die;
    }
}
/* End of file admin.php */
/* Location: ./application/modules/leave_rules/controllers/admin.php */
