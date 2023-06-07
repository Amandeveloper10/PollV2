<?php

/**
 * employee_leave Model Class. Handles all the datagrade_ids and methodes required for handling employee_leave
 */
class EmpOpeningLeaveModel extends CI_Model {

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
     * Used for loading functionality of employee_leave for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the employee_leave that has been added by current admin [Table: master_employee_leave]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*,t2.employee_no,t2.id as empid,t2.first_name,t2.last_name,t2.grade,t3.rule_name');
        $this->db->from(tablename('employee_leaves'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
        $this->db->join('master_leave_rules as t3', 't3.id = t1.leave_id', 'left');
        $this->db->order_by("t1.employee_id", "asc");
        $this->db->group_by("t1.employee_id"); 

        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

      public function load_all_data_monthwise($month) {
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t3.rule_name');
        $this->db->from(tablename('employee_leaves'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
        $this->db->join('master_leave_rules as t3', 't3.id = t1.leave_id', 'left');
        $this->db->where('credited_month',$month);
        $this->db->order_by("t1.employee_id", "asc"); 

        $query = $this->db->get();
        $result = $query->result();

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

    /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit employee_leave</p>
     *
     * @access  public
     * @param   id
     * @return string
     */
    public function modify($id) {
           
        //echo "<pre>"; print_r($_POST); die;
        $openingdate = $this->input->post('date');
        $employee_id = $this->input->post('employee_id');
        $leaves = $this->input->post('leave_id');
        if(!empty($leaves)){
            $leave_id = explode(',', $leaves[0]);
        }
        $total_balance = $this->input->post('opening_balance');
        if(!empty($total_balance)){
            $opening_balance = explode(',', $total_balance[0]);
        }
        
       
        

        
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
            
        } else {
            if(!empty($leave_id) && !empty($opening_balance)){
                //print_r($leave_id); die;
                foreach($opening_balance as $key => $value) {
                    if($value != '' && $value != '0'){

                         $empleave = $this->EmpOpeningLeaveModel->get_row_data_orderby('employee_leaves',array('leave_id'=>$leave_id[$key],'employee_id'=>$employee_id));
                         if(!empty($empleave)){
                             $data = array(
                        'employee_id' =>  $employee_id,
                        'leave_id'  => $leave_id[$key],
                        'opening_balance' =>$value,
                        'opening_leaves' =>$value,
                        'entry_date' => $date,
                        'credited_month' =>date('F',strtotime($openingdate)),
                        'type' => 'opening leave',
                        'note' => 'opening leave',
                        'date' => date('Y-m-d',strtotime($date)),
                        'closing_balance' => $empleave->closing_balance +  $value,
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                    }else{
                         $data = array(
                        'employee_id' =>  $employee_id,
                        'leave_id'  => $leave_id[$key],
                        'opening_balance' =>$value,
                        'opening_leaves' =>$value,
                        'entry_date' => $date,
                        'credited_month' =>date('F',strtotime($openingdate)),
                        'type' => 'opening leave',
                        'note' => 'opening leave',
                        'date' => date('Y-m-d',strtotime($date)),
                        'closing_balance' => $value,
                        );
                        $this->db->insert(tablename('employee_leaves'), $data);
                    }
                       
                        $insert_id = $this->db->insert_id();
                    }
                 
                }
            }
           
            

            $this->session->set_flashdata('successmessage', 'Leave added successfully');
            redirect(base_url('page/90/1'));
        }
    }

    /**
     * Used for get employee_leave by id
     *
     * <p>Description</p>
     *
     * <p>This function get employee_leave by id from table [Table: master_employee_leave]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('employee_leave_application'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function get_employee_details() {
        $this->db->select('*');
        $this->db->from(tablename('employee'));
         $this->db->where('HR_employee.delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function leave_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.leave_total_days) as totalday');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->where('t1.leave_type_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalday;
        } else {
            return 0;
        }
    }

    public function settlement_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.settlement_leaves) as totalsettday');
        $this->db->from(tablename('leave_settlement') . ' as t1');
        $this->db->where('t1.leave_type_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        //$this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->totalsettday;
        } else {
            return 0;
        }
    }

        public function load_all_data_search($stDate,$endDate,$type) {

        $where = "(t1.leave_from >= '".$stDate."' AND t1.leave_from <= '".$endDate."')";

        $this->db->select('t1.*,t2.employee_no');
        $this->db->from(tablename('employee_leave_application'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
        $this->db->where($where);
        if($type=='registered'){            
            $this->db->where('approved','Yes');              
        }   
        $this->db->order_by('t1.leave_from', 'desc');
        $query = $this->db->get();
        $result = $query->result();
       // echo $this->db->last_query() ; die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
     public function get_total_attendence_of_employee($employee_id='',$month=NULL,$year=NULL) {
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
     public function total_leave_taken($employee_id='',$month=NULL,$year=NULL) {
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
      public function load_all_saved_payroll_employee_id($month = "",$year = "",$id = "") {
         if (empty($month)){
            $month=date('m'); 
         }
          if (empty($year)){
            $year=date('Y'); 
         }

        $this->db->select('employee_payroll.*,employee.first_name,employee.middle_name,employee.last_name,employee.personal_image,employee.employee_no,employee.ctc_amount,employee.grade');
        $this->db->from(tablename('employee_payroll'));
        $this->db->join('employee', 'employee.id =employee_payroll.employee_id ','left');
        $this->db->where('HR_employee_payroll.payroll_month', $month);
        $this->db->where('HR_employee_payroll.payroll_year', $year);
        $this->db->where('HR_employee_payroll.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
     public function leave_type_for_this_employee($id=NULL) {
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
    public function leave_type_details($id=NULL) {
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

    public function get_row_data_orderby($table, $where) {
        $this->db->order_by("id", "desc"); 
        $this->db->limit(1);
        $query = $this->db->get_where(tablename($table), $where);
       // echo  $this->db->last_query(); //exit;
        return $query->row();

    }

    public function get_all_nos_credit($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.credited_leaves) as credited_leaves');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->credited_leaves;
        } else {
            return 0;
        }
    }

    public function get_all_nos_taken($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.taken_leaves) as taken_leaves');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->taken_leaves;
        } else {
            return 0;
        }
    }

    public function get_all_nos_lop($employee_id=NULL) {
        $this->db->select('sum(t1.lop) as lops');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        //$this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $query = $this->db->get();
        $result = $query->row();
        //echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->lops;
        } else {
            return 0;
        }
    }

    public function get_all_nos_opening($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('t1.opening_balance');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        $this->db->where('t1.type', 'opening leave');

        
        $query = $this->db->get();
        $result = $query->row();
       // echo 'yyyy'. $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result->opening_balance;
        } else {
            return 0;
        }
    }

    


}

/* End of file EmpLeaveModel.php */
/* Location: ./application/modules/employee_leave/models/admin/Model.php */