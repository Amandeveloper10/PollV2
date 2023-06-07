<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for department [HMVC]. Handles all the datatypes and methodes required
 * for department section of future
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
        $this->load->model('admin/TimeoffModel');
    }

    /**
     * Index Page for this department controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
		if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){
        $all_data = $this->TimeoffModel->load_all_data_emp_id($this->session->userdata('futureAdmin')->detail->employee_id);
		}else{
		$all_data = $this->TimeoffModel->load_all_data();	
		}
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
		if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){
			$this->data['employeeid'] = $this->session->userdata('futureAdmin')->detail->employee_id;
			$this->data['mode'] = 'emp';
		}
       // echo "<pre>"; print_r($all_data); //die;
	   
        if($id){
            $this->load->view('timeoff/admin/list',$this->data);
        }else{
            $this->middle = 'timeoff/admin/list';
        $this->layout();
        }
    }

    /**
     * add/edit save for this department controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->TimeoffModel->modify($id);            
        }        
    }


    /**
     * edit Page load for this department controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */
    public function get_form() {
        $this->data = array();
        //echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];
		$employee_id = $_POST['employee_id'];
		$mode = $_POST['mode'];		

        if (!empty($id)) {
            $this->data['data_single'] = $this->TimeoffModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
		$this->data['employee_id'] = $employee_id;
		$this->data['mode'] = $mode;
        $load_all_employee = $this->TimeoffModel->load_all_employee();
        $this->data['load_all_employee'] = $load_all_employee;
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('timeoff/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


	   public function get_form_view() {
        $this->data = array();
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->TimeoffModel->load_single_data($id);
            $this->data['id'] = $id;  
        }  
        $load_all_employee = $this->TimeoffModel->load_all_employee();
        $this->data['load_all_employee'] = $load_all_employee;
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('timeoff/admin/form_view',$this->data, TRUE);
        echo $view; exit();         
    }


    /**
     * status department controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function status($id) {
        $this->TimeoffModel->status_change($id);
    }


    /**
     * delete membership controller.
     *
     * @access  public
     * @param   null
     * @return  string
     */

    public function delete($id) {
        $this->TimeoffModel->delete_this($id);
    }

     public function getallemployee() {
    
    $work_status = $_POST['work_status']; 
    $type_val = $_POST['type_val']; 
     
    $div='';

    $wfh_rule = $this->TimeoffModel->get_row_data('master_wfh_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));
    if($type_val == 'Personal'){
        $all_employee  = $this->TimeoffModel->get_result_data_with_order_by('employee', array('delete_flag' => 'N', 'is_active' => 'Y'));
    }else{
        if($work_status == 'OD'){
            $all_employee  = $this->TimeoffModel->get_result_data_with_order_by('employee', array('delete_flag' => 'N', 'is_active' => 'Y'));
        }else{
            if(!empty($wfh_rule) && $wfh_rule->enanle_type == 'all_employee'){
            $all_employee  = $this->TimeoffModel->get_result_data_with_order_by('employee', array('delete_flag' => 'N', 'is_active' => 'Y'));
            }else{
            $all_employee  = $this->TimeoffModel->get_result_data_with_order_by('employee', array('delete_flag' => 'N', 'is_active' => 'Y', 'wfh' => '1'));
			//echo '<pre>'; print_r($all_employee);
            }
        }
    }

    $div.='<select class="form-control select2" id="employee" name="employee">
    <option value="">Please select Employee</option>';

    if(!empty($all_employee))
    {
    foreach ($all_employee as $each_employee) {

    $div.= '<option value="'.$each_employee->id.'">'.$each_employee->first_name." ".$each_employee->middle_name." ".$each_employee->last_name.'</option>';

    }
    }

    $div.= '</select>';
    echo $div; exit();         
    }

      public function approval_status($id = NULL, $status = NULL, $employee_id = NULL,$timeoffapp = NULL) {
      //echo $status; die;

        $this->data['id'] = $employee_id;

       
        if ($status == 'Yes') {
            
                $data11['approved'] = $status;
				if($timeoffapp != '1'){
					$data11['approvalnote'] = $timeoffapp;
				}
                $this->db->where('id', $id);
                $this->db->update('HR_timeoff', $data11); 

                $officialdata = $this->TimeoffModel->get_row_data('timeoff', array('id' => $id,'type' => 'Official','delete_flag' => 'N', 'is_active' => 'Y')); 
                $startTime = strtotime($officialdata->from_date);
                $endTime = strtotime($officialdata->to_date);

                // Loop between timestamps, 24 hours at a time
                for ( $i = $startTime; $i <= $endTime; $i = $i + 86400 ) {
                $given_date =  date( 'Y-m-d', $i )."<br>"; 

                $data = array(
                //'date' => $att_date,
                'date' => $given_date,
                'employee_id' => $officialdata->employee_id,
                // 'type' => $type,
                //'att_type' => $att_type_val,
                'flag'=>'0',
                'entry_time' => $officialdata->entry_time,
                'out_time' => $officialdata->out_time,
                //'total_hour' => @$total_hour,
               // 'day_type' => @$day_type,
                // 'overTime' => @$overTime,
                'entry_date' => date('Y-m-d')
                );
                 if($officialdata->work_status == 'OD'){
                    $data['day_type'] = 'OD';
                 }elseif($officialdata->work_status == 'WFH'){
                    if($officialdata->deduction_type == 'Full'){
                        $data['day_type'] = 'Full Day';
                    }else{
                         $data['day_type'] = 'WFH';
                    }
                    
                    
                 }

                $this->db->insert(tablename('attendance'), $data);         
                // You can put your database insert query here
                //echo "Data for $given_date is inserted";
                if($officialdata->work_status == 'WFH' && $officialdata->deduction_type == 'Half'){
                 $empleave = $this->TimeoffModel->get_row_data_orderby('employee_leaves',array('leave_id'=>'1','employee_id'=>$officialdata->employee_id));
                 //print_r($empleave); die;
                    
                     if(!empty($empleave->closing_balance) && $empleave->closing_balance > '0'){

                     $dataleave = array(
                        'employee_id' =>  $officialdata->employee_id,
                        'entry_date' => date('Y-m-d',strtotime($given_date)),
                        'date' =>date('Y-m-d',strtotime($given_date)),
                        'credited_month' =>date('F',strtotime($given_date)),
                        'type' => 'WFH',
                         //'closing_balance' => $empleave->closing_balance - 1,
                        'note' => 'deduction',
                        'taken_leaves' => '0.5',
                         'leave_id' => '1',
                        'closing_balance' => $empleave->closing_balance - '0.5',
                         'opening_balance' => '-0.5',
                        );
                        //print_r($dataleave); die;
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                    }else{
                        $dataleave = array(
                        'employee_id' => $officialdata->employee_id,
                        'entry_date' => date('Y-m-d',strtotime($given_date)),
                        'date' =>date('Y-m-d',strtotime($given_date)),
                        'credited_month' =>date('F',strtotime($given_date)),
                        'type' => 'WFH',
                        'note' => 'deduction',
                        'lop' => '0.5',
                        'closing_balance' => '0',
                        );
                        
                        $this->db->insert(tablename('employee_leaves'), $dataleave);
                    }
                }

                   
                        
                        

                }

                /*while (strtotime($officialdata->from_date) <= strtotime($officialdata->to_date)) {
                //echo "$start_daten";
                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($officialdata->from_date)));
                $data = array(
                //'date' => $att_date,
                'date' => $start_date,
                'employee_id' => $officialdata->employee_id,
                // 'type' => $type,
                //'att_type' => $att_type_val,
                'flag'=>'0',
                'entry_time' => $officialdata->entry_time,
                'out_time' => $officialdata->out_time,
                //'total_hour' => @$total_hour,
                //'day_type' => @$day_type,
                // 'overTime' => @$overTime,
                'entry_date' => date('Y-m-d')
                );

                $this->db->insert(tablename('attendance'), $data);
                }*/

               

                
               // $this->session->set_flashdata('successmessage', 'Time off changed successfully');
                echo 'done'; 
            
        } else {
			//echo $status;

            $data11['approved'] = $status;
			if($timeoffapp != '1'){
					$data11['approvalnote'] = $timeoffapp;
				}
            $this->db->where('id', $id);
            $this->db->update('HR_timeoff', $data11);
            //$this->session->set_flashdata('successmessage', 'Time off Status changed successfully');
             echo 'done'; 
        }


        exit();
    }
}
/* End of file admin.php */
/* Location: ./application/modules/department/controllers/admin.php */
