<?php
/**
 * designation Model Class. Handles all the datatypes and methodes required for handling designation
 */
class EmpattModel extends CI_Model {

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
     * Used for loading functionality of designation for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the designation that has been added by current admin [Table: master_designation]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_gratuity_formula') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
        $this->db->where('t1.is_active', 'Y'); 
        $this->db->order_by('no_of_year', 'desc');
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
    
     public function load_all_employee() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
        $this->db->where('t1.is_active', 'Y'); 
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




    public function load_att_month($id = "",$month = "",$year="") {
        $from = $year.'-'.$month.'-01';
        $to = $year.'-'.$month.'-31';
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
                //$rVal[$dateVal_leave[2]] = $value->rule_name;
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

    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
 
}
/* End of file DesiModel.php */
/* Location: ./application/modules/designation/models/admin/DesiModel.php */