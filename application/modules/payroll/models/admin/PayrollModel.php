<?php

/**
 * payroll Model Class. Handles all the datatypes and methodes required for handling payroll
 */
class PayrollModel extends CI_Model {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
        $this->load->helper('string');
    }

    /**
     * Used for loading functionality of payroll for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the payroll that has been added by current admin [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_all_data_salary_structure() {
        $this->db->select('HR_employee_salary.*');
        $this->db->from(tablename('employee') . ' as t1');
         $this->db->join('HR_employee_salary', 'HR_employee_salary.employee_id = t1.id');
        $this->db->where('t1.delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function total_employee() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    /**
     * Used for fetching rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches rows from any table depending upon condition</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return array
     */
    public function get_result_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }

    public function get_all_employee($table, $where = "1=1") {
        $this->db->order_by('first_name');
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }

    /**
     * Used for fetching row from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for fetching row</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return  array
     */
    public function get_row_data($table, $where) {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }
	
	public function get_row_data_order_by_id($table, $where) {
		$this->db->order_by('id','desc');
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }

    public function get_current_month_payroll($id = "", $month = "", $year = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_payroll'));
        $this->db->where('employee_id', $id);
        $this->db->where('payroll_month', $month);
        $this->db->where('payroll_year', $year);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function check_pf_exist($master_salary_structureid = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
        $this->db->where('id', $master_salary_structureid);
        $this->db->where('delete_flag', 'N');
        $this->db->where('is_active', 'Y');
        $this->db->where('pf', '1');
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function check_ptax_exist($master_salary_structureid = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_salary_structure'));
        $this->db->where('id', $master_salary_structureid);
        $this->db->where('delete_flag', 'N');
        $this->db->where('is_active', 'Y');
        $this->db->where('ptax', '1');
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     public function ptax_deduction($state,$total){

        $this->db->select('t1.*');
        $this->db->from(tablename('p_tax') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.state', $state);
        $this->db->where('t1.amount_from <=',(int)$total);
        $this->db->where('t1.amount_to >=', (int)$total);
        $query = $this->db->get();
        $result = $query->row();

       
       
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
      
    }


    public function get_employee_monthly_payroll($month = "", $year = "") {
        $date = $year . '-' . $month . '-01';
        $where = "(employee.hire_date <= '" . $date . "')";
        $this->db->select('*');
        $this->db->from(tablename('employee'));
        $this->db->where($where);
        $this->db->where('HR_employee.delete_flag', 'N');
        $this->db->where('HR_employee.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->result();
       // echo '<pre>';print_r($result);exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_month_payroll($month = "", $year = "") {
        $this->db->select('SUM(salary) as salary,SUM(overtime) as overtime,SUM(bonus) as bonus');
        $this->db->from(tablename('employee_payroll'));
        $this->db->where('payroll_month', $month);
        $this->db->where('payroll_year', $year);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query();
        if (!empty($result)) {
            // echo "<pre>"; print_r($result); die;

            $payroll_amt = $result->salary + $result->overtime + $result->bonus;
            return number_format($payroll_amt, 2);
        } else {
            return array();
        }
    }
    public function get_month_payroll_pre($month = "", $year = "") {
        $this->db->select('SUM(salary) as salary,SUM(overtime) as overtime,SUM(bonus) as bonus');
        $this->db->from(tablename('employee_payroll'));
        $this->db->where('payroll_month', $month);
        $this->db->where('payroll_year', $year);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query();
        if (!empty($result)) {
            // echo "<pre>"; print_r($result); die;

            $payroll_amt = $result->salary + $result->overtime + $result->bonus;
            return number_format($payroll_amt, 2);
        } else {
            return array();
        }
    }

    /*public function load_att_month_year($id = "", $month = "", $year = "") {
        $from = $year . '-' . $month . '-01';
        $to = $year . '-' . $month . '-31';
        $where = "(date >= '" . $from . "' AND date <= '" . $to . "')";
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('employee_id', $id);
        $this->db->where($where);
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        //   echo '<pre>';
        //  print_r($result);  exit;
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            $rVal = array();

            foreach ($result as $value) {
                $dateVal = explode('-', $value->date);
                $rVal[$dateVal[2]] = $value->type;
            }

            return $rVal;
        } else {
            return array();
        }
    }*/

   public function load_att_month($id = "",$month = "",$year="",$fromdate,$todate) {
        //$from = $year.'-'.$month.'-01';
        //$to = $year.'-'.$month.'-31';
    $from = date('Y-m-d',strtotime($fromdate));
    $to = date('Y-m-d', strtotime($todate));
        $where = "(date >= '".$from."' AND date <= '".$to."')";
        $this->db->select('*');
        $this->db->from(tablename('attendance'));
        $this->db->where('employee_id', base64_decode($id));
        $this->db->where($where);
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        $result = $query->result();
       //echo '<pre>';
      //print_r($result);  exit;
//echo $this->db->last_query();exit;
        $futuredate = array();

        if($year == date('Y') && ($month == date('m'))){
            //echo date('d')+1; die;
            for($k=date('d')+1; $k<=31;$k++){
                //$rVal['futuredate'] = $k;
                array_push($futuredate, $k);
            }
        }

        if (!empty($result)) {
            $rVal = array();

            foreach ($result as $value) {
                $dateVal = explode('-', $value->date);
                if($value->day_type == 'Full Day' || $value->day_type == 'Half Day'){
                    $rVal[$dateVal[2]] = $value->day_type.'_'.$value->late_type;  
                }else{
                    $rVal[$dateVal[2]] = $value->day_type;
                }
                
            }

            foreach ($result as $value) {
                $dateVal = explode('-', $value->date);
               if($value->entry_time != '00:00'){
                $rVal['entryTime'][$dateVal[2]] = $value->entry_time;  
               }
            }

            foreach ($result as $value) {
                $dateVal = explode('-', $value->date);
               if($value->out_time != '00:00'){
                $rVal['outTime'][$dateVal[2]] = $value->out_time;  
               }
            }

        $Earlyleave = array();  
        $where_early_leave = "(date >= '".$from."' AND date <= '".$to."')";
        $this->db->select('*');
        $this->db->from(tablename('timeoff'));
        $this->db->where('approved', 'Yes');
        $this->db->where('type', 'Personal');
        $this->db->where('employee_id', base64_decode($id));
        $this->db->where($where_early_leave);
        $this->db->order_by('date', 'asc');
        $query_er = $this->db->get();
        $result_er = $query_er->result();
        
       
       foreach ($result_er as $value) {
                $dateVal_er = explode('-', $value->date);
                //$rVal[$dateVal_leave[2]] = 'Leave';
                array_push($Earlyleave, $dateVal_er[2]);
           }

        if(!empty($Earlyleave)){
                $rVal['early_leave'] = $Earlyleave;
            }


        
       

        $leaves  = array();
        $where_leave = "(HR_employee_leave_application.leave_from >= '".$from."' AND HR_employee_leave_application.leave_to <= '".$to."')";
        $this->db->select('HR_employee_leave_application.*,HR_master_leave_rules.rule_name');
        $this->db->from(tablename('employee_leave_application'));
         $this->db->join('HR_master_leave_rules', 'HR_employee_leave_application.leave_type_id = HR_master_leave_rules.id');
        $this->db->where('HR_employee_leave_application.approved', 'Yes');
        $this->db->where('HR_employee_leave_application.employee_id', base64_decode($id));
        $this->db->where($where_leave);
        $this->db->order_by('HR_employee_leave_application.leave_from', 'asc');
        $query_leave = $this->db->get();
        $result_leave = $query_leave->result();
        //   echo '<pre>';print_r($result_leave);
        // if (!empty($result_leave)) {
        foreach ($result_leave as $value) {
            $stop_date = date('Y-m-d H:i:s', strtotime($value->leave_to . ' +1 day'));
            $period = new DatePeriod(
        new DateTime($value->leave_from),
        new DateInterval('P1D'),
        new DateTime($stop_date)
        );
            
            foreach ($period as $key => $valuen) {
        //echo $valuen->format('Y-m-d');exit;
                $dateVal_leave = explode('-', $valuen->format('Y-m-d'));
               // $rVal['LEAVES'][$dateVal_leave[2]] = $valuen->rule_name;
                array_push($leaves, $dateVal_leave[2]);
        }

            }


         $where_holly = "(HR_master_holidays.holiday_start_date >= '".$from."' AND HR_master_holidays.holiday_end_date <= '".$to."')";
        $this->db->select('HR_master_holidays.*');
        $this->db->from(tablename('master_holidays'));
        // $this->db->join('HR_master_leave_rules', 'HR_employee_leave_application.leave_type_id = HR_master_leave_rules.id');
        $this->db->where('HR_master_holidays.delete_flag', 'N');
        $this->db->where('HR_master_holidays.is_active', 'Y');
        $this->db->where($where_holly);
        $this->db->order_by('HR_master_holidays.holiday_start_date', 'asc');
        $query_holly = $this->db->get();
        $result_holly = $query_holly->result();
        //  echo '<pre>';print_r($result_holly);
        //$rVal=0;
        $holidays = array();
        if (!empty($result_holly)) {
        foreach ($result_holly as $value_new) {
        $stop_date_new = date('Y-m-d H:i:s', strtotime($value_new->holiday_end_date . ' +1 day'));
        $periodnew = new DatePeriod(
        new DateTime($value_new->holiday_start_date),
        new DateInterval('P1D'),
        new DateTime($stop_date_new)
        );
        if(!empty($value_new->holiday_name) && !empty($periodnew))   
        {
          //  echo '<pre>';print_r($periodnew);exit;
        foreach ($periodnew as $key => $valuen) {
        // echo $valuen->format('Y-m-d');
             $dateVal_holly = explode('-', $valuen->format('Y-m-d'));
          //   echo '<pre>';print_r($dateVal_holly);$value_new->holiday_name
            //$rVal[$dateVal_holly[2]] = @$value_new->holiday_name;
            array_push($holidays, $dateVal_holly[2]);
        }
        }
        }
        // $rValnew=array_merge_recursive($rVal,$rVal_holly);
        }

            if(!empty($leaves)){
                $rVal['leaves'] = $leaves;
            }

            if(!empty($holidays)){
                $rVal['holidays'] = $holidays;
            }

            if(!empty($futuredate)){
                $rVal['futuredate'] = $futuredate;
            }
              //echo '<pre>';
       //print_r($rVal);  exit;
            return $rVal;
            
        } else {
            return array();
        }
    }

    public function save_freeze_month_attendance($month = NULL, $year = NULL, $startingdate = NULL, $endingdate = NULL) {
        $all_employee = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        if(!empty($all_employee)){
            $flag = '0';
           //print_r($all_employee);
            foreach ($all_employee as $value) {
                $this->db->select('t1.*');
                $this->db->from(tablename('attendance_freeze_payroll') . ' as t1');
                $this->db->where('t1.employee_id', $value->id);
                $this->db->where('t1.month', $month);
                $this->db->where('t1.year', $year);
                $query = $this->db->get();
                $result = $query->row();

                echo $value->id; echo '----';
                if (!empty($result)) {
                    //return 'yes';
                } else {
                $data = array(
                'employee_id' => $value->id,  
                'organization_id'=> '1', 
                'month' => $month,
                'year' => $year,
                'date' => date('Y-m-d'),
                'start_date' => date('Y-m-d',strtotime($startingdate)),
                'end_date' => date('Y-m-d',strtotime($endingdate)),
                );
               // print_r($data);

                $this->db->insert(tablename('attendance_freeze_payroll'), $data);
                echo 'done';
                $flag ++;
                }
                
                }
                if($flag == '0'){
                 return 'yes';
                }
        
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

       }
    }

    public function get_all_attendance_button_details($month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('attendance_freeze_payroll') . ' as t1');
        $this->db->where('t1.month', $month);
        $this->db->where('t1.year', $year);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return 'yes';
        } else {

            return 'no';
        }
    }

    public function get_all_adhoc_button_details($month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('adhoc_freeze_payroll') . ' as t1');
        $this->db->where('t1.month', $month);
        $this->db->where('t1.year', $year);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return 'yes';
        } else {

            return 'no';
        }
    }

    public function get_all_hold_button_details($month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('hold_freeze_payroll') . ' as t1');
        $this->db->where('t1.month', $month);
        $this->db->where('t1.year', $year);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return 'yes';
        } else {

            return 'no';
        }
    }

    public function get_all_payroll_button_details($month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_payroll') . ' as t1');
        $this->db->where('t1.payroll_month', $month);
        $this->db->where('t1.payroll_year', $year);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return 'yes';
        } else {

            return 'no';
        }
    }

    public function load_all_employee_with_addhoc($month = "", $year = "", $employee_id = "", $component_id='') {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }
        $this->db->select('HR_payroll_addhoc_details.*');
        $this->db->from(tablename('payroll_addhoc_details'));
        //   $this->db->join('HR_payroll_addhoc_details', 'HR_employee.id =HR_payroll_addhoc_details.employee_id ','left');
        $this->db->where('HR_payroll_addhoc_details.month', $month);
        $this->db->where('HR_payroll_addhoc_details.year', $year);
        $this->db->where('employee_id', $employee_id);
        $this->db->where('component_id', $component_id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

       public function save_adhoc_pay($month = NULL, $year = NULL) {
        // echo '<pre>';print_r($_POST);exit;
        if ($_POST['adhoc_employee_id'] != '') {
            $employee = explode(',', $_POST['adhoc_employee_id']);
            foreach ($employee as $value) {
               if ($_POST['adhoc_type'] == 'pay') {
                 if (!empty($_POST['components'])) {
                    foreach ($_POST['components'] as $key => $value1) {
                        $this->db->select('t1.*');
                        $this->db->from(tablename('payroll_addhoc_details') . ' as t1');
                        $this->db->where('t1.month', $month);
                        $this->db->where('t1.year', $year);
                        $this->db->where('t1.employee_id', $value);
                        $this->db->where('t1.component_id', $value1);
                        $query = $this->db->get();
                        $result = $query->row();
                        if (!empty($result)) {
                           $this->db->delete('HR_payroll_addhoc_details', array('employee_id' => $value,'component_id' => $value1)); 
 
                        }
                       $data = array(
                            'month' => $month,
                            'year' => $year,
                            'component_id'=>$value1,
                            'credit' =>$_POST['amounts'][$key] ,
                            'employee_id' => $value,
                            'date' => date('Y-m-d')
                        );

                        $this->db->insert(tablename('payroll_addhoc_details'), $data);
                    }
                }
            
                        
                    } else {
                        if (!empty($_POST['components'])) {
                    foreach ($_POST['components'] as $key => $value1) {
                        $this->db->select('t1.*');
                        $this->db->from(tablename('payroll_addhoc_details') . ' as t1');
                        $this->db->where('t1.month', $month);
                        $this->db->where('t1.year', $year);
                        $this->db->where('t1.employee_id', $value);
                        $this->db->where('t1.component_id', $value1);
                        $query = $this->db->get();
                        $result = $query->row();
                       // print_r($result); die;
                        if (!empty($result)) {
                           $this->db->delete('HR_payroll_addhoc_details', array('employee_id' => $value,'component_id' => $value1)); 
 
                        }
                       $datadeduct = array(
                            'month' => $month,
                            'year' => $year,
                            'component_id'=>$value1,
                            'debit' =>$_POST['amounts'][$key] ,
                            'employee_id' => $value,
                            'date' => date('Y-m-d')
                        );
                       //echo '<pre>'; print_r($datadeduct); die;

                        $this->db->insert(tablename('payroll_addhoc_details'), $datadeduct);
                    }
                }
                    }

            }
        }
    }

    public function save_freeze_month_adhoc($month = NULL, $year = NULL) {
         $all_employee = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        if(!empty($all_employee)){
            $flag = '0';
            foreach ($all_employee as $value) {
                $this->db->select('t1.*');
                $this->db->from(tablename('adhoc_freeze_payroll') . ' as t1');
                $this->db->where('t1.employee_id', $value->id);
                $this->db->where('t1.month', $month);
                $this->db->where('t1.year', $year);
                $query = $this->db->get();
                $result = $query->row();


                if (!empty($result)) {
                    //return 'yes';
                } else {
                $data = array(
                'employee_id' => $value->id,  
                'organization_id'=> '1', 
                'month' => $month,
                'year' => $year,
                'date' => date('Y-m-d'),
              
                );

                $this->db->insert(tablename('adhoc_freeze_payroll'), $data);
                echo 'done';
                $flag ++;
                }
                
                }
                if($flag == '0'){
                 return 'yes';
                }
        
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

       }
    }

    public function save_freeze_month_hold($month = NULL, $year = NULL) {
        //echo "<pre>"; echo $month; echo "<br>";  echo $year; die;
        $all_employee = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
       //echo "<pre>"; print_r($all_employee); die;
            foreach ($all_employee as $data) {
                $earning = array();
                $pay = array();
                $deduction = array();
                $datapay = array();
                $dataded = array();
                $flag = 0;
            $hold = $this->PayrollModel->load_all_employee_with_hold($month,$year,$data->id);
			//echo "<pre>"; print_r($hold); die;
            $emp_salary = $this->PayrollModel->get_row_data_order_by_id('employee_salary', array('employee_id' => $data->id,'delete_flag'=>'N','is_active'=>'Y'));
			//echo "<pre>"; print_r($emp_salary); die;
            //$salary = $this->PayrollModel->get_row_data('employee_salary', array('employee_id' => $data->id));
			
            $leave_freez = $this->PayrollModel->get_row_data('leaves_freeze_payroll', array('employee_id' => $data->id,'month' => $month,'year' => $year));
			
            //print_r($leave_freez); die;
             $Arrearning = array();
            if(!empty($emp_salary)){
            if(@$hold->employee_id != $data->id){
                //print_r($hold); die;
               
                                    $earning_component = $this->PayrollModel->load_component('Earning','Monthly');
                                    $net_amt = '0.00';
                                    $net_pfamt = 0;
                                    $net_esiamt = 0;
                                    if(!empty($earning_component)){
                                    foreach ($earning_component as $earning_val) {
                                         $amt = '0.00';
                                         $pfamt = '0.00';
                                         $esiamt = '0.00';
                                         
                                        if(!empty($emp_salary->id)){
                                        $ctcVal = $emp_salary->ctc_amount;
                                        $ctcVal_monthly = ($ctcVal/12);
                                        $salary_component_Earning = $this->PayrollModel->get_salary_component_by_type(@$emp_salary->id,$earning_val->id,'Earning','Monthly');
                                        $basic_amount = $this->PayrollModel->get_salary_component_by_type(@$emp_salary->id,'3','Earning','Monthly');
                                            if(!empty($basic_amount)){
                                            //$basic_amt = $amt;

                                                if($basic_amount->amount != '0.00'){
                                                    $basicamount_per = (float) (!empty($basic_amount->amount)) ? ($basic_amount->amount/100) : 0;
                                                    if($basic_amount->base_on == 'CTC'){
                                                        if($basic_amount->operator == '*'){
                                                            $basic_amt = (float) $ctcVal_monthly * $basicamount_per;
                                                            } }else{
                                                                $basic_amt = $basic_amount->fixed_amount/12;
                                                            }

                                                }
                                            }

                                        //$amt = '0.00';
										$dataup = array();
                                        if(!empty($salary_component_Earning)){
											
                                            if($salary_component_Earning->amount != '0.00'){
                                                    $amount_per = (float) (!empty($salary_component_Earning->amount)) ? ($salary_component_Earning->amount/100) : 0;
                                                    if($salary_component_Earning->base_on == 'CTC'){
                                                        if($salary_component_Earning->operator == '*'){
                                                            $amt = (float) $ctcVal_monthly * $amount_per;
                                                            $dataup = array('type' => 'Earning',
                                                            'component_id' => $salary_component_Earning->component_id,
                                                            'amount'=>$amt,
                                                            );
                                                            } }else if($salary_component_Earning->base_on == 'Basic Salary'){
                                                        if($salary_component_Earning->operator == '*'){
                                                            $amt = (float) $basic_amt * $amount_per;
                                                             $dataup = array('type' => 'Earning',
                                                'component_id' => $salary_component_Earning->component_id,
                                                'amount'=>$amt,
                                                );
                                                            
                                                        }
                                                        
                                                    }
                                                   
                                           
                                                
                                                     
                                            
                                                }else{
                                                $amt = $salary_component_Earning->fixed_amount/12;
                                                 
                                             $dataup = array('type' => 'Earning',
                                                'component_id' => $salary_component_Earning->component_id,
                                                'amount'=>$amt,
                                                );
                                                }



                                                
                                        }

                                          if(!empty($salary_component_Earning)){
                                            if($salary_component_Earning->amount != '0.00' && $salary_component_Earning->pf == 'Yes'){
                                                    $pfamount_per = (float) (!empty($salary_component_Earning->amount)) ? ($salary_component_Earning->amount/100) : 0;
                                                    if($salary_component_Earning->base_on == 'CTC'){
                                                        if($salary_component_Earning->operator == '*'){
                                                            $pfamt = (float) $ctcVal_monthly * $pfamount_per;
                                                           
                                                            } }else if($salary_component_Earning->base_on == 'Basic Salary'){
                                                        if($salary_component_Earning->operator == '*'){
                                                            $pfamt = (float) $basic_amt * $pfamount_per;
                                                            
                                                        }
                                                        
                                                    }
                                                }else{
                                                $pfamt = $salary_component_Earning->fixed_amount/12;
                                                
                                                }

                                                
                                        }

                                        if(!empty($salary_component_Earning)){
                                            if($salary_component_Earning->amount != '0.00' && $salary_component_Earning->esi == 'Yes'){
                                                    $esiamount_per = (float) (!empty($salary_component_Earning->amount)) ? ($salary_component_Earning->amount/100) : 0;
                                                    if($salary_component_Earning->base_on == 'CTC'){
                                                        if($salary_component_Earning->operator == '*'){
                                                            $esiamt = (float) $ctcVal_monthly * $esiamount_per;
                                                           
                                                            } }else if($salary_component_Earning->base_on == 'Basic Salary'){
                                                        if($salary_component_Earning->operator == '*'){
                                                            $esiamt = (float) $basic_amt * $esiamount_per;
                                                            
                                                        }
                                                        
                                                    }
                                                }else{
                                                $esiamt = $salary_component_Earning->fixed_amount/12;
                                                
                                                }

                                                
                                        }

                                       }



                                    //print_r($salary_component_Earning); die;
										if(!empty($dataup)){
										array_push($earning,$dataup);
										}
                                      $net_amt +=  $amt;
                                      $net_pfamt +=  $pfamt;
                                      $net_esiamt +=  $esiamt;
                                    }
                                }
//echo '<pre>'; print_r($earning); die;
                               
                                    $total_adhoc_pay = 0;
                                    $total_pf_adhoc_pay = 0;
                                    $total_esi_adhoc_pay = 0;
                                    $pfAdhocPay = 0;
                                    $esiAdhocPay = 0;
                                    $pay_adhoc = $this->PayrollModel->get_result_data('master_salary_component',array('type'=>'Incentive','mode'=>'Adhoc'));
                                    if(!empty($pay_adhoc)){
                                    foreach ($pay_adhoc as $payadhoc) {
                                        $addhocpay = $this->PayrollModel->load_all_employee_with_addhoc($month,$year,$data->id,$payadhoc->id);
                                        //echo '<pre>'; print_r($addhocpay); 
                                        if(!empty($addhocpay)){
                                            $pay_adhoc_deduction = $this->PayrollModel->get_row_data('master_salary_component',array('id'=>$payadhoc->id));
                                           //echo '<pre>'; print_r($addhocpay); 
                                            if($pay_adhoc_deduction->pf == 'Yes'){
                                                $pfAdhocPay = $addhocpay->credit;
                                            }
                                             if($pay_adhoc_deduction->esi == 'Yes'){
                                                $esiAdhocPay = $addhocpay->credit;
                                            }

                                            $datapay = array('Type' => 'Adhoc_pay',
                                            'component_id' => $addhocpay->component_id,
                                            'amount'=>$addhocpay->credit,
                                            );
                                             
                                            $AdhocPay = $addhocpay->credit;

                                        }else{
                                            $AdhocPay = '0.00';
                                            $datapay = array();

                                        }
                                        if(!empty($datapay)){
                                        array_push($pay,$datapay);
										}
                                        $total_adhoc_pay += $AdhocPay;
                                        $total_pf_adhoc_pay += $pfAdhocPay;
                                        $total_esi_adhoc_pay += $esiAdhocPay;
                                    
                                    }
                                    }

									
                                    $tatalgross = $net_amt + $total_adhoc_pay;


                                    $total_adhoc_Deduction = 0;
                                    $deduction_adhoc =$this->PayrollModel->get_result_data('master_salary_component',array('type'=>'Deduction','mode'=>'Adhoc'));
                                    if(!empty($deduction_adhoc)){
										$dataded = array();
                                    foreach ($deduction_adhoc as $deductionadhoc) {
                                        $addhocdeduction = $this->PayrollModel->load_all_employee_with_addhoc($month,$year,$data->id,$deductionadhoc->id);
                                         if(!empty($addhocdeduction)){
                                            $Adhocdeduction = $addhocdeduction->debit;

                                            $dataded = array('Type' => 'Adhoc_deduction',
                                            'component_id' => $addhocdeduction->component_id,
                                            'amount'=>$addhocdeduction->debit,
                                            );
                                        }else{
                                            $Adhocdeduction = '0.00';
                                            //$dataded = array();
                                        }
										if(!empty($dataded)){
											array_push($deduction,$dataded);
										}
                                        $total_adhoc_Deduction += $Adhocdeduction;
                                   
                                    }
                                    }

//echo '<pre>'; print_r($deduction); die;									


                                    $PFAmount = 0;
                                    $totalPF = $net_pfamt+ $total_pf_adhoc_pay;
                                   if(!empty($emp_salary) && $emp_salary->pf == '1'){
                                    if($emp_salary->pf_based_on == 'Fixed'){
                                    $PFAmount = '1800';
                                    }else{
                                    $PF = $this->PayrollModel->get_row_data('pf_admin',array('is_active'=>'Y','delete_flag'=>'N'));
                                    if(!empty($PF)){
                                    $employee_pf_percent = $PF->employee_pf_percent; //die;
                                    $employer_pf_percent = $PF->employer_pf_percent;
                                    $letPfamount = '15000';
                                    if((float)$basic_amt >= (float)$letPfamount){
                                    $PFAmount=$basic_amt*$employee_pf_percent/100;
                                    }elseif((float)$basic_amt < (float)$letPfamount && (float)$totalPF >= (float)$letPfamount){
                                    $PFAmount=$totalPF*$employee_pf_percent/100;
                                    }elseif((float)$basic_amt < (float)$letPfamount && (float)$totalPF < (float)$letPfamount){
                                    $PFAmount=$totalPF*$employee_pf_percent/100;
                                    }
                                    
                                    }
                                   } 
                               }


                                    $ESIAmount = 0;
                                    $totalESI = $net_esiamt+$total_esi_adhoc_pay;
                                   if(!empty($emp_salary) && $emp_salary->esi == '1'){
                                    $ESI = $this->PayrollModel->get_row_data('esi_admin',array('is_active'=>'Y','delete_flag'=>'N'));
                                            if(!empty($ESI)){
                                                    $employee_esi_percent = $ESI->employee_esi_percent; //die;
                                                    $employer_esi_percent = $ESI->employer_esi_percent;
                                                    $letesi = '21000';
                                                if($totalESI <= $letesi){
                                                    $ESIAmount=$employee_esi_percent*$totalESI/100;
                                                }else{
                                                    $ESIAmount=$employee_esi_percent*$totalESI/100;
                                                }
                                            }
                                        }
                                 
                                $monthly_ptax = 0;
                                if(!empty($emp_salary) && $emp_salary->ptax == '1'){
                                $Ptax_deduction = $this->PayrollModel->ptax_deduction($emp_salary->state,$tatalgross);
                                $ptaxAmount = (!empty($Ptax_deduction->p_tax)) ? $Ptax_deduction->p_tax : '0';
                                $monthly_ptax = $ptaxAmount;
                                } 


                                    $employerPFAmount = 0;
                                    $totalPF = $net_pfamt+ $total_pf_adhoc_pay;
                                   if(!empty($emp_salary) && $emp_salary->pf == '1'){
                                    if($emp_salary->pf_based_on == 'Fixed'){
                                    $employerPFAmount = '1800';
                                    }else{
                                    $PF = $this->PayrollModel->get_row_data('pf_admin',array('is_active'=>'Y','delete_flag'=>'N'));
                                    if(!empty($PF)){
                                    $employee_pf_percent = $PF->employee_pf_percent; //die;
                                    $employer_pf_percent = $PF->employer_pf_percent;
                                    $letPfamount = '15000';
                                    if((float)$basic_amt >= (float)$letPfamount){
                                    $employerPFAmount=$basic_amt*$employer_pf_percent/100;
                                    }elseif((float)$basic_amt < (float)$letPfamount && (float)$totalPF >= (float)$letPfamount){
                                    $employerPFAmount=$totalPF*$employer_pf_percent/100;
                                    }elseif((float)$basic_amt < (float)$letPfamount && (float)$totalPF < (float)$letPfamount){
                                    $employerPFAmount=$totalPF*$employer_pf_percent/100;
                                    }
                                    
                                    }
                                   } 
                               }

                                $employerESIAmount = 0;
                                    $totalESI = $net_esiamt+$total_esi_adhoc_pay;
                                   if(!empty($emp_salary) && $emp_salary->esi == '1'){
                                    $ESI = $this->PayrollModel->get_row_data('esi_admin',array('is_active'=>'Y','delete_flag'=>'N'));
                                            if(!empty($ESI)){
                                                    $employee_esi_percent = $ESI->employee_esi_percent; //die;
                                                    $employer_esi_percent = $ESI->employer_esi_percent;
                                                    $letesi = '21000';
                                                if($totalESI <= $letesi){
                                                    $employerESIAmount=$employer_esi_percent*$totalESI/100;
                                                }else{
                                                    $employerESIAmount=$employer_esi_percent*$totalESI/100;
                                                }
                                            }
                                        }else{
                                            $employee_esi_percent = '';
                                            $employer_esi_percent = '';
                                        }

                                $totalDeduction =  $total_adhoc_Deduction+$PFAmount+$ESIAmount+$monthly_ptax;
                                $totalTakehome =  $tatalgross - $totalDeduction;
    $this->db->select('t1.*');
    $this->db->from(tablename('hold_freeze_payroll') . ' as t1');
    $this->db->where('t1.employee_id', $data->id);
    $this->db->where('t1.month', $month);
    $this->db->where('t1.year', $year);
    $query = $this->db->get();
    $result = $query->row();
      
        if (!empty($result)) {
            //return 'yes';
        } else {

                                $datahold = array(
                                'employee_id' => $data->id,
                                'month' => $month,
                                'year' => $year,
                                'date' => date('Y-m-d')
                                );

                                $this->db->insert(tablename('hold_freeze_payroll'), $datahold);
//print_r($datahold); die;
                                $data = array(
                                'month' => $month,
                                'year' => $year,
                                'employee_id' => $data->id,
                                'ctc_amount' => $ctcVal_monthly,
                                'pf' => $emp_salary->pf,
                                'pf_based_on'=>$emp_salary->pf_based_on,
                                'employeemothlypf' =>$PFAmount,
                              
                                'employermothlypf' =>$employerPFAmount,
                               

                                'esi' =>  $emp_salary->esi,
                                'employeemothlyesi' =>$ESIAmount,
                                
                                'esi_per_employee' =>$employee_esi_percent,
                                'employermothlyesi' =>$employerESIAmount,
                                'esi_per_employer' =>$employer_esi_percent,

                                'ptax' =>$emp_salary->ptax,
                                'state' =>$emp_salary->state,
                                'mothlyptax' =>$monthly_ptax,
                                'total_gross'=>$tatalgross,
                                'total_deduction'=> $totalDeduction,
                                'take_home'=>$totalTakehome,
                                'withday'=>$leave_freez->totaldays,
                                 'withoutday'=>$leave_freez->lop,

                                );
                                print_r($data); //die;
                                //print_r($deduction);
                                //print_r($pay); 
                                //print_r($earning); die;
//echo '<pre>';
                                $this->db->insert(tablename('employee_salary_temp'), $data);
                                $insertId = $this->db->insert_id();
								//$insertId = '1';
								//print_r($earning); die;
								//print_r($pay); die;
                                if(!empty($earning)){
									$data_1 = array();
                                    $temp = array_unique(array_column($earning, 'component_id'));
                                            $unique_arr = array_intersect_key($earning, $temp);
                                           //print_r($unique_arr); die;
                                    foreach ($unique_arr as $key => $value) {
                                        //print_r($value); die;
                                           
                                               foreach ($value as $key1 => $er) {
                                                 
                                                    $data_1[$key1]=$er;
                                                    $data_1['employee_salary_temp_id']= $insertId;
                                                   
                                               } 
											   //print_r($data_1); die;
											   if(!empty($data_1)){
                                               $this->db->insert(tablename('employee_salary_details_temp'), $data_1);                                        
											   }
                                    }
                                    //print_r($data_1);
                                }
//print_r($pay); die;
                                if(!empty($pay)){
									$data_2 = array();
                                    $temp1 = array_unique(array_column($pay, 'component_id'));
                                            $unique_arr1 = array_intersect_key($pay, $temp1);
                                           //print_r($unique_arr);
                                    foreach ($unique_arr1 as $key1 => $value1) {
                                        //print_r($value1); die;
                                            
                                               foreach ($value1 as $key2 => $pay1) {
                                                  
                                                    $data_2[$key2]=$pay1;
                                                    $data_2['employee_salary_temp_id']=$insertId;
                                                   
                                               } 
											    //print_r($data_2); die;
												if(!empty($data_2)){
                                                  $this->db->insert(tablename('employee_salary_details_temp'), $data_2);                                        
												}
                                    }
                                    //print_r($data_1);
                                }
								//print_r($deduction);
								 if(!empty($deduction)){
									$data_3 = array();
                                    $temp2 = array_unique(array_column($deduction, 'component_id'));
                                            $unique_arr2 = array_intersect_key($deduction, $temp2);
                                           //print_r($unique_arr);
                                    foreach ($unique_arr2 as $key2 => $value2) {
                                        //print_r($value1); die;
                                            
                                               foreach ($value2 as $key3 => $duc3) {
                                                  
                                                    $data_3[$key3]=$duc3;
                                                    $data_3['employee_salary_temp_id']=$insertId;
                                                   
                                               } 
											    //print_r($data_3); die;
												if(!empty($data_3)){
                                                  $this->db->insert(tablename('employee_salary_details_temp'), $data_3);                                        
												}
                                    }
                                    //print_r($data_1);
                                }

                                 


                               // die;
                                
                                //print_r(array_unique($earning)); die;
                               $flag ++; 
                            }

            }
            }
            /*if($flag == '0'){
               return 'yes';
            }*/
            }

    }
    
      public function relize_hold($month = NULL, $year = NULL,$employee = NULL) {
        // echo '<pre>';print_r($_POST);exit;
        if ($employee != '') {
           // $employee = explode(',', $employee);
            $this->db->where('month', $month);
            $this->db->where('year', $year);
            $this->db->where('HR_payroll_hold_details.employee_id',$employee);
            $this->db->delete(tablename('payroll_hold_details'));
        }
      }

    public function save_hold($month = NULL, $year = NULL) {
        // echo '<pre>';print_r($_POST);exit;
        if ($_POST['hold_employee_id'] != '') {
            $employee = explode(',', $_POST['hold_employee_id']);
            //echo '<pre>'; print_r($employee);
            $this->db->where('month', $month);
            $this->db->where('year', $year);
            $this->db->delete(tablename('payroll_hold_details'));
            foreach ($employee as $value) {
                  //echo '<pre>';print_r($value);exit;

                $this->db->select('t1.*');
                $this->db->from(tablename('payroll_hold_details') . ' as t1');
                $this->db->where('t1.month', $month);
                $this->db->where('t1.year', $year);
                //$this->db->where('t1.employee_id',$value);
                $query = $this->db->get();
                $result = $query->result();
                // echo '<pre>';print_r($result);exit; 
                if (!empty($result)) {

                    $data = array(
                        'month' => $month,
                        'year' => $year,
                        'employee_id' => $value,
                        'date' => date('Y-m-d')
                    );


                    $this->db->insert(tablename('payroll_hold_details'), $data);
                } else {

                    $data = array(
                        'month' => $month,
                        'year' => $year,
                        'employee_id' => $value,
                        'date' => date('Y-m-d')
                    );



                    $this->db->insert(tablename('payroll_hold_details'), $data);
                }
            }
        }
    }

    public function load_all_employee_with_hold($month = NULL, $year = NULL, $employee_id = NULL) {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }
        $this->db->select('HR_payroll_hold_details.*');
        $this->db->from(tablename('payroll_hold_details'));
        //   $this->db->join('HR_payroll_addhoc_details', 'HR_employee.id =HR_payroll_addhoc_details.employee_id ','left');
        $this->db->where('HR_payroll_hold_details.month', $month);
        $this->db->where('HR_payroll_hold_details.year', $year);
        $this->db->where('employee_id', $employee_id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_saved_all_employee_payroll($month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('payroll_hold_details') . ' as t1');
        $this->db->where('t1.month', $month);
        $this->db->where('t1.year', $year);
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_done_payroll($month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_payroll') . ' as t1');
        $this->db->where('t1.payroll_month	', $month);
        $this->db->where('t1.payroll_year', $year);
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_all_saved_payroll_employee($month = "", $year = "") {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }

        $this->db->select('HR_employee_payroll.*,HR_employee.first_name,HR_employee.middle_name,HR_employee.last_name,HR_employee.personal_image,HR_employee.employee_no,HR_employee.ctc_amount,HR_employee.grade');
        $this->db->from(tablename('employee_payroll'));
        $this->db->join('HR_employee', 'HR_employee.id =HR_employee_payroll.employee_id ', 'left');
        $this->db->where('HR_employee_payroll.payroll_month', $month);
        $this->db->where('HR_employee_payroll.payroll_year', $year);
         $this->db->where('HR_employee.delete_flag', 'N');
        $this->db->where('HR_employee.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_componentdetails($id = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_salary_component') . ' as t1');
        //  $this->db->where('t1.payroll_month	', $month);
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_organization_details() {
        $this->db->select('t1.*');
        $this->db->from(tablename('setting_organization') . ' as t1');
        //  $this->db->where('t1.payroll_month	', $month);
        $this->db->where('t1.id', '1');
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_employee_details($id = NULL) {
        $this->db->select('t1.*,HR_master_designation.designation_name,HR_master_department.department_name');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->join('HR_master_designation', 'HR_master_designation.id = t1.designation','left');
        $this->db->join('HR_master_department', 'HR_master_department.id = t1.department','left');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_all_saved_payroll_employee_id($month = "", $year = "", $id = "") {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }

        $this->db->select('HR_employee_payroll.*,HR_employee.first_name,HR_employee.middle_name,HR_employee.last_name,HR_employee.personal_image,HR_employee.employee_no,HR_employee.ctc_amount,HR_employee.grade');
        $this->db->from(tablename('employee_payroll'));
        $this->db->join('HR_employee', 'employee.id =HR_employee_payroll.employee_id ', 'left');
        $this->db->where('HR_employee_payroll.payroll_month', $month);
        $this->db->where('HR_employee_payroll.payroll_year', $year);
        $this->db->where('HR_employee_payroll.employee_id', $id);
         $this->db->where('HR_employee.delete_flag', 'N');
        $this->db->where('HR_employee.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_total_attendence_of_employee($employee_id = '', $month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('attendance') . ' as t1');
        //  $this->db->where('t1.payroll_month	', $month);

        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('t1.type', 'Present');
        $this->db->where('MONTH(t1.entry_date)', $month);
        $this->db->where('YEAR(t1.entry_date)', $year);
        $query = $this->db->get();
        $result = $query->num_rows();
        // echo $result;exit;
        // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return '';
        }
    }

    public function total_leave_taken($employee_id = '', $month = NULL, $year = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        //  $this->db->where('t1.payroll_month	', $month);

        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('MONTH(t1.leave_from)', $month);
        $this->db->or_where('MONTH(t1.leave_to)', $month);
        $this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function leave_type_for_this_employee($id = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_grade') . ' as t1');

        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function leave_type_details($id = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_leave_rules') . ' as t1');

        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_component($type = NULL, $mode = NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_salary_component') . ' as t1');
        $this->db->where('t1.type  ', $type);
        $this->db->where('t1.mode  ', $mode);
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->order_by('sequence');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    public function get_current_month_approx_salary($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_salary'));
        $this->db->where('employee_id', $id);
        $this->db->order_by('id','desc');
        $this->db->limit('1');
        $query = $this->db->get();
        $result = $query->row();
//echo $this->db->last_query() ; die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


      public function get_salary_component_by_type($id= "",$component_id= "",$type="",$mode = "") {
        $this->db->select('t1.*,t2.component,t2.type,t2.pf,t2.esi');
        $this->db->from(tablename('employee_salary_details'). ' as t1');
        $this->db->join('HR_master_salary_component as t2', 't2.id = t1.component_id');
        $this->db->where('t1.employee_salary_id', $id);
        $this->db->where('t1.component_id', $component_id);
        $this->db->where('t2.type', $type);
        $this->db->where('t2.mode', $mode);
        $query = $this->db->get();
        $result = $query->row();
//echo $this->db->last_query();exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }




public function check_attendance_freeze($month= "",$year= "",$emp_id="") {
        $this->db->select('t1.*');
        $this->db->from(tablename('attendance_freeze_payroll') . ' as t1');
        $this->db->where('t1.employee_id', $emp_id);
        $this->db->where('t1.month', $month);
        $this->db->where('t1.year', $year);
        $query = $this->db->get();
        $result = $query->row();

        
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

public function check_leave_freeze($month= "",$year= "",$emp_id="") {
        $this->db->select('t1.*');
        $this->db->from(tablename('leaves_freeze_payroll') . ' as t1');
        $this->db->where('t1.employee_id', $emp_id);
        $this->db->where('t1.month', $month);
        $this->db->where('t1.year', $year);
        $query = $this->db->get();
        $result = $query->row();

        
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

public function check_adhoc_freeze($month= "",$year= "",$emp_id="") {
        $this->db->select('t1.*');
        $this->db->from(tablename('adhoc_freeze_payroll') . ' as t1');
        $this->db->where('t1.employee_id', $emp_id);
        $this->db->where('t1.month', $month);
        $this->db->where('t1.year', $year);
        $query = $this->db->get();
        $result = $query->row();

        
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


     public function get_all_nos_opening($leave_id=NULL,$employee_id=NULL,$month=NULL,$curyear=NULL,$From_date=NULL,$To_date=NULL) {
        //echo $From_date; echo '<pre>'; echo $To_date; die;
        $this->db->select('t1.opening_balance');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('t1.type', 'opening leave');

        
        $query = $this->db->get();
        $result = $query->row();
        //echo $month; die;
        $takeleaves = 0;
        $creditedleaves = 0;

        $startday= date('d',strtotime($From_date));
        $endday = date('d',strtotime($To_date));
        if($month==01)
        {
        $lastmonth=12;
        //$month_name = date("F", mktime(0, 0, 0, $lastmonth, 10));
        for($i=1;$i<=$lastmonth; $i++){
            $year = $curyear - 1;
            $statrtdate = date('Y-m-d',strtotime($startday.'-'.$i.'-'.$year.'-1 month'));
            $enddate = date('Y-m-d',strtotime($endday.'-'.$i.'-'.$year));
            $month_name = date("F", mktime(0, 0, 0, $i, 10));
            $this->db->select('sum(t1.taken_leaves) as taken_leaves');
            $this->db->from(tablename('employee_leaves') . ' as t1');
            $this->db->where('t1.leave_id', $leave_id);
            $this->db->where('t1.employee_id', $employee_id);
            $this->db->where('entry_date >=', $statrtdate);
            $this->db->where('entry_date <=', $enddate);
           // $this->db->where('t1.credited_month', $month_name);
            $this->db->where('YEAR(date)', $year);
            
            $query1 = $this->db->get();
            $result1 = $query1->row();
             if(!empty($result1)){
               $takeleaves+= $result1->taken_leaves;
            }else{
                $takeleaves+= 0;
            }
        }
        }
        else
        {
        $lastmonth=$month-1;
        for($i=1;$i<$month; $i++){
            $month_name = date("F", mktime(0, 0, 0, $i, 10));
            $statrtdate = date('Y-m-d',strtotime($startday.'-'.$i.'-'.$curyear.'-1 month'));
           // echo $statrtdate; die;
            $enddate = date('Y-m-d',strtotime($endday.'-'.$i.'-'.$curyear));
            $this->db->select('sum(t1.taken_leaves) as taken_leaves');
            $this->db->from(tablename('employee_leaves') . ' as t1');
            $this->db->where('t1.leave_id', $leave_id);
            $this->db->where('t1.employee_id', $employee_id);
            //$this->db->where('t1.credited_month', $month_name);
            $this->db->where('entry_date >=', $statrtdate);
            $this->db->where('entry_date <=', $enddate);
            $query1 = $this->db->get();
            $result1 = $query1->row();
             if(!empty($result1)){
               $takeleaves+= $result1->taken_leaves;
            }else{
                $takeleaves+= 0;
            }
        }
        
        }

        if($month==01)
        {
        $lastmonth=12;
        //$month_name = date("F", mktime(0, 0, 0, $lastmonth, 10));
        for($j=1;$j<=$lastmonth; $j++){
            $year = $curyear- 1;
            $month_name = date("F", mktime(0, 0, 0, $j, 10));
            $statrtdate = date('Y-m-d',strtotime($startday.'-'.$j.'-'.$year.'-1 month'));
            $enddate = date('Y-m-d',strtotime($endday.'-'.$j.'-'.$year));
            $this->db->select('sum(t1.credited_leaves) as credited_leaves');
            $this->db->from(tablename('employee_leaves') . ' as t1');
            $this->db->where('t1.leave_id', $leave_id);
            $this->db->where('t1.employee_id', $employee_id);
            //$this->db->where('t1.credited_month', $month_name);
            $this->db->where('entry_date >=', $statrtdate);
            $this->db->where('entry_date <=', $enddate);
            $this->db->where('YEAR(date)', $year);
            $query2 = $this->db->get();
            $result2 = $query2->row();
             if(!empty($result2)){
               $creditedleaves+= $result2->credited_leaves;
            }else{
                $creditedleaves+= 0;
            }
        }
        }
        else
        {
        for($j=1;$j<=$month; $j++){
            $month_name = date("F", mktime(0, 0, 0, $j, 10));
            $statrtdate = date('Y-m-d',strtotime($startday.'-'.$j.'-'.$curyear.'-1 month'));
            $enddate = date('Y-m-d',strtotime($endday.'-'.$j.'-'.$curyear));
            $this->db->select('sum(t1.credited_leaves) as credited_leaves');
            $this->db->from(tablename('employee_leaves') . ' as t1');
            $this->db->where('t1.leave_id', $leave_id);
            $this->db->where('t1.employee_id', $employee_id);
           // $this->db->where('t1.credited_month', $month_name);
            $this->db->where('entry_date >=', $statrtdate);
            $this->db->where('entry_date <=', $enddate);
            $query2 = $this->db->get();
            $result2 = $query2->row();
             if(!empty($result2)){
               $creditedleaves+= $result2->credited_leaves;
            }else{
                $creditedleaves+= 0;
            }
        }
        
        }


        
     //echo 'kk'; //$this->db->last_query() ; die;
         ///echo "<pre>";print_r($result);exit;
//die;
        if (!empty($result)) {
           
            //print_r($result1); die;
            return $result->opening_balance - $takeleaves + $creditedleaves;
        } else {
            return 0;
        }
    }



    public function get_all_nos_taken($leave_id=NULL,$employee_id=NULL,$month=NULL,$curyear=NULL,$From_date=NULL,$To_date=NULL) {
        $this->db->select('sum(t1.taken_leaves) as taken_leaves');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('entry_date >=', $From_date);
            $this->db->where('entry_date <=', $To_date);
        //$this->db->where('t1.credited_month', $monthname);
        $query = $this->db->get();
        $result = $query->row();
        //echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->taken_leaves;
        } else {
            return 0;
        }
    }

    public function get_all_nos_credit($leave_id=NULL,$employee_id=NULL,$month=NULL,$curyear=NULL,$From_date=NULL,$To_date=NULL) {
        $this->db->select('sum(t1.credited_leaves) as credited_leaves');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('entry_date >=', $From_date);
            $this->db->where('entry_date <=', $To_date);
        //$this->db->where('t1.credited_month', $monthname);
        $query = $this->db->get();
        $result = $query->row();
        //echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->credited_leaves;
        } else {
            return 0;
        }
    }


    public function get_all_nos_lop($employee_id=NULL,$month=NULL,$curyear=NULL,$From_date=NULL,$To_date=NULL) {
        $this->db->select('sum(t1.lop) as lops');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        //$this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
         $this->db->where('entry_date >=', $From_date);
            $this->db->where('entry_date <=', $To_date);
        $query = $this->db->get();
        $result = $query->row();
        //echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result->lops)) {
            return $result->lops;
        } else {
            return 0;
        }
    }

    public function save_freeze_month_leaves($month = NULL, $year = NULL, $startingdate = NULL, $endingdate = NULL) {
        $all_employee = $this->PayrollModel->get_all_employee('employee',array('is_active'=>'Y','delete_flag'=>'N'));
        //print_r($_POST['TotalDays']); die;
        if(!empty($_POST['TotalDays'])){
            foreach ($_POST['TotalDays'] as $key => $value) {
                $totaldays = explode('##', $value);
                $lop = explode('##', $_POST['LOP'][$key]);
                 if(!empty($all_employee)){
            $flag = '0';
            foreach ($all_employee as $value) {
                if($value->id == $totaldays[0]){
                $this->db->select('t1.*');
                $this->db->from(tablename('leaves_freeze_payroll') . ' as t1');
                $this->db->where('t1.employee_id', $value->id);
                $this->db->where('t1.month', $month);
                $this->db->where('t1.year', $year);
                $query = $this->db->get();
                $result = $query->row();


                if (!empty($result)) {
                    //return 'yes';
                } else {
                $data = array(
                'employee_id' => $value->id,  
                'organization_id'=> '1', 
                'month' => $month,
                'year' => $year,
                'totaldays' => $totaldays[1],
                'lop' => $lop[1],
                'date' => date('Y-m-d'),
                'start_date' => date('Y-m-d',strtotime($startingdate)),
                'end_date' => date('Y-m-d',strtotime($endingdate)),
                );

                $this->db->insert(tablename('leaves_freeze_payroll'), $data);
                echo 'done';
                $flag ++;
                }
                
            }
                }
                if($flag == '0'){
                 return 'yes';
                }
        
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

       }
            }
        }
        //print_r($all_employee); die;
       
    }


    public function save_freeze_month_payroll($month = NULL, $year = NULL, $startingdate = NULL, $endingdate = NULL) {
       $emp_salary_temp = $this->PayrollModel->get_result_data('employee_salary_temp', array('delete_flag'=>'N','month'=>$month,'year'=>$year,'is_active'=>'Y'));
//print_r($emp_salary_temp); die;
        if(!empty($emp_salary_temp)){
            $flag = '0';
            foreach($emp_salary_temp as $value) {
                //print_r($value); die;
                $emp_payroll = $this->PayrollModel->get_row_data('employee_payroll', array('employee_id' => $value->employee_id,'delete_flag'=>'N','month'=>$month,'year'=>$year,'is_active'=>'Y'));
                //print_r($emp_payroll); die;

                if (!empty($emp_payroll)) {
                    //return 'yes';
                } else {
                $data = array(
                                'month' => $value->month,
                                'year' => $value->year,
                                'employee_id' => $value->employee_id,
                                'ctc_amount' => $value->ctc_amount,
                                'pf' => $value->pf,
                                'pf_based_on'=>$value->pf_based_on,
                                'employeemothlypf' =>$value->employeemothlypf,
                              
                                'employermothlypf' =>$value->employermothlypf,
                               

                                'esi' =>  $value->esi,
                                'employeemothlyesi' =>$value->employeemothlyesi,
                                
                                'esi_per_employee' =>$value->esi_per_employee,
                                'employermothlyesi' =>$value->employermothlyesi,
                                'esi_per_employer' =>$value->esi_per_employer,

                                'ptax' =>$value->ptax,
                                'state' =>$value->state,
                                'mothlyptax' =>$value->mothlyptax,
                                'total_gross'=>$value->total_gross,
                                'total_deduction'=> $value->total_deduction,
                                'take_home'=>$value->take_home,
                                 'withday'=> $value->withday,
                                'withoutday'=>$value->withoutday,
                                );
                //print_r($data); die;
                                $this->db->insert(tablename('employee_payroll'), $data);
                                $insertId = $this->db->insert_id();
                                $emp_salary_details = $this->PayrollModel->get_result_data('employee_salary_details_temp', array('employee_salary_temp_id' => $value->id));
                                foreach ($emp_salary_details as $key => $value1) {
                                  $data_details = array(
                                'employee_payroll_id' => $insertId,
                                'component_id' => $value1->component_id,
                                'amount' => $value1->amount,
                                'type' => $value1->type,
                                );
                                $this->db->insert(tablename('employee_payroll_details'), $data_details);
                                }



//$temp = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_id' => $data->id,'month' => $month,'year' => $year));
$this->db->delete('HR_employee_salary_details_temp', array('employee_salary_temp_id' => $value->id)); 
$this->db->delete('HR_employee_salary_temp', array('id' => $value->id,'month' => $value->month,'year' => $value->year));
                echo 'done';
                $flag ++;
                }
                if($flag == '0'){
                 return 'yes';
                }
                }
        
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

       }
    }


    public function emp_register_delete($month = NULL, $year = NULL, $startingdate = NULL, $endingdate = NULL) {
      $employee_ids = $_POST['ids'];
      if(!empty($employee_ids)){
            foreach ($employee_ids as $key => $value) {
               
                $emp_salary_temp = $this->PayrollModel->get_row_data('employee_salary_temp', array('employee_id' => $value,'month' => $month,'year' => $year));

                $this->db->delete('HR_employee_salary_details_temp', array('employee_salary_temp_id' => $emp_salary_temp->id)); 
                $this->db->delete('HR_employee_salary_temp', array('employee_id' => $value,'month' => $month,'year' => $year)); 
                $this->db->delete('HR_hold_freeze_payroll', array('employee_id' => $value,'month' => $month,'year' => $year)); 
                $this->db->delete('HR_adhoc_freeze_payroll', array('employee_id' => $value,'month' => $month,'year' => $year)); 
                $this->db->delete('HR_adhoc_freeze_payroll', array('employee_id' => $value,'month' => $month,'year' => $year)); 
                $this->db->delete('HR_payroll_addhoc_details', array('employee_id' => $value,'month' => $month,'year' => $year));
                $this->db->delete('HR_leaves_freeze_payroll', array('employee_id' => $value,'month' => $month,'year' => $year));  
                $this->db->delete('HR_attendance_freeze_payroll', array('employee_id' => $value,'month' => $month,'year' => $year));  

                return 'deleted';

            }
      }
      
    }

 
public function load_all_payroll_for_off_cycle($type) {
        $this->db->select('master_salary_component.component,t1.amount,t1.type');
        $this->db->from(tablename('offcycle_temp') . ' as t1');
         $this->db->join('master_salary_component', 'master_salary_component.id = t1.component');
		 $this->db->where('t1.type', $type); 
		 $this->db->order_by("t1.type");
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	 /* public function modify($id) {  
        //echo "<pre>"; print_r($_POST); die;
        $employee_id= $this->input->post('employee_id');
		$emp_id_hidden =  $this->input->post('emp_id_hidden');
        $off_cycle_date= $this->input->post('date');
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
			$all_offcycle_temp_edit = $this->PayrollModel->get_result_data('offcycle_temp',array());
                foreach($all_offcycle_temp_edit as $offcycle_temp){
						$dataup = array(
						'transaction_id' =>  $id,
						'employee_id' =>  $emp_id_hidden,
						'off_cycle_date' =>  date('Y-m-d',strtotime($off_cycle_date)),
						'type' => $offcycle_temp->type,
						'component_id' => $offcycle_temp->component,
						'amount' => $offcycle_temp->amount,
						'entry_date'=>$date 
						);
						//print_r($data); die;
						$this->db->insert(tablename('off_cycle_payroll'), $dataup);
					}
					$this->db->truncate('HR_offcycle_temp');
            $this->session->set_flashdata('successmessage', 'off cycle modified successfully');
            redirect(base_url('off_cycle/1'));
        } else {
			$transaction_id = 'TNS/'.date('d/m/Y').'/'.date('s');
			//echo $transaction_id;die;
			$all_offcycle_temp = $this->PayrollModel->get_result_data('offcycle_temp',array());
			if($employee_id == 0){
				$all_employee = $this->PayrollModel->get_result_data('employee',array('is_active'=>'Y','delete_flag'=>'N'));
				

				foreach($all_employee as $employees){
					foreach($all_offcycle_temp as $offcycle_temp){
						$data = array(
						'transaction_id' =>  $transaction_id,
						'employee_id' =>  $employees->id,
						'off_cycle_date' =>  date('Y-m-d',strtotime($off_cycle_date)),
						'type' => $offcycle_temp->type,
						'component_id' => $offcycle_temp->component,
						'amount' => $offcycle_temp->amount,
						'entry_date'=>$date 
						);
						$this->db->insert(tablename('off_cycle_payroll'), $data);
					}
					
				}
			}else{
				foreach($all_offcycle_temp as $offcycle_temp){
						$data = array(
						'transaction_id' =>  $transaction_id,
						'employee_id' =>  $employee_id,
						'off_cycle_date' =>  date('Y-m-d',strtotime($off_cycle_date)),
						'type' => $offcycle_temp->type,
						'component_id' => $offcycle_temp->component,
						'amount' => $offcycle_temp->amount,
						'entry_date'=>$date 
						);
						//print_r($data); die;
						$this->db->insert(tablename('off_cycle_payroll'), $data);
					}
			}
         
               
            $this->db->truncate('HR_offcycle_temp');
            //$this->db->insert(tablename('master_department'), $data);
            //$this->db->insert_batch('mytable', $data); 
             $this->session->set_flashdata('successmessage', 'off cycle added successfully');
            redirect(base_url('off_cycle/1'));
        }
    }*/
	
	
	public function modify($id){ 
		$emp_id_hidden =  $this->input->post('emp_id_hidden');
		$employee_id = explode(',',$emp_id_hidden);
        $off_cycle_date= date("Y-m-d");
        $date = date("Y-m-d H:i:s");

			$transaction_id = 'TNS/'.date('d/m/Y').'/'.date('s');
			//echo $transaction_id;die;
			$all_offcycle_temp = $this->PayrollModel->get_result_data('offcycle_temp',array());
			if(!empty($employee_id)){
				foreach($employee_id as $key => $value){
					foreach($all_offcycle_temp as $offcycle_temp){
						$data = array(
						'transaction_id' =>  $transaction_id,
						'employee_id' =>  $value,
						'off_cycle_date' =>  date('Y-m-d',strtotime($off_cycle_date)),
						'type' => $offcycle_temp->type,
						'component_id' => $offcycle_temp->component,
						'amount' => $offcycle_temp->amount,
						'entry_date'=>$date 
						);
						$this->db->insert(tablename('off_cycle_payroll'), $data);
					}
					
				}
			}
            $this->db->truncate('HR_offcycle_temp');
             //$this->session->set_flashdata('successmessage', 'off cycle added successfully');
            redirect(base_url('off_cycle/1'));
        
    }
	
	
	 public function load_all_off_cycle() {
        $this->db->select('t1.*');
        $this->db->from(tablename('off_cycle_payroll') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->where('t1.status', '0'); 
		$this->db->group_by('t1.employee_id,t1.transaction_id');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
		
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	public function load_all_off_cycle_final_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('off_cycle_payroll') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->where('t1.status', '1'); 
		$this->db->group_by('t1.employee_id,t1.transaction_id');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
		
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	public function load_single_data($transactionid = "") {
        $this->db->select('*');
        $this->db->from(tablename('off_cycle_payroll'));
        $this->db->where('transaction_id', $transactionid);
		$this->db->group_by('employee_id');
        $query = $this->db->get();
        $result = $query->row();
//echo $this->db->last_query() ; die;
        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
	
	
	public function load_all_off_cycle_empwise($transactionid = "",$emp_id = "") {
        $this->db->select('off_cycle_payroll.*,master_salary_component.component,master_salary_component.id as com_id');
        $this->db->from(tablename('off_cycle_payroll'));
		$this->db->join('master_salary_component', 'master_salary_component.id = off_cycle_payroll.component_id');
        $this->db->where('transaction_id', $transactionid);
		$this->db->where('employee_id', $emp_id);
        $query = $this->db->get();
        $result = $query->result();
//echo $this->db->last_query() ; die;
        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
	
	 public function get_total_amount_pay($transactionid = "",$emp_id = "") {
        $this->db->select('sum(amount) as pay_amount');
        $this->db->from(tablename('off_cycle_payroll') . ' as t1');
		$this->db->where('transaction_id', $transactionid);
		$this->db->where('employee_id', $emp_id);
		$this->db->where('type', 'pay');
        $this->db->where('t1.delete_flag', 'N'); 
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
		
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	public function get_total_amount_deduction($transactionid = "",$emp_id = "") {
        $this->db->select('sum(amount) as deduction_amount');
        $this->db->from(tablename('off_cycle_payroll') . ' as t1');
		$this->db->where('transaction_id', $transactionid);
		$this->db->where('employee_id', $emp_id);
		$this->db->where('type', 'deduction');
        $this->db->where('t1.delete_flag', 'N'); 
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
		
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
		public function get_all_off_component_head($transactionid = "",$emp_id = "",$type = "") {
        $this->db->select('*');
        $this->db->from(tablename('off_cycle_payroll') . ' as t1');
		$this->db->where('transaction_id', $transactionid);
		$this->db->where('employee_id', $emp_id);
		$this->db->where('type', $type);
        
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
		
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	public function get_all_off_payroll_details($transactionid = "",$emp_id = "",$component_id= "") {
        $this->db->select('*');
        $this->db->from(tablename('off_cycle_payroll') . ' as t1');
		$this->db->where('transaction_id', $transactionid);
		$this->db->where('employee_id', $emp_id);
        $this->db->where('component_id', $component_id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
		
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	
	   


	
	 
    

}

/* End of file PayrollModel.php */
/* Location: ./application/modules/payroll/models/admin/PayrollModel.php */