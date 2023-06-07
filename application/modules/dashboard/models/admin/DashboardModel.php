<?php
/**
 * vehicles Model Class. Handles all the datatypes and methodes required for handling vehicles
 */
class DashboardModel extends CI_Model {

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
     * Used for loading functionality of vehicles for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the vehicles that has been added by current admin [Table: vehicles]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
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
	
	 public function load_all_data_male() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');		
		$this->db->where('t1.gender', 'Male'); 
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
	
	public function load_all_data_female() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');		
		$this->db->where('t1.gender', 'Female'); 
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
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->where('t1.approved', 'Yes'); 
       // $this->db->where('t1.approved', 'Yes');
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
    
    public function load_all_data_vehicle() {
        $this->db->select('t1.*,t2.vehicle_no');
        $this->db->from(tablename('vehicle-maintenance') . ' as t1');
        $this->db->join(tablename('vehicles'). ' as t2', 't1.vehicle_id = t2.id');
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
    
     public function load_all_data_vehicle_asignment() {
        $this->db->select('t1.*,t2.vehicle_no,t3.first_name,t3.middle_name,t3.last_name,t3.employee_no');
        $this->db->from(tablename('vehicle-asignment') . ' as t1');
        $this->db->join(tablename('vehicles'). ' as t2', 't1.vehicle_id = t2.id');
        $this->db->join(tablename('employee'). ' as t3', 't1.employe_id = t3.id');
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
	
	public function get_row_data_idorderby($table, $where) {
		$this->db->order_by("id", "desc");
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }



  /**
     * Used for add/edit rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function Used for add/edit vehicles</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $vehicle_no= $this->input->post('vehicle_no');
        $vehicle_reg_code= $this->input->post('vehicle_reg_code');
        $vehicle_name= $this->input->post('vehicle_name');
        $vehicle_model_year= $this->input->post('vehicle_model_year');
        $purchase_amount= $this->input->post('purchase_amount');
        $assign_emloyee= $this->input->post('assign_emloyee');
        $reg_doc= $this->input->post('reg_doc_1');
        $insur_doc= $this->input->post('insur_doc_1');


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'vehicle_no' => $vehicle_no,
                    'vehicle_reg_code' => $vehicle_reg_code,
                    'vehicle_name' => $vehicle_name,
                    'vehicle_model_year' => $vehicle_model_year,
                    'purchase_amount' => $purchase_amount,
                    'assign_emloyee' => $assign_emloyee,
                    'reg_doc' => $reg_doc,
                    'insur_doc' => $insur_doc,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('vehicles'), $data);
            $this->session->set_flashdata('successmessage', 'Vehicles modified successfully');
            redirect(base_url('page/48/1'));
        } else {
         
                $data = array(
                    'vehicle_no' => $vehicle_no,
                    'vehicle_reg_code' => $vehicle_reg_code,
                    'vehicle_name' => $vehicle_name,
                    'vehicle_model_year' => $vehicle_model_year,
                    'purchase_amount' => $purchase_amount,
                    'assign_emloyee' => $assign_emloyee,
                    'reg_doc' => $reg_doc,
                    'insur_doc' => $insur_doc,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('vehicles'), $data);
            
             $this->session->set_flashdata('successmessage', 'Vehicles added successfully');
            redirect(base_url('page/48/1'));
        }
    }
    
     public function modify_maintenance($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $vehicle_id= $this->input->post('vehicle_id');
        $maintenance_date= $this->input->post('maintenance_date');
        $expenses= $this->input->post('expenses');
        $details= $this->input->post('details');
       


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'vehicle_id' => $vehicle_id,
                    'maintenance_date' => $maintenance_date,
                    'expenses' => $expenses,
                    
                    'details' => $details,
                   
                  
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('vehicle-maintenance'), $data);
            $this->session->set_flashdata('successmessage', 'Vehicles modified successfully');
            redirect(base_url('page/58/1'));
        } else {
         
                $data = array(
                    'vehicle_id' => $vehicle_id,
                    'maintenance_date' => $maintenance_date,
                    'expenses' => $expenses,
                   
                    'details' => $details,
                    'entry_date' => date("Y-m-d"),
                  
                    'modified_date' => $date
                );
            
            $this->db->insert(tablename('vehicle-maintenance'), $data);
       //  echo   $this->db->last_query();exit;
             $this->session->set_flashdata('successmessage', 'Details added successfully');
            redirect(base_url('page/58/1'));
        }
    }
    
    public function modify_asignment($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $vehicle_id= $this->input->post('vehicle_id');
        $employe_id= $this->input->post('employee_id');
        $designation= $this->input->post('designation');
        $from_date= $this->input->post('from_date');
        $to_date= $this->input->post('to_date');
       


        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'vehicle_id' => $vehicle_id,
                   
                    'employe_id' => $employe_id,
                     'from_date' => $from_date,
                     'to_date' => $to_date,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('vehicle-asignment'), $data);
            $this->session->set_flashdata('successmessage', 'Vehicles modified successfully');
            redirect(base_url('page/60/1'));
        } else {
         
                $data = array(
                   'vehicle_id' => $vehicle_id,
                    
                    'employe_id' => $employe_id,
                    'entry_date' => date("Y-m-d"),
                    'from_date' => $from_date,
                     'to_date' => $to_date,
                    'modified_date' => $date
                );
         //   echo '<pre>'; print_r($data);exit;
            $this->db->insert(tablename('vehicle-asignment'), $data);
        // echo   $this->db->last_query();exit;
             $this->session->set_flashdata('successmessage', 'Details added successfully');
            redirect(base_url('page/60/1'));
        }
    }



    /**
     * Used for get vehicles by id
     *
     * <p>Description</p>
     *
     * <p>This function get vehicles by id from table [Table: vehicles]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('vehicles'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
    
      public function load_single_vehicle_maintenance($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-maintenance'));
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }
     public function load_single_vehicle_asignment($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-asignment'));
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
     * Used for delete vehicles
     *
     * <p>Description</p>
     *
     * <p>This function delete vehicles [Table: vehicles]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('vehicles'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('vehicles', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Vehicles Deleted successfully');
            redirect(base_url('page/48/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/48/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Vehicles not matched');
            redirect(base_url('page/48/1'));
        }
    }
    
    public function maintenance_delete($id) {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-maintenance'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('vehicle-maintenance', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Vehicles Deleted successfully');
            redirect(base_url('page/58/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/58/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Vehicles not matched');
            redirect(base_url('page/58/1'));
        }
    }
     public function asignment_delete($id) {
        $this->db->select('*');
        $this->db->from(tablename('vehicle-asignment'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('vehicle-asignment', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Vehicles Deleted successfully');
            redirect(base_url('page/60/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/60/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Vehicles not matched');
            redirect(base_url('page/60/1'));
        }
    }

    /***************** 13.04.19 *********************/

     public function get_today_employee_leave() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->where('MONTH(t1.leave_from)', date('m'));
        $this->db->or_where('MONTH(t1.leave_to)', date('m'));
        $this->db->where('t1.approved', 'Yes');
        $query = $this->db->get();
        $total_leave_taken = $query->result();
        //echo $this->db->last_query() ; die;
       //  echo "<pre>";print_r($total_leave_taken);exit;

        if (!empty($total_leave_taken)) {

                $leavetakeArr=array();
             
                foreach ($total_leave_taken as $leave_take) {
                 $allleavedates = new DatePeriod(
             new DateTime($leave_take->leave_from),
             new DateInterval('P1D'),
             new DateTime($leave_take->leave_to)
        );
           
             foreach ($allleavedates as $key => $value) {
               // echo $value->format('Y-m-d').'@'; exit;           
               if(date('d',strtotime($value->format('Y-m-d'))) == date('d')){                           
                $leavetakeArr[]=$value->format('Y-m-d');
            }
                }

                if(date('d',strtotime($leave_take->leave_to)) == date('d')){                           
                 array_push($leavetakeArr,$leave_take->leave_to);
            }
               

             } 

             //echo "<pre>";print_r($leavetakeArr);exit;
            return $leavetakeArr;
        } else {
            return array();
        }
    }

     public function get_new_joining() {
        $this->db->select('t1.*');
        $this->db->from(tablename('employee') . ' as t1');
        $this->db->where('t1.hire_date', date('Y-m-d'));
        $this->db->where('t1.is_active', 'Y'); 
        $this->db->where('t1.delete_flag', 'N'); 
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
       //  echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
               
            return $result;
        } else {
            return array();
        }
    }


