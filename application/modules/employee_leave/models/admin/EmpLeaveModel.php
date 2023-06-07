<?php

/**
 * employee_leave Model Class. Handles all the datagrade_ids and methodes required for handling employee_leave
 */
class EmpLeaveModel extends CI_Model {

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
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image,t2.employee_no');
        $this->db->from(tablename('employee_leave_application'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t2.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
        if(isset($_GET['start_date']) && isset($_GET['end_date'])){
            $where = "(t1.leave_from >= '".$_GET['start_date']."' AND t1.leave_from <= '".$_GET['end_date']."')";
            $this->db->where($where); 
            $this->db->order_by('t1.leave_from', 'desc'); 
        }   
        $this->db->order_by("leave_from");
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	  public function load_all_data_by_date($start_date,$end_date) {
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image,t2.employee_no');
        $this->db->from(tablename('employee_leave_application'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t2.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
        if($start_date != '' && $end_date != ''){
            $where = "(t1.leave_from >= '".$start_date."' AND t1.leave_from <= '".$end_date."')";
            $this->db->where($where); 
            $this->db->order_by('t1.leave_from', 'desc'); 
        }   
        $this->db->order_by("leave_from");
        $query = $this->db->get();
        $result = $query->result();
		//echo $this->db->last_query(); die;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	 public function load_all_data_by_empid($empid) {
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image,t2.employee_no');
        $this->db->from(tablename('employee_leave_application'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t2.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
        if(isset($_GET['start_date']) && isset($_GET['end_date'])){
            $where = "(t1.leave_from >= '".$_GET['start_date']."' AND t1.leave_from <= '".$_GET['end_date']."')";
            $this->db->where($where); 
            $this->db->order_by('t1.leave_from', 'desc'); 
        }   
		$this->db->where('t1.employee_id', $empid);
        $this->db->order_by("leave_from");
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	
	 public function load_all_data_by_empid_by_date($empid,$start_date,$end_date) {
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image,t2.employee_no');
        $this->db->from(tablename('employee_leave_application'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t2.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
        if($start_date != '' && $end_date != ''){
            $where = "(t1.leave_from >= '".$start_date."' AND t1.leave_from <= '".$end_date."')";
            $this->db->where($where); 
            $this->db->order_by('t1.leave_from', 'desc'); 
        }   
		$this->db->where('t1.employee_id', $empid);
        $this->db->order_by("leave_from");
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

	public function get_result_data_with_order_by($table, $where = "1=1") {
		
		$this->db->order_by("first_name", "asc");
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }
	
     public function get_row_data_orderby($table, $where) {
        $this->db->order_by("id", "desc"); 
        $this->db->limit(1);
        $query = $this->db->get_where(tablename($table), $where);
       // echo  $this->db->last_query(); //exit;
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
    public function modify($id,$employee_id,$leave_from,$leave_type, $leave_total_days,$leave_note,$passport_image) {
        //echo "<pre>"; print_r($_POST);
        //echo "<pre>"; 
		//print_r($_FILES); die;
       
		$Arrdate = explode(" ",$leave_from);
		

 if (!empty($id)) {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        }

			  if (!empty($result->documents)) {
            $allpassport_image = $result->documents;
        } else {
            $allpassport_image = '';
        }

        $passport_imagefileall = '';
        $passport_imagefile = '';
        $passport_image = $_FILES['passport_image'];

        if (!empty($passport_image)) {
            for ($i = 0; $i <= count($passport_image['name']); $i++) {

                if (!empty($passport_image['name'][$i])) {

                    $passport_image_doc = $this->upload_files_new($passport_image['name'][$i], $passport_image['tmp_name'][$i]);
                    $passport_imagefile.=$passport_image_doc . ',';
                }
            }
            $passport_imagefile = $passport_imagefile . $allpassport_image;
            if (!empty($passport_imagefile)) {
                //1111//
                $passport_imagefileall = rtrim($passport_imagefile, ',');
            }
        }

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
            $data['employee_id'] = $employee_id;
            $data['leave_from'] = date('Y-m-d',strtotime($Arrdate[0]));
            $data['leave_to'] = date('Y-m-d',strtotime($Arrdate[2]));
            $data['leave_total_days'] = $leave_total_days;
            //$data['leave_ticket'] = $leave_ticket;
            $data['leave_type_id'] = $leave_type;
            //$data['leave_ticket_amount'] = $leave_ticket_amount;
            $data['leave_note'] = $leave_note;          
            $data['create_date'] = $date;
			$data['date_range'] = $leave_from;
			if (!empty($passport_imagefileall)) {
                $data['documents'] = $passport_imagefileall;
                }

            $this->db->where('id', $id)->update(tablename('employee_leave_application'), $data);


            $this->session->set_flashdata('successmessage', 'Leave modified successfully');
            redirect(base_url('page/65/1'));
        } else {

            $data['employee_id'] = $employee_id;
             $data['leave_from'] = date('Y-m-d',strtotime($Arrdate[0]));
            $data['leave_to'] = date('Y-m-d',strtotime($Arrdate[2]));
            $data['leave_total_days'] = $leave_total_days;
            //$data['leave_ticket'] = $leave_ticket;
            $data['leave_type_id'] = $leave_type;
           // $data['leave_ticket_amount'] = $leave_ticket_amount;
            $data['leave_note'] = $leave_note;
            $data['create_date'] = $date;
            $data['date_range'] = $leave_from;
			if (!empty($passport_imagefileall)) {
                $data['documents'] = $passport_imagefileall;
                }
            $this->db->insert(tablename('employee_leave_application'), $data);
            $insert_id = $this->db->insert_id();

            $this->session->set_flashdata('successmessage', 'Leave added successfully');
            redirect(base_url('page/65/1'));
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

    /*public function leave_due_day($leave_id=NULL,$employee_id=NULL) {
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
    }*/

    public function leave_due_day($leave_id=NULL,$employee_id=NULL) {
        $this->db->select('sum(t1.opening_balance) as totalday');
        $this->db->from(tablename('employee_leaves') . ' as t1');
        $this->db->where('t1.leave_id', $leave_id);
        $this->db->where('t1.employee_id', $employee_id);
        //$this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query() ; die;
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
public function upload_files_new($name = NULL, $temp = NULL) {
        // echo $divid;
        //  echo "<pre>"; print_r($_FILES); die;


        $newImageName = str_replace(' ', '_', $name);
        $fileUpload = move_uploaded_file($temp, 'uploads/' . $newImageName);
        if ($fileUpload) {
            $file = $newImageName;
        } else {
            $file = '';
        }
        return $file;

        // echo $file; die;
    }
	
	 public function exp_delete_selected_image($id,$selectedimg,$table,$field,$tablefield){
    
            $this->db->select('t1.*');
            $this->db->from(tablename($table) . ' as t1');
            $this->db->where('t1.id',$id);
            $this->db->order_by("t1.id", "desc"); 

            $query = $this->db->get();
            $result = $query->row();
			//print_r($result); die;
			
			//$valfield = '$result->'.$tablefield;
            //echo $valfield; die;
            $imgarr = explode(",",$result->$tablefield);
            //print_r($imgarr); die;
            //print_r($result->passport_image); die; // 
            $imgstr = '';
            if (in_array($selectedimg, $imgarr))
            {
            //echo "Match found";
            if (($key = array_search($selectedimg, $imgarr)) !== false) { unset($imgarr[$key]); }
            //print_r($imgarr);
            $imgstr = implode(",", $imgarr);
          
            $update_img = array($tablefield => $imgstr);
            
            $this->db->where('id', $id);
            $this->db->update($table, $update_img);
            return '1';
            }

            else
            {
           // //echo "Match not found";//
                return '0';
            }


     }

}

/* End of file EmpLeaveModel.php */
/* Location: ./application/modules/employee_leave/models/admin/Model.php */