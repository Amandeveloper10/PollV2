<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for designation [HMVC]. Handles all the datatypes and methodes required
 * for designation section of future
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
        $this->load->model('admin/DesiModel');
    }

    /**
     * Index Page for this designation controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
        $all_data = $this->DesiModel->load_all_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('leave_settlement/admin/list',$this->data);
        }else{
            $this->middle = 'leave_settlement/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this designation controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->DesiModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this designation controller.
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
            $this->data['data_single'] = $this->DesiModel->load_single_data($id);
            //echo '<pre>'; print_r($this->data['data_single']); die;
            $this->data['id'] = $id;  
          
        }  
         $this->data['load_all_employee'] = $this->DesiModel->load_all_employee();
       // echo "<pre>"; print_r($this->data['load_all_employee']); //die;
        $view = $this->load->view('leave_settlement/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status designation controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->DesiModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->DesiModel->delete_this($id);
    }

    public function get_employee_leave() {
        //echo "<pre>"; print_r($_POST); die;

        $employee_details = $this->DesiModel->get_row_data('employee',array('id'=>$_POST['id']));
        //echo "<pre>"; print_r($employee_details); die;
        $leave_details = $this->DesiModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));

        //echo "<pre>"; print_r($leave_details); die;

        $emp_leave = explode(',', @$leave_details->leave_rule_id);

       // echo "<pre>"; print_r($emp_leave); die;

        $all_leave_type = $this->DesiModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));

        $html = '<label>Leave Type</label><select id="leave_type" name="leave_type" class="form-control" onchange="getsettelementleave();"><option>Select</option>';              
                if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, @$emp_leave)){
                    if($_POST['id']!=''){
                       $result =  $this->DesiModel->leave_due_day($value->id,$_POST['id']);
                       $result1 =  $this->DesiModel->settlement_due_day($value->id,$_POST['id']);
                       $due=$value->unit - ($result + $result1);
                    }else{
                        $due=0;
                    }
                 $html .= '<option value="'.$value->id.'">'.$value->rule_name .'( Due: '.$due.' )</option>';
                
                } }
                }             
              
             $html .= '</select>';


             $html2= '<label for="" class="form-control-label">Settlement leaves</label>';
              if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, $emp_leave)){
                    if($_POST['id']!=''){
                       $result=  $this->DesiModel->leave_due_day($value->id,$_POST['id']);
                       $result1 =  $this->DesiModel->settlement_due_day($value->id,$_POST['id']);
                       $due=$value->unit - ($result + $result1);
                    }else{
                        $due=0;
                    }                
                 $html2 .= '<input type="hidden" class="form-control"  name="due_leave'.$value->id.'" id="due_leave'.$value->id.'" value="'.$due.'" />';
                
                } }
                }


            echo $html.'##'.$html2; exit();





    }
}
/* End of file admin.php */
/* Location: ./application/modules/designation/controllers/admin.php */
