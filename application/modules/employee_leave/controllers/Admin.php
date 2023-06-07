<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for employee_leave [HMVC]. Handles all the datatypes and methodes required
 * for employee_leave section of future
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
        $this->load->model('admin/EmpLeaveModel');
    }

    /**
     * Index Page for this employee_leave controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
		if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){
        $all_data = $this->EmpLeaveModel->load_all_data_by_empid($this->session->userdata('futureAdmin')->detail->employee_id);
		}else{ 
		$all_data = $this->EmpLeaveModel->load_all_data();
		}
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       //echo "<pre>"; print_r($all_data); die;
        if($id){
            $this->load->view('employee_leave/admin/list',$this->data);
        }else{
            $this->middle = 'employee_leave/admin/list';
        $this->layout();
        }
    }
	
	
	 public function search_leave() {
		 
		 $this->data = array();
        //echo "<pre>"; print_r($_POST); die;
    
        $stDate = $_POST['st_date'];  
		$end_date = $_POST['end_date']; 
		
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;

       // $this->data['all_data'] = $this->AttendanceModel->load_all_data();

       
       // echo "<pre>"; print_r($this->data['all_data']); //die;

        if($stDate!='' && $end_date!=''){
            //echo "<pre>"; print_r('r'); die;

            $this->data['start_date'] = date('Y-m-d',strtotime($stDate));
			$this->data['end_date'] = date('Y-m-d',strtotime($end_date));
            $this->data['data_month'] = date('m', strtotime($stDate));
            $this->data['data_year'] = date('Y', strtotime($stDate));

           // $this->data['all_data'] = $this->AttendanceModel->load_all_empp(); load_all_data_by_empid_by_date($empid,$start_date,$end_date)
			if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){
			$this->data['all_data'] = $this->EmpLeaveModel->load_all_data_by_empid_by_date($this->session->userdata('futureAdmin')->detail->employee_id,$this->data['start_date'],$this->data['end_date']);
			}else{ 
			$this->data['all_data'] = $this->EmpLeaveModel->load_all_data_by_date($this->data['start_date'],$this->data['end_date']);
			}

        }else{
            //echo "<pre>"; print_r('g'); die;
            $this->data['start_date'] = date('Y-m-d');
			$this->data['end_date'] = date('Y-m-d');
            $this->data['data_month'] = date('m');
            $this->data['data_year'] = date('Y');

			if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){
			$this->data['all_data']  = $this->EmpLeaveModel->load_all_data_by_empid_by_date($this->session->userdata('futureAdmin')->detail->employee_id,$this->data['start_date'],$this->data['end_date']);
			}else{ 
			$this->data['all_data']  = $this->EmpLeaveModel->load_all_data_by_date($this->data['start_date'],$this->data['end_date']);
			}
            //$this->data['all_data'] = $this->AttendanceModel->load_all_empp();
        }

         $view = $this->load->view('employee_leave/admin/list_ajax',$this->data, TRUE);
         echo $view; exit(); 
    }

    /**
     * add/edit save for this employee_leave controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        //if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;
        //echo "<pre>"; print_r($_FILES); die;		
        //$flg = $this->EmpLeaveModel->modify($id);            
        //} 
			$passport_image = $_FILES['passport_image'];
			$leave_from = $this->input->post('leave_from');
			$leave_total_days = $this->input->post('leave_total_days');
			$leave_type = !empty($this->input->post('leave_type')) ? $this->input->post('leave_type') : '0';
			$leave_note = $this->input->post('leave_note');
			$employee_id = $this->input->post('employee_id');
          $flg = $this->EmpLeaveModel->modify($id,$employee_id,$leave_from,$leave_type, $leave_total_days,$leave_note,$passport_image);
			
        
        }
    


    /**
     * edit Page load for this employee_leave controller.
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
            $this->data['data_single'] = $this->EmpLeaveModel->load_single_data($id);
            $this->data['id'] = $id;  
            $this->data['all_leave_type'] = $this->EmpLeaveModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));
            $employee_details = $this->EmpLeaveModel->get_row_data('employee',array('id'=>$this->data['data_single']->employee_id));
        //echo "<pre>"; print_r($employee_details); die;
        $leave_details = $this->EmpLeaveModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));

        //echo "<pre>"; print_r($leave_details); die;

        $emp_leave = explode(',', $leave_details->leave_rule_id);

       // echo "<pre>"; print_r($emp_leave); die;

        $this->data['emp_leave'] = $emp_leave;


        } 
        
        $this->data['all_employee'] = $this->EmpLeaveModel->get_result_data_with_order_by('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('employee_leave/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }

     public function get_form_view() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id']; 
        $employee_id = $_POST['employee_id']; 
        $status = $_POST['status'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->EmpLeaveModel->load_single_data($id);
            $this->data['id'] = $id;  
            $this->data['all_leave_type'] = $this->EmpLeaveModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));
            $employee_details = $this->EmpLeaveModel->get_row_data('employee',array('id'=>$this->data['data_single']->employee_id));
       // echo "<pre>"; print_r($this->data['data_single']->leave_type_id); die;
        $leave_details = $this->EmpLeaveModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));

        //echo "<pre>"; print_r($leave_details); die;

        $emp_leave = explode(',', $leave_details->leave_rule_id);

       // echo "<pre>"; print_r($emp_leave); die;

        $this->data['emp_leave'] = $emp_leave;
if($this->data['data_single']->leave_type_id != '0'){
  $datanew = $this->EmpLeaveModel->load_single_data($id);
            $leave_type = $this->EmpLeaveModel->get_row_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N','id'=>$datanew->leave_type_id));
            $resultnew = $this->EmpLeaveModel->leave_due_day($leave_type->id, $employee_id);
            $duenew = $resultnew;
            if ($status == 'Yes') {
            $leave_application = $this->EmpLeaveModel->get_row_data('employee_leave_application',array('id'=>$id));
            if(!empty($leave_application)){
            if($leave_application->leave_total_days <= $duenew){
            $view2 = 'Your leaves deduct from your leave balance';
            }else{
            //echo 'Done';
            $view2 =  'Your leave balance is '.$duenew.' and you takes '.$leave_application->leave_total_days.' leaves.Rest of the leaves treated as LOP.' ;  
            }
            }
            }else{
            $view2 = 'leave cancelled';
            }
          }else{
            $view2 = 'Your leaves treated as LOP';
          }

            


        } 
        
        $this->data['all_employee'] = $this->EmpLeaveModel->get_result_data_with_order_by('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('employee_leave/admin/form_view',$this->data, TRUE);
        echo $view.'^~'.$view2; exit();         
    }


     public function get_opening_form() {
        $this->data = array();
       // echo "<pre>"; print_r($_POST); die;
        $id = $_POST['id'];  

        if (!empty($id)) {
            $this->data['data_single'] = $this->EmpLeaveModel->load_single_data($id);
            $this->data['id'] = $id;  
            $this->data['all_leave_type'] = $this->EmpLeaveModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));


            $employee_details = $this->EmpLeaveModel->get_row_data('employee',array('id'=>$this->data['data_single']->employee_id));
        //echo "<pre>"; print_r($employee_details); die;
        $leave_details = $this->EmpLeaveModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));

        //echo "<pre>"; print_r($leave_details); die;

        $emp_leave = explode(',', $leave_details->leave_rule_id);

       // echo "<pre>"; print_r($emp_leave); die;

        $this->data['emp_leave'] = $emp_leave;


        } 

        $this->data['all_leaves'] = $this->EmpLeaveModel->get_result_data('master_leave_rules', array('delete_flag' => 'N', 'is_active' => 'Y'));
        
        $this->data['all_employee'] = $this->EmpLeaveModel->get_result_data_with_order_by('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('employee_leave/admin/opening_leave',$this->data, TRUE);
        echo $view; exit();         
    }



    


    public function get_employee_leave() {
        //echo "<pre>"; print_r($_POST); die;

        $employee_details = $this->EmpLeaveModel->get_row_data('employee',array('id'=>$_POST['id']));
        //echo "<pre>"; print_r($employee_details->status); die; //Trainee
        if($employee_details->status != 'Trainee'){
        $leave_details = $this->EmpLeaveModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));

        //echo "<pre>"; print_r($leave_details); die;

        $emp_leave = explode(',', @$leave_details->leave_rule_id);

       // echo "<pre>"; print_r($emp_leave); die;

        $all_leave_type = $this->EmpLeaveModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));
       //echo '<pre>'; print_r($all_leave_type); die;

        $html = '<label>Leave Type</label><select id="leave_type" onchange="check_available_leave();" name="leave_type" class="form-control"><option value="">Select</option>';              
                if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, @$emp_leave)){
                    if($_POST['id']!=''){
                       $result =  $this->EmpLeaveModel->leave_due_day($value->id,$_POST['id']);
                       //$result1 =  $this->EmpLeaveModel->settlement_due_day($value->id,$_POST['id']);
                       if(!empty($result)){
                          $due=$result;
                      }else{
                        $due=0;
                      }
                     
                    }else{
                        $due=0;
                    }
                   
                        $html .= '<option value="'.$value->id.'">'.$value->rule_name .'( Balance: '.$due.' )</option>';
                    
               
                } }
                }             
              
             $html .= '</select>
             <span id="leave_error" style="color:red"></span>';


             $html2= '';
              if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, $emp_leave)){
                    if($_POST['id']!=''){
                       //$result=  $this->EmpLeaveModel->leave_due_day($value->id,$_POST['id']);
                       //$result1 =  $this->EmpLeaveModel->settlement_due_day($value->id,$_POST['id']);
                       $result=  $this->EmpLeaveModel->leave_due_day($value->id,$_POST['id']);
                       if(!empty($result)){
                          $due=$result;
                      }else{
                        $due=0;
                      }
                    }else{
                        $due=0;
                    }                
                 $html2 .= '<input type="hidden" name="due_leave'.$value->id.'" id="due_leave'.$value->id.'" value="'.$due.'" />';
                
                } }
                }
              }else{
                $html = '';
                $html2 = '';
              }
            echo $html.'##'.$html2; exit();

    }

    public function check_unapproved_leaves_of_employee() {
        //echo "<pre>"; print_r($_POST); die;
         $check_exist = $this->db->query("SELECT * FROM `HR_employee_leave_application` WHERE `approved` Is NULL AND `employee_id` = ".$_POST['id']." ")->result();
         $total_leaves = $this->db->query("SELECT sum(leave_total_days) as leave_total_days  FROM `HR_employee_leave_application` WHERE `approved` Is NULL AND `employee_id` = ".$_POST['id']." ")->row();
         //print_r($total_leaves->leave_total_days); die;
         if(!empty($check_exist) && !empty($total_leaves)){

          echo 'exist@'.$total_leaves->leave_total_days; exit();
         }else{
          echo 'Notexist@0'; exit();
         }
        

    }

    public function approval_status($id = NULL, $status = NULL, $employee_id = NULL, $approvalnote= NULL) {


        $this->data['id'] = $employee_id;

        $datanew = $this->EmpLeaveModel->load_single_data($id);

        $leave_type = $this->EmpLeaveModel->get_row_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N','id'=>$datanew->leave_type_id));

        $resultnew = $this->EmpLeaveModel->leave_due_day($leave_type->id, $employee_id);
        //echo $resultnew; die;

        $duenew = $resultnew;
        //  echo @$datanew->leave_type_id.'@'.@$leave_type->unit.'@'.@$resultnew; exit;
        if ($status == 'Yes') {
            $leave_application = $this->EmpLeaveModel->get_row_data('employee_leave_application',array('id'=>$id));
            if(!empty($leave_application)){
                if($leave_application->leave_total_days <= $duenew){
                    //echo 'Your leaves deduct from your leave balance';
                    $data11['approved'] = $status;
					if($approvalnote != '1'){
					$data11['approvalnote'] = $approvalnote;
					}
                    $this->db->where('id', $id);
                    $this->db->update('HR_employee_leave_application', $data11);
                    $empleave = $this->EmpLeaveModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$leave_application->leave_type_id,'employee_id'=>$leave_application->employee_id));
                    $data = array(
                        'leave_application_id' => $leave_application->id,
                        'employee_id' =>  $leave_application->employee_id,
                        'leave_id'  => $leave_application->leave_type_id,
                        'opening_balance' =>'-'.$leave_application->leave_total_days,
                        'taken_leaves' =>$leave_application->leave_total_days,
                        'entry_date' => date('Y-m-d',strtotime($leave_application->leave_from)),
                        'date' =>date('Y-m-d',strtotime($leave_application->leave_from)),
                        'credited_month' =>date('F',strtotime($leave_application->leave_from)),
                        'type' => 'approved',
                         'closing_balance' => $empleave->closing_balance - $leave_application->leave_total_days,
                        'note' => $leave_application->leave_note,
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                }else{
                    //echo 'Done';
                   // echo 'Your leave balance is '.$duenew.' and you takes '.$leave_application->leave_total_days.' leaves.Rest of the leaves treated as LOP.' ;

                    $leavebal = $this->EmpLeaveModel->leave_due_day($leave_type->id, $employee_id);
                    $data11['approved'] = $status;
					if($approvalnote != '1'){
					$data11['approvalnote'] = $approvalnote;
					}
                    $this->db->where('id', $id);
                    $this->db->update('HR_employee_leave_application', $data11);
                    if(floor($leavebal)> 0){
                         $dataleave = array(
                        'leave_application_id' => $leave_application->id,
                        'employee_id' =>  $leave_application->employee_id,
                        'leave_id'  => $leave_application->leave_type_id,
                        'opening_balance' =>'-'.$leavebal,
                        'taken_leaves' =>$leavebal,
                        'entry_date' => date('Y-m-d',strtotime($leave_application->leave_from)),
                        'date' =>date('Y-m-d',strtotime($leave_application->leave_from)),
                        'credited_month' =>date('F',strtotime($leave_application->leave_from)),
                        'type' => 'approved',
                         'closing_balance' =>'',
                        'note' => $leave_application->leave_note,
                        );
                        $this->db->insert(tablename('employee_leaves'), $dataleave);

                        $datalop = array(
                        'leave_application_id' => $leave_application->id,
                        'employee_id' =>  $leave_application->employee_id,
                        //'leave_id'  => $leave_application->leave_type_id,
                        
                        'lop' =>$leave_application->leave_total_days - $leavebal,
                        'entry_date' => date('Y-m-d',strtotime($leave_application->leave_from)),
                        'date' =>date('Y-m-d',strtotime($leave_application->leave_from)),
                        'credited_month' =>date('F',strtotime($leave_application->leave_from)),
                        'type' => 'approved',
                         'closing_balance' =>'',
                        'note' => $leave_application->leave_note,
                        );
                        $this->db->insert(tablename('employee_leaves'), $datalop);
                    }else{
                         $datalop = array(
                        'leave_application_id' => $leave_application->id,
                        'employee_id' =>  $leave_application->employee_id,
                        //'leave_id'  => $leave_application->leave_type_id,
                       
                        'lop' =>$leave_application->leave_total_days,
                        'entry_date' => date('Y-m-d',strtotime($leave_application->leave_from)),
                        'date' =>date('Y-m-d',strtotime($leave_application->leave_from)),
                        'credited_month' =>date('F',strtotime($leave_application->leave_from)),
                        'type' => 'approved',
                         'closing_balance' =>'',
                        'note' => $leave_application->leave_note,
                        );
                        $this->db->insert(tablename('employee_leaves'), $datalop);
                    }
                    //echo 'done';
                }
            }
        }else{
            //echo 'leave cancelled';
            $leavebal = $this->EmpLeaveModel->leave_due_day($leave_type->id, $employee_id);
                    $data11['approved'] = $status;
					if($approvalnote != '1'){
					$data11['approvalnote'] = $approvalnote;
					}
                    $this->db->where('id', $id);
                    $this->db->update('HR_employee_leave_application', $data11);

                    $this->db->where('leave_application_id', $id);
                    $this->db->delete('HR_employee_leaves'); 


        }
        /*if ($status == 'Yes') {
            if ($duenew <= 0 || $duenew <= '0.5') {
                echo 'no'; 
               $leave_application = $this->EmpLeaveModel->get_row_data('employee_leave_application',array('id'=>$id));
               echo $leave_application->leave_total_days;
               //print_r($leave_application);
            } else {
                $data11['approved'] = $status;
                $this->db->where('id', $id);
                $this->db->update('HR_employee_leave_application', $data11);
                $leave_application = $this->EmpLeaveModel->get_row_data('employee_leave_application',array('id'=>$id));
                
                if(!empty($leave_application)){
                $empleave = $this->EmpLeaveModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$leave_application->leave_type_id,'employee_id'=>$leave_application->employee_id));
                // echo '<pre>'; print_r($empleave); die;
                    $data = array(
                        'leave_application_id' => $leave_application->id,
                        'employee_id' =>  $leave_application->employee_id,
                        'leave_id'  => $leave_application->leave_type_id,
                        'opening_balance' =>'-'.$leave_application->leave_total_days,
                        'taken_leaves' =>$leave_application->leave_total_days,
                        'entry_date' => date('Y-m-d',strtotime($leave_application->leave_from)),
                        'date' =>date('Y-m-d',strtotime($leave_application->leave_from)),
                        'credited_month' =>date('F',strtotime($leave_application->leave_from)),
                        'type' => 'approved',
                         'closing_balance' => $empleave->closing_balance - $leave_application->leave_total_days,
                        'note' => $leave_application->leave_note,
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                }

                $this->session->set_flashdata('successmessage', 'Leave Status changed successfully');
                echo 'done'; 
            }
        } else {
            // echo $status; exit; die;
            $data11['approved'] = $status;
            $this->db->where('id', $id);
            $this->db->update('HR_employee_leave_application', $data11);
            $leave_application = $this->EmpLeaveModel->get_row_data('employee_leave_application',array('id'=>$id));
             if(!empty($leave_application)){
                    $empleave = $this->EmpLeaveModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$leave_application->leave_type_id,'employee_id'=>$leave_application->employee_id));
                   //echo '<pre>'; print_r($empleave); die;
                    $this->db->where('leave_application_id', $id);
                    $this->db->delete('HR_employee_leaves'); 

                }

            $this->session->set_flashdata('successmessage', 'Leave Status changed successfully');
             echo 'done'; 
        }*/


        exit();
    }

     public function approval_status_check($id = NULL, $status = NULL, $employee_id = NULL) {
        $this->data['id'] = $employee_id;
        $datanew = $this->EmpLeaveModel->load_single_data($id);
        $leave_type = $this->EmpLeaveModel->get_row_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N','id'=>$datanew->leave_type_id));
        $resultnew = $this->EmpLeaveModel->leave_due_day($leave_type->id, $employee_id);
        $duenew = $resultnew;
        if ($status == 'Yes') {
            $leave_application = $this->EmpLeaveModel->get_row_data('employee_leave_application',array('id'=>$id));
            if(!empty($leave_application)){
                if($leave_application->leave_total_days <= $duenew){
                    echo 'Your leaves deduct from your leave balance';
                }else{
                    //echo 'Done';
                    echo 'Your leave balance is '.$duenew.' and you takes '.$leave_application->leave_total_days.' leaves.Rest of the leaves treated as LOP.' ;  
                }
            }
        }else{
            echo 'leave cancelled';
        }
        
        exit();
    }



    public function search() {
        //echo "<pre>"; print_r($_POST); die;
        $all_data = $this->EmpLeaveModel->load_all_data_search($_POST['start_date'],$_POST['end_date'],$_POST['type']);        
        $data = array();        
        $data['all_data'] = $all_data;
        $data['type'] = $_POST['type'];
       //echo "<pre>"; print_r($all_data); die;
       $html = $this->load->view('employee_leave/admin/leave',$data,TRUE);        
       echo $html; exit();
    }
    public function employee_leave_search_month() {
        //  echo $employee_id;exit;
        $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       
       $employee=  $this->EmpLeaveModel->get_employee_details();
       $data['month'] =$month;
        $data['year'] =$year;
      // $data['leave_details']=
       if(!empty($employee))
       {
           foreach ($employee as $value) {
               
         //$data=  $employee;
      $data['details'][]= $this->get_leave_details($month,$year,$value->id); 
    
      //  echo '<pre>';print_r($data['leave_details']);
       }
           }
       //  echo '<pre>';print_r($data);exit;
            $html = $this->load->view('employee_leave/admin/register_leave',$data,TRUE);        
       echo $html; exit();
       
     }
       public function get_leave_details($month,$year,$employee_id){

        $data = array();
        
        
        
         $mdate = $year.'-'.$month;

        $pre_mth = strtoupper(date("Y-m", strtotime($mdate . " last month"))); //die;
        $exp_pre_mth = explode('-', $pre_mth);
        $pre_month = $exp_pre_mth[1];
        $pre_year =  $exp_pre_mth[0];

        //echo date('Y-m',strtotime("first day of last month")); die;

          /**** leave ****/

          // check previous year month leave balance 
          $check_leave_balance=$this->EmpLeaveModel->get_row_data('employee_payroll_leave_info',array('is_active'=>'Y','delete_flag'=>'N','employee_id'=>$employee_id,'month'=>@$pre_month,'year'=>@$pre_year));

         // echo "<pre>"; print_r($check_leave_balance); die;

          if(empty($check_leave_balance)){
            $opening_leave = 0;
          }else{
            $opening_leave = @$check_leave_balance->balance_leave;
          }
                                    
                                    
        $totaldayofthismonth=cal_days_in_month(CAL_GREGORIAN, @$month, @$year);
        $data['totaldayofthismonth'] =$totaldayofthismonth;
        $total_attendance=$this->EmpLeaveModel->get_total_attendence_of_employee($employee_id,@$month,@$year);
       // echo $total_attendance;exit;
       // print_r($total_attendance);exit;
         $data['total_attendance'] =$total_attendance;
         $absent_day=$totaldayofthismonth - $total_attendance;
         $data['absent_day'] = $absent_day;
         if($total_attendance!=$totaldayofthismonth){
        // echo '1';exit;
         $total_leave_taken = $this->EmpLeaveModel->total_leave_taken($employee_id,@$month,@$year); 
         //echo '<pre>';print_r($total_leave_taken);exit;
         $leavetakeArr=array();
     if(!empty($total_leave_taken))
     {
        foreach ($total_leave_taken as $leave_take) {
         $allleavedates = new DatePeriod(
     new DateTime($leave_take->leave_from),
     new DateInterval('P1D'),
     new DateTime($leave_take->leave_to)
);
   
     foreach ($allleavedates as $key => $value) {
       // echo $value->format('Y-m-d').'@'; exit;           
       if(date('m',strtotime($value->format('Y-m-d'))) == date('m')){                           
        $leavetakeArr[]=$value->format('Y-m-d');
    }
        }

        if(date('m',strtotime($leave_take->leave_to)) == date('m')){                           
         array_push($leavetakeArr,$leave_take->leave_to);
    }
       

     } }
       
         }
         
         if(!empty($leavetakeArr))
         {
            $leavetake= count($leavetakeArr);
         }
         else{
             $leavetake= 0;
         }
         
        // echo '<pre>';print_r($data['total_attendance']);exit;
        $data['all_data'] = $this->EmpLeaveModel->load_all_saved_payroll_employee_id(@$month,@$year,$employee_id);
       // echo '<pre>';print_r($data['all_data']);exit;
        $leave_type_for_this_employee= $this->EmpLeaveModel->leave_type_for_this_employee(@$data['all_data']->grade);
        $leave_type=array();
        if(!empty($leave_type_for_this_employee)){
           
            $leave_type=explode(',',$leave_type_for_this_employee->leave_rule_id);
            
        }
       
        $earn_leave_monthly = 0;
       // $opening_leave = 0;
        if(!empty($leave_type))
        {
            foreach ($leave_type as $value) {
              $leave_type_details = $this->EmpLeaveModel->leave_type_details(@$value); 

              if(!empty($leave_type_details)){
                $num_padded = sprintf("%02d", $leave_type_details->period_day);
                $ddt = date('d');
                $mmt = $month;
                $mmtt = date('m',strtotime($leave_type_details->period_month));
               // echo $num_padded; //exit;
              // echo "<br>".$ddt;

                if(($leave_type_details->credit_month=='Monthly') && ((int)$ddt >= (int)$num_padded)){
                    $earn_leave_monthly += 1;  
                }

                if(($leave_type_details->credit_month=='Yearly') && ((int)$ddt >= (int)$num_padded)  && ((int)$mmt == (int)$mmtt)){
                $opening_leave += $leave_type_details->unit;
              }
            
              }

            } 
        }

        $balance_leave = (($opening_leave + $earn_leave_monthly) - $leavetake);

        $data['opening_leave']= $opening_leave;
        $data['earn_leave_monthly']= $earn_leave_monthly;
        $data['leavetake']= $leavetake;
        $data['balance_leave']= $balance_leave;

       // echo "<pre>"; print_r($data); die;
        return $data;
     }
	 
	   public function delselected_image() {
        //print_r($_POST); die;
        $primarykey = $_POST['primarykey'];
        $selectedimg = $_POST['selectedimg'];
        $table = $_POST['table'];
         $field = $_POST['field'];
		 $tablefield = $_POST['tablefield'];
       // print_r($_POST); die;
        $view = $this->EmpLeaveModel->delete_selected_image($primarykey,$selectedimg,$table,$field,$tablefield);
        //$view = $this->load->view('employees_details/admin/changeofstatus_details', $this->data, TRUE);
        //$view = '44';
        echo $view;
        exit();
    }

}
/* End of file admin.php */
/* Location: ./application/modules/employee_leave/controllers/admin.php */
