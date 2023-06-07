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
        $this->load->model('admin/EmpLoanModel');
    }

    /**
     * Index Page for this employee_leave controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id=NULL) {
       // $all_data = $this->EmpLoanModel->load_all_data();
        $loan_application = $this->EmpLoanModel->load_all_data($id);
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['loan_application'] = $loan_application;
       //echo "<pre>"; print_r($all_data); die;
        if($id){
            $this->load->view('employee_loan/admin/list',$this->data);
        }else{
            $this->middle = 'employee_loan/admin/list';
        $this->layout();
        }
    }

    public function delete($id) {
        $this->EmpLoanModel->delete_this($id);
    }

    /**
     * add/edit save for this employee_leave controller.
     *
     * @access  public
     * @param   id
     * @return  string
     */

     public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->EmpLoanModel->modify($id);            
        }        
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
            $this->data['data_single'] = $this->EmpLoanModel->load_single_data($id);
            $this->data['id'] = $id;  
            $this->data['all_leave_type'] = $this->EmpLoanModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));


            $employee_details = $this->EmpLoanModel->get_row_data('employee',array('id'=>$this->data['data_single']->employee_id));
        //echo "<pre>"; print_r($employee_details); die;
        $leave_details = $this->EmpLoanModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));

        //echo "<pre>"; print_r($leave_details); die;

        $emp_leave = explode(',', $leave_details->leave_rule_id);

       // echo "<pre>"; print_r($emp_leave); die;

        $this->data['emp_leave'] = $emp_leave;


        } 
        
        $this->data['all_employee'] = $this->EmpLoanModel->get_result_data('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        //echo "<pre>"; print_r($this->data['data_single']); //die;
        $view = $this->load->view('employee_loan/admin/form',$this->data, TRUE);
        echo $view; exit();         
    }


    public function get_employee_leave() {
        //echo "<pre>"; print_r($_POST); die;

        $employee_details = $this->EmpLoanModel->get_row_data('employee',array('id'=>$_POST['id']));
        //echo "<pre>"; print_r($employee_details); die;
        $leave_details = $this->EmpLoanModel->get_row_data('master_grade',array('id'=>@$employee_details->grade));

        //echo "<pre>"; print_r($leave_details); die;

        $emp_leave = explode(',', @$leave_details->leave_rule_id);

       // echo "<pre>"; print_r($emp_leave); die;

        $all_leave_type = $this->EmpLoanModel->get_result_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N'));

        $html = '<label>Leave Type</label><select id="leave_type" name="leave_type" class="form-control" onchange="getsettelementleave();"><option>Select</option>';              
                if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, @$emp_leave)){
                    if($_POST['id']!=''){
                       $result=  $this->EmpLoanModel->leave_due_day($value->id,$_POST['id']);
                       $result1 =  $this->EmpLoanModel->settlement_due_day($value->id,$_POST['id']);
                       $due=$value->unit - ($result + $result1);
                    }else{
                        $due=0;
                    }
                 $html .= '<option value="'.$value->id.'">'.$value->rule_name .'( Due: '.$due.' )</option>';
                
                } }
                }             
              
             $html .= '</select>';


             $html2= '';
              if(!empty($all_leave_type))
                {
                foreach ($all_leave_type as $value) {
                    if(in_array($value->id, $emp_leave)){
                    if($_POST['id']!=''){
                       $result=  $this->EmpLoanModel->leave_due_day($value->id,$_POST['id']);
                       $result1 =  $this->EmpLoanModel->settlement_due_day($value->id,$_POST['id']);
                       $due=$value->unit - ($result + $result1);
                    }else{
                        $due=0;
                    }                
                 $html2 .= '<input type="hidden" name="due_leave'.$value->id.'" id="due_leave'.$value->id.'" value="'.$due.'" />';
                
                } }
                }


            echo $html.'##'.$html2; exit();





    }

    public function approval_status($id = NULL, $status = NULL, $employee_id = NULL) {


        $this->data['id'] = $employee_id;

        $datanew = $this->EmpLoanModel->load_single_data($id);

        $leave_type = $this->EmpLoanModel->get_row_data('master_leave_rules',array('is_active'=>'Y','delete_flag'=>'N','id'=>$datanew->leave_type_id));

        $resultnew = $this->EmpLoanModel->leave_due_day($leave_type->id, $employee_id);


        $duenew = $leave_type->unit - $resultnew;
        //  echo @$datanew->leave_type_id.'@'.@$leave_type->unit.'@'.@$resultnew; exit;
        // echo$status;exit;
        if ($status == 'Yes') {
            if ($duenew <= 0) {
                echo 'no'; 
            } else {
                $data11['approved'] = $status;
                $this->db->where('id', $id);
                $this->db->update('HR_employee_leave_application', $data11);                
                $this->session->set_flashdata('successmessage', 'Leave Status changed successfully');
                echo 'done'; 
            }
        } else {

            $data11['approved'] = $status;
            $this->db->where('id', $id);
            $this->db->update('HR_employee_leave_application', $data11);
            $this->session->set_flashdata('successmessage', 'Leave Status changed successfully');
             echo 'done'; 
        }


        exit();
    }



    public function search() {
        //echo "<pre>"; print_r($_POST); die;
        $all_data = $this->EmpLoanModel->load_all_data_search($_POST['start_date'],$_POST['end_date'],$_POST['type']);        
        $data = array();        
        $data['all_data'] = $all_data;
        $data['type'] = $_POST['type'];
       //echo "<pre>"; print_r($all_data); die;
       $html = $this->load->view('employee_loan/admin/leave',$data,TRUE);        
       echo $html; exit();
    }
    public function employee_leave_search_month() {
        //  echo $employee_id;exit;
        $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       
       $employee=  $this->EmpLoanModel->get_employee_details();
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
            $html = $this->load->view('employee_loan/admin/register_leave',$data,TRUE);        
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
          $check_leave_balance=$this->EmpLoanModel->get_row_data('employee_payroll_leave_info',array('is_active'=>'Y','delete_flag'=>'N','employee_id'=>$employee_id,'month'=>@$pre_month,'year'=>@$pre_year));

         // echo "<pre>"; print_r($check_leave_balance); die;

          if(empty($check_leave_balance)){
            $opening_leave = 0;
          }else{
            $opening_leave = @$check_leave_balance->balance_leave;
          }
                                    
                                    
        $totaldayofthismonth=cal_days_in_month(CAL_GREGORIAN, @$month, @$year);
        $data['totaldayofthismonth'] =$totaldayofthismonth;
        $total_attendance=$this->EmpLoanModel->get_total_attendence_of_employee($employee_id,@$month,@$year);
       // echo $total_attendance;exit;
       // print_r($total_attendance);exit;
         $data['total_attendance'] =$total_attendance;
         $absent_day=$totaldayofthismonth - $total_attendance;
         $data['absent_day'] = $absent_day;
         if($total_attendance!=$totaldayofthismonth){
        // echo '1';exit;
         $total_leave_taken = $this->EmpLoanModel->total_leave_taken($employee_id,@$month,@$year); 
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
        $data['all_data'] = $this->EmpLoanModel->load_all_saved_payroll_employee_id(@$month,@$year,$employee_id);
       // echo '<pre>';print_r($data['all_data']);exit;
        $leave_type_for_this_employee= $this->EmpLoanModel->leave_type_for_this_employee(@$data['all_data']->grade);
        $leave_type=array();
        if(!empty($leave_type_for_this_employee)){
           
            $leave_type=explode(',',$leave_type_for_this_employee->leave_rule_id);
            
        }
       
        $earn_leave_monthly = 0;
       // $opening_leave = 0;
        if(!empty($leave_type))
        {
            foreach ($leave_type as $value) {
              $leave_type_details = $this->EmpLoanModel->leave_type_details(@$value); 

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

}
/* End of file admin.php */
/* Location: ./application/modules/employee_leave/controllers/admin.php */
