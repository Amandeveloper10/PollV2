<?php
/**
 * department Model Class. Handles all the datatypes and methodes required for handling department
 */
class AssignedworkshiftModel extends CI_Model {

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
     * Used for loading functionality of department for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the department that has been added by current admin [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data($id,$m,$y) {
            $start_date1 = $y.'-'.$m.'-01';
            $end_date1 = $y.'-'.$m.'-31';
            $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t2.employee_no');
            $this->db->from(tablename('assigned_workshift') . ' as t1');
            $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
            $this->db->where('t1.delete_flag', 'N'); 
           $this->db->group_by("t1.employee_id"); 
           $this->db->where('start_date BETWEEN "'.$start_date1. '" and "'.$end_date1.'"');
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

    public function get_all_data($empid,$d,$m,$y) {
        $start_date1 = $y.'-'.$m.'-'.$d;
        //$end_date1 = $y.'-'.$m.'-31';
        //echo $end_date1;
            $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t3.work_shift_name,t3.color,t3.id as workshiftid');
            $this->db->from(tablename('assigned_workshift') . ' as t1');
            $this->db->join(tablename('master_work_shift'). ' as t3', 't3.id = t1.work_shift_id');
            $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
            $this->db->where('t1.employee_id', $empid); 
            $this->db->where('t1.delete_flag', 'N'); 
			$this->db->where('t1.start_date',  $start_date1); 
            //$this->db->where('start_date BETWEEN "'.$start_date1. '" and "'.$end_date1.'"');
            $query = $this->db->get();
            $result = $query->row();
        
        
       // echo "<pre>"; echo $this->db->last_query() ; //die;
         //echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	
	public function get_all_default_shift_data($empid) {
            $this->db->select('t1.first_name,t1.middle_name,t1.last_name,t3.work_shift_name,t3.color,t3.id as workshiftid');
            $this->db->from(tablename('employee') . ' as t1');
            $this->db->join(tablename('master_work_shift'). ' as t3', 't3.id = t1.work_shift_id');
            $this->db->where('t1.id', $empid); 
            $this->db->where('t1.delete_flag', 'N'); 
            $query = $this->db->get();
            $result = $query->row();
        //echo $this->db->last_query() ; //die;
         //echo "<pre>";print_r($result);exit;
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function load_all_workshift(){

        $this->db->select('t1.*');
        $this->db->from(tablename('master_work_shift') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        //echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }

    }

    public function get_all_workshift($shifts){
    
        $this->db->select('t1.*');
        $this->db->from(tablename('master_work_shift') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
        $this->db->where_in('id', $shifts );
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
        //echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }

    } 
    public function load_all_employee(){

        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
       $this->db->where('t1.is_active', 'Y'); 
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->order_by('t1.first_name', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        //echo "<pre>";print_r($result);exit;

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
	
	public function get_result_data_with_order_by($table, $where = "1=1") {
		
		$this->db->order_by("first_name", "asc");
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
     * <p>This function Used for add/edit department</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

    public function modify($id) {  
        //echo '<pre>'; print_r($_POST); die;

        $workshift_id= $this->input->post('workshift_id');
        $shifts = implode(",",$workshift_id);
        $employee_id= $this->input->post('employee');

        $start_date= $this->input->post('startdate');
        $off_day= $this->input->post('off_day');
        
        //$end_date= $this->input->post('end_date');
        $startdateArr = explode(" ",$start_date);
		$startdate = date('Y-m-d',strtotime($startdateArr[0]));
		$enddate = date('Y-m-d',strtotime($startdateArr[2]));
        //print_r($startdateArr); die;
//echo $startdate; echo '-'; echo $enddate; die;
          $rVal = array();
          $date = date("Y-m-d H:i:s");
		
			
			$stop_date = date('Y-m-d H:i:s', strtotime($enddate . ' +1 day'));
			$period = new DatePeriod(
			new DateTime($startdate),
			new DateInterval('P1D'),
			new DateTime($stop_date)
			);

			foreach ($period as $key => $value) {
			$rVal[] = $value->format('Y-m-d');
			}

			
		
		
		
    
            if (!empty($id)) {
                $this->db->delete('assigned_workshift', array('id' => $id)); 

                   if(!empty($rVal)){
                    foreach($rVal as $key => $value){
                      $data = array(
                        'work_shift_id' =>  $shifts,

                        'employee_id'  => $employee_id,
                        'start_date' => $value,
                        'off_day' => $off_day,
                        'daterange' => $start_date,
                        'modified_date' => $date,
                    );
                
                 $this->db->insert(tablename('assigned_workshift'), $data);  
                    }
                }
               
                   // $this->db->where('id', $id)->update(tablename('assigned_workshift'), $data);
                     $this->session->set_flashdata('successmessage', 'Assign Work shift To Employee modified successfully');
                   redirect(base_url('page/82/1'));

                    
            } else {



                if(!empty($rVal)){
                    foreach($rVal as $key => $value){
                        $this->db->select('*');
                        $this->db->from(tablename('assigned_workshift'));
                        $this->db->where('start_date', $value);
                        $this->db->where('employee_id', $employee_id);
                        $query = $this->db->get();
                        $result = $query->row();
                        if(!empty($result)){
                             $this->db->delete('assigned_workshift', array('employee_id' => $employee_id,'start_date' => $value)); 
                        }
                      $data = array(
                        'work_shift_id' =>  $shifts,

                        'employee_id'  => $employee_id,
                        'start_date' => $value,
                        'off_day' => $off_day,
                       'daterange' => $start_date,
                        'entry_date' => $date,
                    );
                
                $this->db->insert(tablename('assigned_workshift'), $data);  
                    }
                }

                 
                
                  $this->session->set_flashdata('successmessage', 'Assign Work shift To Employee added successfully');
                  redirect(base_url('page/82/1'));
               
            }
        
    }



    /**
     * Used for get department by id
     *
     * <p>Description</p>
     *
     * <p>This function get department by id from table [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('assigned_workshift'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
 /**
     * Used for status department
     *
     * <p>Description</p>
     *
     * <p>This function status department [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('assigned_workshift'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');

        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            $is_active = $result->is_active;

            if ($is_active == "N") {
                $new_is_active = "Y";
            } else {
                $new_is_active = "N";
            }
            $update_faq = array('is_active' => $new_is_active);
            $this->db->where('id', $id);
            if ($this->db->update('assigned_workshift', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Work Shift Status changed successfully');
            redirect(base_url('page/82/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/82/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Work Shift not matched');
            redirect(base_url('page/82/1'));
        }
    }

    /**
     * Used for delete department
     *
     * <p>Description</p>
     *
     * <p>This function delete department [Table: equipment]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('assigned_workshift'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {   

            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('assigned_workshift', $update_faq)) {

            $this->session->set_flashdata('successmessage', 'Assigned Work Shift Deleted successfully');
            redirect(base_url('page/82/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/82/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Assigned Work Shift not matched');
            redirect(base_url('page/82/1'));
        }
    }
	
	public function get_all_wfh_details($employee_id,$month,$year){
		$rVal = array();
        $from = $year.'-'.$month.'-01';
        $to = $year.'-'.$month.'-31';
       //echo $from; echo '<br>'; echo $to; die;
		$where_holly = "(HR_timeoff.from_date >= '".$from."' AND HR_timeoff.to_date <= '".$to."')";
        $this->db->select('HR_timeoff.*');
        $this->db->from(tablename('timeoff'));
        $this->db->where('HR_timeoff.delete_flag', 'N');
        $this->db->where('HR_timeoff.is_active', 'Y');
		$this->db->where('HR_timeoff.employee_id',$employee_id);
		$this->db->where('HR_timeoff.type','Official');
		$this->db->where('HR_timeoff.work_status','WFH');
		$this->db->where('HR_timeoff.approved','Yes');
        $this->db->where($where_holly);
        $this->db->order_by('HR_timeoff.from_date', 'asc');
        $query_holly = $this->db->get();
        $result_holly = $query_holly->result();
		//echo '<pre>'; echo $this->db->last_query(); //die;
         // echo '<pre>';print_r($result_holly); die;
        //$rVal=0;
        $holidays = array();
        if (!empty($result_holly)) {
        foreach ($result_holly as $value_new) {
        $stop_date_new = date('Y-m-d H:i:s', strtotime($value_new->to_date . ' +1 day'));
        $periodnew = new DatePeriod(
        new DateTime($value_new->from_date),
        new DateInterval('P1D'),
        new DateTime($stop_date_new)
        );
        if(!empty($value_new->work_status) && !empty($periodnew))   
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
		//print_r($holidays); die;
		
		 if(!empty($holidays)){
                $rVal['wfh'] = $holidays;
            }
			
			if (!empty($result_holly)) {
            return $rVal;
			}else{
				return array();
			}
			
			
	}
	
	 public function get_workshift_details($workshift = "",$weekNo = "",$stweekname = "") {
		  //echo $workshift; echo '<br>';  echo $weekNo; echo '<br>'; echo $stweekname; echo '<br>'; die;
        $this->db->select('master_work_shift.*,master_work_shift_off_day.weekvalue');
        $this->db->from(tablename('master_work_shift_off_day'));
		$this->db->join('master_work_shift', 'master_work_shift.id = master_work_shift_off_day.work_shift_id', 'left');
        $this->db->where('work_shift_id', $workshift);
		$this->db->where('week_no', $weekNo);
		$this->db->like('weekname', $stweekname);
		$this->db->where('master_work_shift_off_day.delete_flag', 'N');
		$this->db->where('master_work_shift_off_day.is_active', 'Y');
        $query = $this->db->get();
        $result = $query->row();
      // echo '<pre>'; print_r($result); //die;
		 if (!empty($result)) {
			 return $result;
        } else {
            return array();
        }
        
    }
 
}
/* End of file DeptModel.php */
/* Location: ./application/modules/department/models/admin/DeptModel.php */