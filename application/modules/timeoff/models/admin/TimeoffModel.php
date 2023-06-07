<?php
/**
 * department Model Class. Handles all the datatypes and methodes required for handling department
 */
class TimeoffModel extends CI_Model {

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
     * <p>This function loads all the department that has been added by current admin [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t2.employee_no,t2.personal_image');
        $this->db->from(tablename('timeoff') . ' as t1');
         $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
        $this->db->where('t1.delete_flag', 'N'); 
		 $this->db->where('t2.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
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
	
	 public function load_all_data_emp_id($emp_id) {
        $this->db->select('t1.*,t2.first_name,t2.middle_name,t2.last_name,t2.employee_no,t2.personal_image');
        $this->db->from(tablename('timeoff') . ' as t1');
         $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
        $this->db->where('t1.delete_flag', 'N');
		 $this->db->where('t2.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
         $this->db->where('t1.employee_id', $emp_id);		
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
        //echo "<pre>"; print_r($_POST); die;
		$mode= $this->input->post('mode');
        $employee= $this->input->post('employee');
        $purpose= $this->input->post('purpose');
        $date = date("Y-m-d H:i:s");

        $type_val= $this->input->post('type_val');
        $work_status= $this->input->post('work_status');
        $deduction_type= $this->input->post('deduction_type');

      
        $from_date= date('Y-m-d',strtotime($this->input->post('from_date')));
        $to_date= date('Y-m-d',strtotime($this->input->post('to_date')));
      
        $entry_time= $this->input->post('entry_time');
        $out_time= $this->input->post('out_time');

        $date= date('Y-m-d',strtotime($this->input->post('date')));
        $time= $this->input->post('time');
        

        if (!empty($id)) {
                $dataup = array(
                    'employee_id' => $employee,
                    'type' =>  $type_val,
                    //'date' =>  $date,
                    //'time' => $time,
                    'purpose' => $purpose,
                    'modified_date' =>  date('Y-m-d')
                );
                if($type_val == 'Personal'){
                    $dataup['date'] = $date;
                    $dataup['time'] = $time;
                    $dataup['work_status'] = '';
                    $dataup['from_date'] = '';
                    $dataup['to_date'] = '';
                    $dataup['entry_time'] = '';
                    $dataup['out_time'] = '';
                }else{
                    $dataup['from_date'] = $from_date;
                    $dataup['to_date'] = $to_date;
                    $dataup['entry_time'] = $entry_time;
                    $dataup['out_time'] = $out_time;
                     $dataup['work_status'] = $work_status;
                    $dataup['date'] = '';
                    $dataup['time'] = '';
                }

                if($work_status == 'WFH'){
                $dataup['deduction_type'] = $deduction_type;
                }else{
                $dataup['deduction_type'] = '';
                }
           
            $this->db->where('id', $id)->update(tablename('timeoff'), $dataup);
            $this->session->set_flashdata('successmessage', 'Time off modified successfully');
			
				
			
				redirect(base_url('page/87/1'));
			
            
        } else {
         
                $datain = array(
                    'employee_id' => $employee,
                    'type' =>  $type_val,
                    'purpose' => $purpose,
                    'entry_date' => date('Y-m-d'),
                );

                if($type_val == 'Personal'){
                    $datain['date'] = $date;
                    $datain['time'] = $time;
                   $datain['work_status'] = '';
                    $datain['from_date'] = '';
                    $datain['to_date'] = '';
                    $datain['entry_time'] = '';
                    $datain['out_time'] = '';
                }else{
                    $datain['from_date'] = $from_date;
                    $datain['to_date'] = $to_date;
                    $datain['entry_time'] = $entry_time;
                    $datain['out_time'] = $out_time;
                    $datain['work_status'] = $work_status;
                    $datain['date'] = '';
                    $datain['time'] = '';
                }

                if($work_status == 'WFH'){
                $datain['deduction_type'] = $deduction_type;
                }else{
                $datain['deduction_type'] = '';
                }
            
            $this->db->insert(tablename('timeoff'), $datain);
            
             $this->session->set_flashdata('successmessage', 'Time off added successfully');
            
				redirect(base_url('page/87/1'));
			
        }
    }



    /**
     * Used for get department by id
     *
     * <p>Description</p>
     *
     * <p>This function get department by id from table [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('timeoff'));
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
     * <p>This function status department [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('timeoff'));
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
            if ($this->db->update('timeoff', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Time Off Status changed successfully');
            redirect(base_url('page/87/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/87/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Time Off not matched');
            redirect(base_url('page/87/1'));
        }
    }

    /**
     * Used for delete department
     *
     * <p>Description</p>
     *
     * <p>This function delete department [Table: master_department]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('timeoff'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('timeoff', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Time Off Deleted successfully');
            redirect(base_url('page/87/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/87/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Time Off not matched');
            redirect(base_url('page/87/1'));
        }
    }
 

 public function load_all_employee(){

        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->where('t1.is_active', 'Y'); 
		$this->db->order_by('t1.first_name','asc');
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


     public function get_row_data_orderby($table, $where) {
        $this->db->order_by("id", "desc"); 
        $this->db->limit(1);
        $query = $this->db->get_where(tablename($table), $where);
       //echo  $this->db->last_query(); exit;
        return $query->row();

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
     //  echo '<pre>'; print_r($result); die;
		 if (!empty($result)) {
			 return $result;
        } else {
            return array();
        }
        
    }
}
/* End of file DeptModel.php */
/* Location: ./application/modules/department/models/admin/DeptModel.php */