<?php
use Dompdf\Dompdf;
use Dompdf\Options;
/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for payroll [HMVC]. Handles all the datatypes and methodes required
 * for payroll section of future
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
        $this->load->model('admin/PayrollModel');
        $this->load->helper('common');
    }

    /**
     * Index Page for this payroll controller.
     *
     * @access  public
     * @param   $id = is used to check index is load after add/edit or directly
     * @return  string
     */
    public function index($id = NULL) {
        $all_data = $this->PayrollModel->load_all_data();
        $all_salary_structure = $this->PayrollModel->load_all_data_salary_structure();
        
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
        $this->data['all_salary_structure'] = $all_salary_structure;
        
       //   $this->data['employee_with_addhoc'] = $this->PayrollModel->load_all_employee_with_addhoc();
        // echo "<pre>"; print_r($all_data); //die;
            $SysConfigauthenticaton = checkConfig1();

            //echo '<pre>'; print_r($SysConfigauthenticaton->salary_cycle); die;
            $finalcialyeat_starting_month = $SysConfigauthenticaton->financial_year_start_month;
            $curyear = date('Y');
           $montharr = array();
            $i = 1;
            $month = strtotime($curyear.'-'.$finalcialyeat_starting_month.'-01');
            while($i <= 12)
            {
            $month_name = date('m', $month);
            //$nmonth = date('m',strtotime($month));
            '<option value="'. $month_name. '">'.$month_name.'</option>';
            array_push($montharr, $month_name);
            $month = strtotime('+1 month', $month);
            $i++;
            }
            //echo '<pre>';print_r($montharr);
        //$month = array('04','05','06','07','08','09','10','11','12','01','02','03');
        $month = $montharr;
        $this->data['month'] = $month;  
        $this->data['finalcialyear_starting_month'] = $finalcialyeat_starting_month;

        $curr_month = date('m');        
        $curr_year = date('Y');
        $this->data['monthindex'] = $curr_month;
        $this->data['yearindex'] = $curr_year;
        $pre_date = date("Y-m-d", strtotime("first day of previous month"));
        $pre_date_arr = explode('-', $pre_date);

        $pre_month = $pre_date_arr[1];
        $pre_year = $pre_date_arr[0];
        
        //echo $pre_month.'test'.$pre_year;exit;

        //$this->data['curr_month_payroll'] = $this->PayrollModel->get_month_payroll($curr_month,$curr_year);
       //$this->data['pre_month_payroll'] = $this->PayrollModel->get_month_payroll_pre($pre_month,$pre_year);
        $this->data['salarycycle'] = $SysConfigauthenticaton->salary_cycle;
        $this->data['cut_of_day'] = $SysConfigauthenticaton->cut_of_day;
        $this->data['based_on_days'] = $SysConfigauthenticaton->based_on_days;
        $this->data['day_of_processing'] = $SysConfigauthenticaton->day_of_processing;
       

        $this->data['totalemployee'] = $this->PayrollModel->total_employee();
        //print_r(count($this->data['total_employee'])); die;
        
        //echo $this->db->last_query();
             // echo "<pre>"; print_r($this->data['curr_month_payroll']); //die;
            //  echo "<pre>"; print_r($this->data['pre_month_payroll']); die;

       


        // current month employee
       // echo "<pre>"; print_r($all_data); die;
        $curr_total_employee = count($all_data);
        $curr_employee_sent = array();
        $curr_employee_due = array();

       /* if(!empty($all_data)){
            foreach ($all_data as $empp) {
                $check_payroll = $this->PayrollModel->get_current_month_payroll($empp->id, $curr_month,$curr_year);
                //echo "<pre>"; print_r($check_payroll); die;
                if(empty($check_payroll)){
                    array_push($curr_employee_due, $empp->id); 
                }else{
                    array_push($curr_employee_sent, $empp->id); 
                }
            }
        }*/
//echo "<pre>"; print_r($curr_employee_sent); //die;
       //  echo "<br>". count($curr_employee_sent);
        //echo "<br>". count($curr_employee_due);
       //  echo "<br>". $curr_total_employee;
//die;
        if(!empty($curr_total_employee)){
            $curr_percentage = (($curr_total_employee - count($curr_employee_sent)) / $curr_total_employee)*100;
            $this->data['curr_percentage'] = $curr_percentage;
        }

       

        // previous month employee
      //  $total_hol_employee = $this->PayrollModel->get_total_hol_employee($pre_month,$pre_year);
        $pre_all_data = $this->PayrollModel->get_employee_monthly_payroll($pre_month,$pre_year);
        $pre_total_employee = count($pre_all_data);
        $pre_employee_sent = array();
        $pre_employee_due = array();

      /*  if(!empty($all_data)){
            foreach ($all_data as $empp) {
                $check_payroll = $this->PayrollModel->get_current_month_payroll($empp->id, $pre_month,$pre_year);
                if(empty($check_payroll)){
                    array_push($pre_employee_due, $empp->id); 
                }else{
                    array_push($pre_employee_sent, $empp->id); 
                }
            }
        }*/
       // echo '<pre>';print_r($pre_total_employee);exit;
        if(!empty($pre_total_employee))
        {
        $pre_percentage = (($pre_total_employee - count($pre_employee_sent)) / $pre_total_employee)*100;
        }
        else{
           $pre_percentage =0;  
        }

        $this->data['pre_percentage'] = $pre_percentage;

        if ($id) {
            $this->load->view('payroll/admin/list', $this->data);
        } else {
            $this->middle = 'payroll/admin/list';
            $this->layout();
        }
    }
    
     public function index_payroll($month_year){
        //echo '<pre>'; print_r(base64_decode($month_year)); die;
       
        $monthyear = explode('_',base64_decode($month_year));

        $SysConfigauthenticaton = checkConfig1();
        $salarycycle = $SysConfigauthenticaton->salary_cycle;
        $cut_of_day = $SysConfigauthenticaton->cut_of_day;

        if($salarycycle == 'fixedday'){
        $prividous_days = date('d M,Y', strtotime(date($monthyear[1].'-'.$monthyear[0].'-'.$cut_of_day)." -1 month +1 day"));
        $current_days = date('d M,Y', strtotime(date($monthyear[1].'-'.$monthyear[0].'-'.$cut_of_day))); 
        //echo $prividous_days.' To '.$current_days;

        $date1=date_create(date('Y-m-d', strtotime(date($monthyear[1].'-'.$monthyear[0].'-'.$cut_of_day)." -1 month +1 day")));
        $date2=date_create(date('Y-m-d',strtotime($current_days)));
        $diff=date_diff($date1,$date2);
        $C_Days = $diff->format("%R%a days");
        $Calender_Days = $C_Days+1;

        }else{

        $prividous_days = date('01-' . $monthyear[0] .'-'.$monthyear[1]);//date("d M,Y", strtotime("first day of 01 month")) ; //date("d M,Y", strtotime('first day of '.$monthyear[0].$monthyear[1]));//date("d M,Y", strtotime("first day of this month"));
		//$prividous_days = date('01-' . $value . '-Y');
		
        $current_days = date(date('t', strtotime($prividous_days)) .'-' . $monthyear[0] . '-' .$monthyear[1]);//date("d M,Y", strtotime('last day of '.$monthyear[0].$monthyear[1]));
        $date1=date_create(date('01-' . $monthyear[0] .'-'.$monthyear[1]));
        $date2=date_create(date(date('t', strtotime($prividous_days)) .'-' . $monthyear[0] . '-' .$monthyear[1]));
        $diff=date_diff($date1,$date2);
        $C_Days = $diff->format("%R%a days");
        $Calender_Days = intval($C_Days)+1;
        }
        $this->data['month'] = $monthyear[0];
        $this->data['year'] = $monthyear[1];
        $this->data['mode'] = $monthyear[2];
        $this->data['Calender_Days'] = $Calender_Days;
        $this->data['from_date'] = $prividous_days;
        $this->data['to_date'] = $current_days;
        $this->middle = 'payroll/admin/list_payroll';
        $this->layout();
    }
	
	
	public function index_payroll_register($month_year){
        //echo '<pre>'; print_r(base64_decode($month_year)); die;
       
        $monthyear = explode('_',base64_decode($month_year));

        $SysConfigauthenticaton = checkConfig1();
        $salarycycle = $SysConfigauthenticaton->salary_cycle;
        $cut_of_day = $SysConfigauthenticaton->cut_of_day;

        if($salarycycle == 'fixedday'){
        $prividous_days = date('d M,Y', strtotime(date($monthyear[1].'-'.$monthyear[0].'-'.$cut_of_day)." -1 month +1 day"));
        $current_days = date('d M,Y', strtotime(date($monthyear[1].'-'.$monthyear[0].'-'.$cut_of_day))); 
        //echo $prividous_days.' To '.$current_days;

        $date1=date_create(date('Y-m-d', strtotime(date($monthyear[1].'-'.$monthyear[0].'-'.$cut_of_day)." -1 month +1 day")));
        $date2=date_create(date('Y-m-d',strtotime($current_days)));
        $diff=date_diff($date1,$date2);
        $C_Days = $diff->format("%R%a days");
        $Calender_Days = $C_Days+1;

        }else{

        $prividous_days = date('01-' . $monthyear[0] .'-'.$monthyear[1]);//date("d M,Y", strtotime("first day of 01 month")) ; //date("d M,Y", strtotime('first day of '.$monthyear[0].$monthyear[1]));//date("d M,Y", strtotime("first day of this month"));
		//$prividous_days = date('01-' . $value . '-Y');
		
        $current_days = date(date('t', strtotime($prividous_days)) .'-' . $monthyear[0] . '-' .$monthyear[1]);//date("d M,Y", strtotime('last day of '.$monthyear[0].$monthyear[1]));
        $date1=date_create(date('01-' . $monthyear[0] .'-'.$monthyear[1]));
        $date2=date_create(date(date('t', strtotime($prividous_days)) .'-' . $monthyear[0] . '-' .$monthyear[1]));
        $diff=date_diff($date1,$date2);
        $C_Days = $diff->format("%R%a days");
        $Calender_Days = intval($C_Days)+1;
        }
        $this->data['month'] = $monthyear[0];
        $this->data['year'] = $monthyear[1];
        $this->data['mode'] = $monthyear[2];
        $this->data['Calender_Days'] = $Calender_Days;
        $this->data['from_date'] = $prividous_days;
        $this->data['to_date'] = $current_days;
        $this->middle = 'payroll/admin/list_payroll_register';
        $this->layout();
    }
	
	 /*  public function off_cycle(){
        //echo '<pre>'; print_r(base64_decode($month_year)); die;
        $this->middle = 'payroll/admin/off_cycle';
        $this->layout();
    }*/
	
	 public function off_cycle($id=NULL) {
		$this->db->truncate('HR_offcycle_temp');
       // $all_data = $this->PayrollModel->load_all_off_cycle();
		$all_employee = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_employee'] = $all_employee;
       // echo "<pre>"; print_r($all_data); //die;
        if($id){
            $this->load->view('payroll/admin/off_cycle',$this->data);
        }else{
            $this->middle = 'payroll/admin/off_cycle';
        $this->layout();
        }
    }
	
	 public function off_payroll_list($id=NULL) {
		
		$all_data = $this->PayrollModel->load_all_off_cycle_final_data();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
      
        if($id){
            $this->load->view('payroll/admin/off_payroll_list',$this->data);
        }else{
            $this->middle = 'payroll/admin/off_payroll_list';
        $this->layout();
        }
    }
	
	public function off_cycle_details($id=NULL) {
		$all_data = $this->PayrollModel->load_all_off_cycle();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
        if($id){
            $this->load->view('payroll/admin/off_cycle_details',$this->data);
        }else{
            $this->middle = 'payroll/admin/off_cycle_details';
        $this->layout();
        }
    }
	
	   public function get_form() {
        $this->data = array();
        $this->db->truncate('HR_offcycle_temp');
		$all_employee = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_employee'] = $all_employee;
        $view = $this->load->view('payroll/admin/off_cycle_add',$this->data, TRUE);
        echo $view; exit();         
    }

     public function admin_save_emp_payroll() {
        //echo "<pre>"; print_r($_POST); die;

          $attendance=  $this->PayrollModel->get_all_attendance_button_details($_POST['month'],$_POST['year']); 
		$adhoc=  $this->PayrollModel->get_all_adhoc_button_details($_POST['month'],$_POST['year']);
        $hold=  $this->PayrollModel->get_all_hold_button_details($_POST['month'],$_POST['year']);
         $payroll=  $this->PayrollModel->get_all_payroll_button_details($_POST['month'],$_POST['year']);
        // echo $adhoc.'@'.$hold.'@'.$attendance;exit;
       if($attendance=='no' || $adhoc=='no' || $hold=='no'){
         //  $allcondition='no';
           echo 'no';exit;
       }
       else{
           
         
        $payroll = $_POST['payroll'];

         $date = date("Y-m-d H:i:s");

        if(!empty($payroll)){
            foreach ($payroll as $value) {
                $detail = explode('##', $value);
               //echo "<pre>"; print_r($detail); //die;              
              
                if(!empty($detail)){
                    $sava_data['employee_id'] = $detail[0];
                    $sava_data['payroll_month'] = $_POST['month'];
                    $sava_data['payroll_year'] = $_POST['year'];
                    $sava_data['payroll_date'] = $date;
                    $sava_data['salary'] = $detail[1];
                    $sava_data['overtime'] = $detail[2];
                    $sava_data['bonus'] = $detail[3];
                    $sava_data['salary_details'] = $detail[5];
                    $sava_data['ctc_amount'] = $detail[4];
                    $sava_data['entry_date'] = $date;
                    $sava_data['modified_date'] = $date;

                    $this->db->insert(tablename('employee_payroll'), $sava_data);

                    // save leave info
                    $leave_data = $this->get_leave_details($_POST['month'],$_POST['year'],$detail[0]);

                    $sava_data_leave['employee_id'] = $detail[0];
                    $sava_data_leave['month'] = $_POST['month'];
                    $sava_data_leave['year'] = $_POST['year'];
                    $sava_data_leave['opening_leave'] = @$leave_data['opening_leave'];
                    $sava_data_leave['earn_leave_monthly'] = @$leave_data['earn_leave_monthly'];
                    $sava_data_leave['leavetake'] = @$leave_data['leavetake'];
                    $sava_data_leave['balance_leave'] = @$leave_data['balance_leave'];
                    $sava_data_leave['entry_date'] = $date;
                    $sava_data_leave['modified_date'] = $date;

                    $this->db->insert(tablename('employee_payroll_leave_info'), $sava_data_leave);

                }

            }
        }        

        echo 'done';
        exit();
       }
    }
    
   

    public function admin_employee_payroll() {
        //echo "<pre>"; print_r($_POST); die;

        
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');
        $this->data['all_data'] = $this->PayrollModel->get_employee_monthly_payroll($this->data['month'],$this->data['year']);

        $view = $this->load->view('payroll/admin/payroll', $this->data, TRUE);
        echo $view;
        exit();
    }
    
     public function employee_attendance() {
       // echo "<pre>"; print_r($_POST); die;
        $this->data['all_employee'] = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));

        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $this->data['CalenderDays'] = $_POST['CalenderDays'];
        $this->data['startingdate'] = $_POST['startingdate'];

        $this->data['From_date'] = date('Y-m-d',strtotime($_POST['fromdate']));
        $this->data['To_date'] = date('Y-m-d',strtotime($_POST['todate']));

        $view = $this->load->view('payroll/admin/list_attendance', $this->data, TRUE);
        echo $view;
        exit();


    }




    public function employee_Payable() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_employee'] = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $this->data['CalenderDays'] = $_POST['CalenderDays'];
        $this->data['startingdate'] = $_POST['startingdate'];

        $this->data['From_date'] = date('Y-m-d',strtotime($_POST['fromdate']));
        $this->data['To_date'] = date('Y-m-d',strtotime($_POST['todate']));

        $view = $this->load->view('payroll/admin/list_payable', $this->data, TRUE);
        echo $view;
        exit();


    }

    public function employee_AdhokPay() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_employee'] = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $this->data['CalenderDays'] = $_POST['CalenderDays'];
        $this->data['startingdate'] = $_POST['startingdate'];

        $this->data['From_date'] = date('Y-m-d',strtotime($_POST['fromdate']));
        $this->data['To_date'] = date('Y-m-d',strtotime($_POST['todate']));

        $view = $this->load->view('payroll/admin/list_adhokPay', $this->data, TRUE);
        echo $view;
        exit();


    }


        public function employee_Hold() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_employee'] = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $this->data['CalenderDays'] = $_POST['CalenderDays'];
        $this->data['startingdate'] = $_POST['startingdate'];

        $this->data['From_date'] = date('Y-m-d',strtotime($_POST['fromdate']));
        $this->data['To_date'] = date('Y-m-d',strtotime($_POST['todate']));

        $view = $this->load->view('payroll/admin/list_hold', $this->data, TRUE);
        echo $view;
        exit();


    }



    public function employee_Register() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_employee'] = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $this->data['CalenderDays'] = $_POST['CalenderDays'];
        $this->data['startingdate'] = $_POST['startingdate'];

        $this->data['From_date'] = date('Y-m-d',strtotime($_POST['fromdate']));
        $this->data['To_date'] = date('Y-m-d',strtotime($_POST['todate']));

        $view = $this->load->view('payroll/admin/list_register', $this->data, TRUE);
        echo $view;
        exit();


    }

     public function employee_Register_view() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_employee'] = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $this->data['CalenderDays'] = $_POST['CalenderDays'];
        $this->data['startingdate'] = $_POST['startingdate'];

        $this->data['From_date'] = date('Y-m-d',strtotime($_POST['fromdate']));
        $this->data['To_date'] = date('Y-m-d',strtotime($_POST['todate']));

        $view = $this->load->view('payroll/admin/list_register_view', $this->data, TRUE);
        echo $view;
        exit();


    }
    


     public function save_freeze_month_attendance() {
      //  echo "<pre>"; print_r($_POST); die;
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
         $fromdate = $_POST['fromdate'];
         $todate = $_POST['todate'];
        $result=  $this->PayrollModel->save_freeze_month_attendance($month,$year,$fromdate,$todate);
         echo $result;exit;
     }

     public function save_freeze_month_leaves() {
        //echo "<pre>"; print_r($_POST); die;
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
         $fromdate = $_POST['fromdate'];
         $todate = $_POST['todate'];
         $LOP = $_POST['LOP'];
         $TotalDays = $_POST['TotalDays'];
        $result=  $this->PayrollModel->save_freeze_month_leaves($month,$year,$fromdate,$todate);
         echo $result;exit;
     }
     public function get_all_button_details() {
       $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
       $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       $attendance=  $this->PayrollModel->get_all_attendance_button_details($month,$year); 
       $adhoc=  $this->PayrollModel->get_all_adhoc_button_details($month,$year);
        $hold=  $this->PayrollModel->get_all_hold_button_details($month,$year);
         $payroll=  $this->PayrollModel->get_all_payroll_button_details($month,$year);
       if($attendance=='yes' && $adhoc=='yes' && $hold=='yes'){
           $allcondition='yes';
           
       }
       else{
            $allcondition='no';
       }
       echo $attendance.'@'.$adhoc.'@'.$hold.'@'.$payroll;exit;
     }

     public function adhoc_ajax() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_data'] = $this->PayrollModel->load_all_data();
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');

        $view = $this->load->view('payroll/admin/adhoc_ajax', $this->data, TRUE);
        echo $view;
        exit();


    }
    
     
     public function save_adhoc_pay() {
    //  echo "<pre>"; print_r($_POST); die;
         $this->data['all_data'] = $this->PayrollModel->load_all_data();
         $month = ($_POST['hidden_month']!='') ? $_POST['hidden_month'] : date('m');
         $year= ($_POST['hidden_year']!='') ? $_POST['hidden_year'] : date('Y'); 
       $result=  $this->PayrollModel->save_adhoc_pay($month,$year);
       $this->data['month'] =$month;
        $this->data['year'] =$year;
         $view = $this->load->view('payroll/admin/list_adhokPay', $this->data, TRUE);
        echo $view;
        exit();
     }
      public function save_freeze_month_adhoc() {
      //   echo "<pre>"; print_r($_POST); die;
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       $result=  $this->PayrollModel->save_freeze_month_adhoc($month,$year);
         echo $result;exit;
     }
     public function save_freeze_month_hold() {
        //echo "<pre>"; print_r($_POST); die;
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       $result=  $this->PayrollModel->save_freeze_month_hold($month,$year);
         echo $result;exit;
     }
     public function hold_ajax() {
       // echo "<pre>"; print_r($_POST); die;
       
        $this->data['all_data'] = $this->PayrollModel->load_all_data();
        $this->data['month'] = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $this->data['year'] = ($_POST['year']!='') ? $_POST['year'] : date('Y');
       // $this->data['month'] =$month;
       // $this->data['year'] =$year;
       // echo $this->data['year'];exit;
        $this->data['hold']=  $this->PayrollModel->get_all_hold_button_details($this->data['month'],$this->data['year']);
        $view = $this->load->view('payroll/admin/hold_ajax', $this->data, TRUE);
        echo $view;
        exit();


    }
    
    public function relize_hold() {
       //  echo "<pre>"; print_r($_POST); die;
         $this->data['all_data'] = $this->PayrollModel->load_all_data();
         $month = ($_POST['hidden_month_hold']!='') ? $_POST['hidden_month_hold'] : date('m');
         $year= ($_POST['hidden_year_new_hold']!='') ? $_POST['hidden_year_new_hold'] : date('Y'); 
       //  $employee_hlod= ($_POST['hold_employee_id']!='') ? $_POST['hold_employee_id'] : ''; 
         $payroll_old = $_POST['hold_employee_id'];
         $payroll= explode('!',$payroll_old);
        // echo $month.'@'.$year;exit;
        // $payroll = $_POST['hold_employee_id'];
         if(!empty($payroll))
         {
             foreach ($payroll as $valuenew) {
                 
             // echo "<pre>"; print_r($payroll); 
                 
                 // $payroll = $_POST['hold_employee_id'];

         $date = date("Y-m-d H:i:s");
  $detail= explode('##', $valuenew);
 //echo "<pre>"; print_r($detail); die;  
        if(!empty($detail)){
           // foreach ($detail as $value) {
               
               //echo "<pre>"; print_r($detail); //die;              
              
                if(!empty($detail)){
                    $sava_data['employee_id'] = $detail[0];
                    $sava_data['payroll_month'] = $month;
                    $sava_data['payroll_year'] = $year;
                    $sava_data['payroll_date'] = $date;
                    $sava_data['salary'] = $detail[1];
                    $sava_data['overtime'] = $detail[2];
                    $sava_data['bonus'] = $detail[3];
                    $sava_data['salary_details'] = $detail[5];
                    $sava_data['ctc_amount'] = $detail[4];
                    $sava_data['entry_date'] = $date;
                    $sava_data['modified_date'] = $date;

                    $this->db->insert(tablename('employee_payroll'), $sava_data);

                    // save leave info
                    $leave_data = $this->get_leave_details($month,$year,$detail[0]);

                    $sava_data_leave['employee_id'] = $detail[0];
                    $sava_data_leave['month'] =$month;
                    $sava_data_leave['year'] = $year;
                    $sava_data_leave['opening_leave'] = @$leave_data['opening_leave'];
                    $sava_data_leave['earn_leave_monthly'] = @$leave_data['earn_leave_monthly'];
                    $sava_data_leave['leavetake'] = @$leave_data['leavetake'];
                    $sava_data_leave['balance_leave'] = @$leave_data['balance_leave'];
                    $sava_data_leave['entry_date'] = $date;
                    $sava_data_leave['modified_date'] = $date;

                    $this->db->insert(tablename('employee_payroll_leave_info'), $sava_data_leave);
                 
                 
       $result=  $this->PayrollModel->relize_hold($month,$year,$detail[0]);
             }
        // }
        }
             }
         }
       $this->data['month'] =$month;
        $this->data['year'] =$year;
        $this->data['hold']=  $this->PayrollModel->get_all_hold_button_details($month,$year);
       // echo $this->data['hold'];exit;
         $view = $this->load->view('payroll/admin/hold_ajax', $this->data, TRUE);
        echo $view;
        exit();
     }

     public function getallcomponent() {
        $value = $_POST['value'];  
        $div='';
      
        if($value == 'pay'){
             $all_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
         }else{
            $all_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
         }
      
         $div.= '<select id="component0" name="component" class="form-control com">
                    <option value="" >Select</option>';
                    
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                      
                 
              $div.='<option value="'.$component->id.'">'.$component->component.'</option>';
                  } } 
                   
              $div.='</select>';
        echo $div; exit();         
    }
	
	   public function getallcomponentoffcycle() {
        $value = $_POST['value'];  
        $div='';
      
        if($value == 'pay'){
             $all_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type !='=>'Deduction','id !='=>'3'));
			  $div.= '<select id="componentpay" name="componentpay" onchange="return checkcomponent_offcycle();" class="form-control">
                    <option value="">Select</option>';
                    
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                      
                 
              $div.='<option value="'.$component->id.'">'.$component->component.'</option>';
                  } } 
                   
              $div.='</select> <span style="color: red;" id="com_err"></span>';
         }else{
            $all_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction'));
			 $div.= '<select id="componentdedu" name="componentdedu" onchange="return checkcomponent_offcycle_deduction();" class="form-control">
                    <option value="">Select</option>';
                    
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                      
                 
              $div.='<option value="'.$component->id.'">'.$component->component.'</option>';
                  } } 
                   
              $div.='</select> <span style="color: red;" id="comdedu_err"></span>';
		 }
      
        
        echo $div; exit();         
    }

    public function add_adhob_div() {
        $value = $_POST['value'];  
         $adhoc_type = $_POST['adhoc_type'];  
        
        $div='';
       // $all_component = $this->SalaryStruModel->get_result_data_for_salary('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N'));
        if($adhoc_type == 'pay'){
             $all_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Incentive','mode'=>'Adhoc'));
         }else{
            $all_component = $this->PayrollModel->get_result_data('master_salary_component',array('is_active'=>'Y','delete_flag'=>'N','type'=>'Deduction','mode'=>'Adhoc'));
         }
       


      //  echo '<pre>';
      //  print_r($all_component);
      // exit;
         $div.= '<tr class="sel" id="add_row'.$value.'"><td><select id="component'.$value.'" name="component" class="form-control com">
                    <option value="" >Select</option>';
                    
                  if (!empty($all_component)) {
                    foreach ($all_component as $component) {
                      
                 
              $div.='<option value="'.$component->id.'">'.$component->component.'</option>';
                  } } 
                   
              $div.='</select></td>
        <td> <input type="text" onkeyup="numeric(this)" name="adhoc_amount" id="adhoc_amount'.$value.'" class="form-control text-right" placeholder="0.00"></td>
        <td></td>
        </tr>';


       
        
        echo $div; exit();         
    }
     
     public function save_hold() {
         //echo "<pre>"; print_r($_POST); die;
         $this->data['all_data'] = $this->PayrollModel->load_all_data();
         $month = ($_POST['hidden_month_hold']!='') ? $_POST['hidden_month_hold'] : date('m');
         $year= ($_POST['hidden_year_new_hold']!='') ? $_POST['hidden_year_new_hold'] : date('Y'); 
        // echo $month.'@'.$year;exit;
       $result=  $this->PayrollModel->save_hold($month,$year);
       $this->data['month'] =$month;
        $this->data['year'] =$year;
        $this->data['hold']=  $this->PayrollModel->get_all_hold_button_details($month,$year);
       // echo $this->data['hold'];exit;
         $view = $this->load->view('payroll/admin/list_hold', $this->data, TRUE);
        echo $view;
        exit();
     }
     
     public function get_salary_freeze_parcent() {
      //   echo "<pre>"; print_r($_POST); die;
         
         $all_data = $this->PayrollModel->load_all_data();
         
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
         $this->data['curr_month_payroll'] = $this->PayrollModel->get_month_payroll($month,$year);
         $this->data['pre_month_payroll'] = $this->PayrollModel->get_month_payroll($month,$year);
         $curr_total_employee = count($all_data);
         $curr_employee_sent = array();
         $curr_employee_due = array();
 $pre_monthnew = $month-1;
 $pre_month = sprintf("%02d", $pre_monthnew);
        $pre_year = $year-1;
      //  echo $pre_month;exit;
        if(!empty($all_data)){
            foreach ($all_data as $empp) {
                $check_payroll = $this->PayrollModel->get_current_month_payroll($empp->id, $month,$year);
                //echo "<pre>"; print_r($check_payroll); die;
                if(empty($check_payroll)){
                    array_push($curr_employee_due, $empp->id); 
                }else{
                    array_push($curr_employee_sent, $empp->id); 
                }
            }
        }
         $curr_percentage = (($curr_total_employee - count($curr_employee_sent)) / $curr_total_employee)*100;

        
        $this->data['curr_percentage'] = $curr_percentage;

        // previous month employee
       // echo $pre_month.''.$pre_year;exit;
        $pre_all_data = $this->PayrollModel->get_employee_monthly_payroll($pre_month,$pre_year);
        $pre_total_employee = count($pre_all_data);
        $pre_employee_sent = array();
        $pre_employee_due = array();

        if(!empty($all_data)){
            foreach ($all_data as $empp) {
                $check_payroll = $this->PayrollModel->get_current_month_payroll($empp->id, $pre_month,$pre_year);
                if(empty($check_payroll)){
                    array_push($pre_employee_due, $empp->id); 
                }else{
                    array_push($pre_employee_sent, $empp->id); 
                }
            }
        }
        if(@$pre_total_employee > 0)
        {
        $pre_percentage = ((@$pre_total_employee - count(@$pre_employee_sent)) / @$pre_total_employee)*100;
        }
        else{
           $pre_percentage=0; 
        }

        $this->data['pre_percentage'] = $pre_percentage;
     
       $this->data['month'] =$month;
        $this->data['year'] =$year;
        $this->data['hold']=  $this->PayrollModel->get_all_hold_button_details($month,$year);
        
       
       // echo $this->data['hold'];exit;
        // $view = $this->load->view('payroll/admin/hold_ajax', $this->data, TRUE);
        echo $pre_percentage.'@'.$curr_percentage;
        exit();
     }
     
     public function get_saved_salary_payroll() {
      //   echo "<pre>"; print_r($_POST); die;
         //$this->data['all_data'] = $this->PayrollModel->load_all_data();
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
        // echo $month.'@'.$year;exit;
      // $result=  $this->PayrollModel->save_hold($month,$year);
       $data['month'] =$month;
        $data['year'] =$year;
        $data['hold']=  $this->PayrollModel->get_all_hold_button_details($month,$year);
       // echo $this->data['hold'];exit;

        $data['all_data'] = $this->PayrollModel->load_all_saved_payroll_employee(@$month,@$year);

        $data['earning_component'] = $this->PayrollModel->load_component('Earning');
        $data['deduction_component'] = $this->PayrollModel->load_component('Deduction');



             $view = $this->load->view('payroll/admin/register_payroll', $data, TRUE);
        echo $view;
        exit();
     }
     
     public function download_salary_slip() {
        $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       
        //$month=$data['month'];
       // $year=$data['year'];
     //   echo cal_days_in_month(CAL_GREGORIAN, 04, 2019); exit;
        
        //$data = $this->get_leave_details($_POST['month'],$_POST['year'],$_POST['employee_id']);
        $data['month'] =$month;
        $data['year'] =$year;
        $data['organization_details']=  $this->PayrollModel->get_organization_details();
        $data['employee_details']=  $this->PayrollModel->get_employee_details($_POST['employee_id']);

      // echo "<pre>"; print_r($data); die;


        $view = $this->load->view('payroll/admin/payslip', $data, TRUE);
        echo $view;
        exit();
     }

     public function download_salary_slip_payroll() {
        $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       
        //$month=$data['month'];
       // $year=$data['year'];
     //   echo cal_days_in_month(CAL_GREGORIAN, 04, 2019); exit;
        
        //$data = $this->get_leave_details($_POST['month'],$_POST['year'],$_POST['employee_id']);
        $data['month'] =$month;
        $data['year'] =$year;
        $data['organization_details']=  $this->PayrollModel->get_organization_details();
        $data['employee_details']=  $this->PayrollModel->get_employee_details($_POST['employee_id']);

      // echo "<pre>"; print_r($data); die;


        $view = $this->load->view('payroll/admin/payslip_payroll', $data, TRUE);
        echo $view;
        exit();
     }

     
     
      private function sendEmail($to, $subject, $msg, $from = NULL, $from_email = NULL, $file = NULL) {
//echo $file;exit;
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_crypto'] = 'tls';
        $config['smtp_port'] = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'sketchwebsolutions.mail@gmail.com';
        $config['smtp_pass'] = '$k%86$@^*';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
        $ci->email->initialize($config);
        $ci->email->from($from_email, $from);
        $list = $to;
        $ci->email->to($list);
        $ci->email->reply_to($from_email, $from);
        $ci->email->subject($subject);
        $ci->email->message($msg);
        if (!empty($file)) {
            $ci->email->attach($_SERVER['DOCUMENT_ROOT'].'/P1154_FuturePayroll/uploads/'.$file);
        }
//         foreach($file as $f){
//           $ci->email->attach($f);
//         }
        // echo $ci->email->print_debugger(); die();

         $ci->email->send();
        unlink($_SERVER['DOCUMENT_ROOT'].'/P1154_FuturePayroll/uploads/'.$file);
        return 'done';
    }
     public function send_salary_slip() {
        //  echo $employee_id;exit;
        $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
        $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       
        $employee_id_array=explode(',',$_POST['employee_id']);
       
       // $year=$data['year'];
     //   echo cal_days_in_month(CAL_GREGORIAN, 04, 2019); exit;
      if(!empty($employee_id_array))
      {
          foreach ($employee_id_array as $value) {
            //  echo $value;exit;
              
       
       
      $data = $this->get_leave_details($month,$year,$value); 
       $data['employee_details']=  $this->PayrollModel->get_employee_details($value);
      //  echo "<pre>"; print_r($data); die;
        $data['css']='<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/dompdf.css">';
         $data['month'] =$month;
        $data['year'] =$year;
        $data['organization_details']=  $this->PayrollModel->get_organization_details();
        
        $view = $this->load->view('payroll/admin/payslip', $data, TRUE);

       
       $msg =$view;
        require 'vendor/autoload.php';
       
        $options = new Options();
        $options->set('isHtml5ParserEnabled', TRUE);
        $dompdf = new Dompdf($options);
       // $dompdf = new Dompdf();
        $dompdf->loadHtml($msg);
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
      //  $dompdf->stream('Slaryslip.pdf');
        $output = $dompdf->output();
       file_put_contents($_SERVER['DOCUMENT_ROOT'].'/P1154_FuturePayroll/uploads/Slaryslip.pdf',$output );
       //$uploads_dir = '/uploads/pdf';
      // move_uploaded_file($output,'Brochure.pdf');
//echo '<pre>';print_r($data['employee_details']->contact_email);exit;
         $to = $data['employee_details']->contact_email;
             //  $to = 'pritam@sketchwebsolutions.com';
            $subject = 'Your Salary Slip of "' . date($year.'-'.$month.'-d') . '"';
            $response = $this->sendEmail($to, $subject, $msg, 'test@gmail.com', 'test@gmail.com','Slaryslip.pdf');
          }
       
      }
     }
     
 
     
      public function down_slip_final($month,$year,$employee_id) {
     
        $data['css']='<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/dompdf.css">';
         $data['month'] =$month;
        $data['year'] =$year;
        $data['organization_details']=  $this->PayrollModel->get_organization_details();
        $data['employee_details']=  $this->PayrollModel->get_employee_details($employee_id);
        $view = $this->load->view('payroll/admin/payslip_payroll', $data, TRUE);
		
        //echo "<pre>"; print_r($view); die;
         require 'vendor/autoload.php';
        // reference the Dompdf namespace
       $html =$view;


       

        // instantiate and use the dompdf class
        $options = new Options();
        $options->set('isHtml5ParserEnabled', TRUE);
        $dompdf = new Dompdf($options);
       // $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
       
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('SalarySlip.pdf');
     }
	 
	 
	  public function down_slip($month,$year,$employee_id) {
        //  echo $employee_id;exit;
        //$month = ($_POST['month']!='') ? $_POST['month'] : date('m');
       // $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
       
        //$month=$data['month'];
       // $year=$data['year'];
     //   echo cal_days_in_month(CAL_GREGORIAN, 04, 2019); exit;
      
      //$data = $this->get_leave_details($month,$year,$employee_id); 
      //  echo "<pre>"; print_r($data); die;
        $data['css']='<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/dompdf.css">';
         $data['month'] =$month;
        $data['year'] =$year;
        $data['organization_details']=  $this->PayrollModel->get_organization_details();
        $data['employee_details']=  $this->PayrollModel->get_employee_details($employee_id);
        $view = $this->load->view('payroll/admin/payslip', $data, TRUE);
		
        //echo "<pre>"; print_r($view); die;
         require 'vendor/autoload.php';
        // reference the Dompdf namespace
       $html =$view;


       

        // instantiate and use the dompdf class
        $options = new Options();
        $options->set('isHtml5ParserEnabled', TRUE);
        $dompdf = new Dompdf($options);
       // $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
       
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Salaryslip.pdf');
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
          $check_leave_balance=$this->PayrollModel->get_row_data('employee_payroll_leave_info',array('is_active'=>'Y','delete_flag'=>'N','employee_id'=>$employee_id,'month'=>@$pre_month,'year'=>@$pre_year));

         // echo "<pre>"; print_r($check_leave_balance); die;

          if(empty($check_leave_balance)){
            $opening_leave = 0;
          }else{
            $opening_leave = @$check_leave_balance->balance_leave;
          }
                                    
                                    
        $totaldayofthismonth=cal_days_in_month(CAL_GREGORIAN, @$month, @$year);
        $data['totaldayofthismonth'] =$totaldayofthismonth;
        $total_attendance=$this->PayrollModel->get_total_attendence_of_employee($employee_id,@$month,@$year);
       // echo $total_attendance;exit;
       // print_r($total_attendance);exit;
         $data['total_attendance'] =$total_attendance;
         $absent_day=$totaldayofthismonth - $total_attendance;
         $data['absent_day'] = $absent_day;
         if($total_attendance!=$totaldayofthismonth){
        // echo '1';exit;
         $total_leave_taken = $this->PayrollModel->total_leave_taken($employee_id,@$month,@$year); 
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
        // array_push($leavetake,$total_leave_taken->leave_to);
        // $allleavedates=getDatesFromRange( $total_leave_taken->leave_from, $total_leave_taken->leave_to );
         //echo '<pre>';print_r($leavetakeArr);
         }
         
         if(!empty($leavetakeArr))
         {
            $leavetake= count($leavetakeArr);
         }
         else{
             $leavetake= 0;
         }
         
        // echo '<pre>';print_r($data['total_attendance']);exit;
        $data['all_data'] = $this->PayrollModel->load_all_saved_payroll_employee_id(@$month,@$year,$employee_id);
       // echo '<pre>';print_r($data['all_data']);exit;
        $leave_type_for_this_employee= $this->PayrollModel->leave_type_for_this_employee(@$data['all_data']->grade);
        $leave_type=array();
        if(!empty($leave_type_for_this_employee)){
           
            $leave_type=explode(',',$leave_type_for_this_employee->leave_rule_id);
            
        }
        //$leave_type_details_arr=array();
        //echo '<pre>';print_r($leave_type);exit;
        $earn_leave_monthly = 0;
       // $opening_leave = 0;
        if(!empty($leave_type))
        {
            foreach ($leave_type as $value) {
              $leave_type_details = $this->PayrollModel->leave_type_details(@$value); 

             // echo '<pre>';print_r($leave_type_details);//exit;

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
              //echo "<br>";

            // exit("0000");
              }

                                                     

             //array_push($leave_type_details_arr, $leave_type_details) ;
            
              
            } 
        }

        //echo '<pre>';print_r($opening_leave);exit;

        $balance_leave = (($opening_leave + $earn_leave_monthly) - $leavetake);

        $data['opening_leave']= $opening_leave;
        $data['earn_leave_monthly']= $earn_leave_monthly;
        $data['leavetake']= $leavetake;
        $data['balance_leave']= $balance_leave;

       // echo "<pre>"; print_r($data); die;
        return $data;
     }

     public function save_freeze_month_payroll() {
      //  echo "<pre>"; print_r($_POST); die;
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
         $fromdate = $_POST['fromdate'];
         $todate = $_POST['todate'];
        $result=  $this->PayrollModel->save_freeze_month_payroll($month,$year,$fromdate,$todate);
         echo $result;exit;
     }

       public function emp_register_delete() {
      //  echo "<pre>"; print_r($_POST); die;
         $month = ($_POST['month']!='') ? $_POST['month'] : date('m');
         $year= ($_POST['year']!='') ? $_POST['year'] : date('Y'); 
         $fromdate = $_POST['fromdate'];
         $todate = $_POST['todate'];
        $result=  $this->PayrollModel->emp_register_delete($month,$year,$fromdate,$todate);
         echo $result;exit;
     }
	 
	 
	 
	  public function add_off_cycle_pay() {
      
	    $data['type'] = $_POST['type']; 
        
		if($_POST['type'] == 'pay'){
			$data['amount'] = $_POST['amount_pay'];
			$data['component'] = $_POST['componentpay'];  
			
		}else{
			$data['amount'] = $_POST['amount_dedu'];
			$data['component'] = $_POST['componentdedu'];  
		}
        
		
        $this->db->insert(tablename('offcycle_temp'), $data); 
        $div='';
		
		$all_pay = $this->PayrollModel->load_all_payroll_for_off_cycle($_POST['type']);
		
        
       
                        foreach ($all_pay as $value) {
                        $div.='<tr>
						    <td>'.ucwords($value->type).'</td>
                            <td>'.$value->component.'</td>
                            <td class="text-right">'.$value->amount.'</td>
                        </tr>';

                    }
                    
        echo $div; exit();            
    }
	
	public function form($id = NULL) {        
        if (isset($_POST['submit'])) {
        //echo "<pre>"; print_r($_POST); die;           
        $flg = $this->PayrollModel->modify(base64_decode($id));            
        }        
    }
	
	 public function download_off_cycle_payroll() {
        $transaction_id = $_POST['transaction_id'];
        $employee_id = $_POST['employee_id']; 
  
        $data['transaction_id'] =$transaction_id;
        $data['employee_id'] =$employee_id;
		
        $data['organization_details']=  $this->PayrollModel->get_organization_details();
        $data['employee_details']=  $this->PayrollModel->get_employee_details($_POST['employee_id']);

      // echo "<pre>"; print_r($data); die;


        $view = $this->load->view('payroll/admin/payslip_offcycle', $data, TRUE);
        echo $view;
        exit();
     }
	 
	 
	  public function checkcomponent_offcycle() {
		  //echo '<pre>'; print_r($_POST); die;
        $componentpay = $_POST['componentpay'];  
       // $emp_id = $_POST['emp_id'];


        //if(empty($emp_id)){
            $checkcomponent_offcycle = $this->PayrollModel->get_row_data('offcycle_temp',array('component'=>$componentpay));
        //}else{
            //$checkcomponent_offcycle = $this->PayrollModel->checkcomponent_offcycle($grade,$id);
       //}


        if(!empty($checkcomponent_offcycle)){
            echo 'This component is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }
	
	 public function checkcomponent_offcycle_deduction() {
		// echo '<pre>'; print_r($_POST['cmdude']); die;
		
			 $component_dude = $_POST['cmdude'];
		 
       
       // $emp_id = $_POST['emp_id'];


        //if(empty($emp_id)){
            $checkcomponent_offcycle = $this->PayrollModel->get_row_data('offcycle_temp',array('component'=>$component_dude));
        //}else{
            //$checkcomponent_offcycle = $this->PayrollModel->checkcomponent_offcycle($grade,$id);
       //}


        if(!empty($checkcomponent_offcycle)){
            echo 'This component is already exist.';
        }else{
            echo 'done';
        }

        exit();         
    }
	
	  public function admin_edit_off_cycle() {
       // echo "<pre>"; print_r($_POST); die;
       
         $transaction_id = $_POST['transaction_id'];
         $emp_id = $_POST['emp_id'];
         $component_id = $_POST['component_id'];
         $amount = $_POST['amount'];
         $data = array(
                    'amount' => $amount,
                    'modified_date' => date('Y-m-d')
                );
           
            $this->db->where('transaction_id', $transaction_id)->where('component_id', $component_id)->where('employee_id', $emp_id)->update(tablename('off_cycle_payroll'), $data);
         return 'yes';
     }
	 
	 
	 	  public function final_submission_off_cycle() {
       // echo "<pre>"; print_r($_POST); die;
	   $all_data = $this->PayrollModel->load_all_off_cycle();
	  if(!empty($all_data)){
		  foreach($all_data as $data){
			 $update = array(
                    'status' => '1',
                ); 
			$this->db->where('transaction_id', $data->transaction_id)->where('employee_id', $data->employee_id)->update(tablename('off_cycle_payroll'), $update);
		  }
	  }
       echo 'Success'; exit;   
     }
	
	
	
}

/* End of file admin.php */
/* Location: ./application/modules/payroll/controllers/admin.php */