    public function get_leave_request() {
        $this->db->select('t1.*, t2.first_name, t2.middle_name, t2.last_name, t2.employee_no, t2.personal_image, t2.grade');
        $this->db->from(tablename('employee_leave_application') . ' as t1');
        $this->db->join(tablename('employee'). ' as t2', 't1.employee_id = t2.id');
        $this->db->where('t1.create_date', date('Y-m-d'));
        $this->db->where('t1.approved<>', 'Yes');
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query() ; die;
        //  echo "<pre>";print_r($result);exit;

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
    

    public function get_total_attendence_of_employee($employee_id='',$month=NULL,$year=NULL) {
        $this->db->select('t1.*');
        $this->db->from(tablename('attendance') . ' as t1');
      //  $this->db->where('t1.payroll_month    ', $month);
       
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
      //  $this->db->where('t1.payroll_month    ', $month);
       
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


     public function get_upcoming_bday() {
        //$sql = "SELECT * FROM HR_employee WHERE MONTH(STR_TO_DATE(`dob`, '%Y-%m-%d')) = MONTH(NOW())"; // current month bday
        $sql = "SELECT * FROM HR_employee WHERE delete_flag = 'N' AND is_active = 'Y' AND DATE_ADD(dob, INTERVAL YEAR(CURDATE())-YEAR(dob) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(dob),1,0) YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)"; // one week bday
        $query = $this->db->query($sql);
        $result = $query->result();
        //echo $this->db->last_query() ; die;
       //  echo "<pre>";print_r($result);exit;
	   

        if (!empty($result)) {               
            return $result;
        } else {
            return array();
        }
    }

    public function get_upcoming_work_anniversary() {
//               $sql = "select * from 
// HR_employee where 
//     dayofyear(`hire_date`) between dayofyear(curdate())-10 and dayofyear(curdate())"; // current day anni

 $sql = "SELECT * FROM HR_employee WHERE delete_flag = 'N' AND is_active = 'Y' AND DATE_ADD(hire_date, INTERVAL YEAR(CURDATE())-YEAR(hire_date) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(hire_date),1,0) YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)"; // one week work_anniversary
        $query = $this->db->query($sql);
        $result = $query->result();
        //echo $this->db->last_query() ; die;
       //  echo "<pre>";print_r($result);exit;

        if (!empty($result)) {               
            return $result;
        } else {
            return array();
        }
    }

    public function get_upcoming_joining() {
        $sql = "select * from HR_employee where delete_flag = 'N' AND is_active = 'Y' AND `hire_date` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)"; 
        $query = $this->db->query($sql);
        $result = $query->result();
        //echo $this->db->last_query() ; die;
       //  echo "<pre>";print_r($result);exit;

        if (!empty($result)) {               
            return $result;
        } else {
            return array();
        }
    }
	
	  public function get_upcoming_joining_this_year() {
        $sql = "select * from HR_employee where delete_flag = 'N' AND is_active = 'Y' AND YEAR(`hire_date`) = '2020'"; 
        $query = $this->db->query($sql);
        $result = $query->result();
        //echo $this->db->last_query() ; die;
       //  echo "<pre>";print_r($result);exit;

        if (!empty($result)) {               
            return $result;
        } else {
            return array();
        }
    }
	
	
	

	
	 public function all_leave_request() {
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image');
        $this->db->from(tablename('employee_leave_application'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t1.approved', NULL); 
		$this->db->where('t2.is_active', 'Y'); 
        $this->db->where('t2.delete_flag', 'N'); 
		//$this->db->or_where('t1.approved', 'No');
		
		
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
	
	 public function all_leave_request_emp() {
		 $curdate = date('Y-m-d');
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image');
        $this->db->from(tablename('employee_leave_application'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t2.is_active', 'Y'); 
        $this->db->where('t2.delete_flag', 'N'); 
		///$this->db->where('t1.approved', NULL); 
		if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){
			$this->db->where('t1.employee_id', $this->session->userdata('futureAdmin')->detail->employee_id); 
		}
		$this->db->where('t1.leave_from >= ', $curdate); 
		//$this->db->or_where('t1.approved', 'No');
		
		
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
	
	 public function all_timeoff_request() {
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image');
        $this->db->from(tablename('timeoff'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t1.approved', NULL); 
		$this->db->where('t1.is_active', 'Y'); 
        $this->db->where('t1.delete_flag', 'N'); 
		$this->db->where('t2.is_active', 'Y'); 
        $this->db->where('t2.delete_flag', 'N'); 
		//$this->db->or_where('t1.approved', 'No');
		
		
       /* if(isset($_GET['start_date']) && isset($_GET['end_date'])){
            $where = "(t1.leave_from >= '".$_GET['start_date']."' AND t1.leave_from <= '".$_GET['end_date']."')";
            $this->db->where($where); 
            $this->db->order_by('t1.leave_from', 'desc'); 
        }  */ 
        //$this->db->order_by("leave_from");
        $query = $this->db->get();
        $result = $query->result();
		//echo '<pre>'; echo $this->db->last_query(); die;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
	
	
	 public function all_timeoff_request_emp() {
		 $curdate = date('Y-m-d');
		 $where = "(t1.date >= '".$curdate."' OR t1.from_date >= '".$curdate."')";
        $this->db->select('t1.*,t2.employee_no,t2.first_name,t2.last_name,t2.personal_image');
        $this->db->from(tablename('timeoff'). ' as t1');
        $this->db->join('employee as t2', 't2.id = t1.employee_id', 'left');
		$this->db->where('t2.is_active', 'Y'); 
        $this->db->where('t2.delete_flag', 'N'); 
		//$this->db->where('t1.approved', NULL); 
		if($this->session->userdata('futureAdmin')->detail->employee_id != '0'){
			$this->db->where('t1.employee_id', $this->session->userdata('futureAdmin')->detail->employee_id); 
		}
		$this->db->where($where); 
		
		//$this->db->or_where('t1.approved', 'No');
		
		
       /* if(isset($_GET['start_date']) && isset($_GET['end_date'])){
            $where = "(t1.leave_from >= '".$_GET['start_date']."' AND t1.leave_from <= '".$_GET['end_date']."')";
            $this->db->where($where); 
            $this->db->order_by('t1.leave_from', 'desc'); 
        }  */ 
        //$this->db->order_by("leave_from");
        $query = $this->db->get();
        $result = $query->result();
		//echo '<pre>';
//echo $this->db->last_query(); //die;
        if (!empty($result)) {
            return $result;
        } else {
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
     //  echo '<pre>'; print_r($result); die;
		 if (!empty($result)) {
			 return $result;
        } else {
            return array();
        }
        
    }
}
/* End of file VehiclesModel.php */
/* Location: ./application/modules/vehicles/models/admin/VehiclesModel.php */