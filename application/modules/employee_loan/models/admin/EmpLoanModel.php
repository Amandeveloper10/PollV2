<?php

/**
 * employee_leave Model Class. Handles all the datagrade_ids and methodes required for handling employee_leave
 */
class EmpLoanModel extends CI_Model {

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
        $this->db->select('HR_employee_loan_application.*,HR_employee.first_name,HR_employee.middle_name,HR_employee.last_name,HR_employee.employee_no');
        $this->db->from(tablename('employee_loan_application'));
        $this->db->join('HR_employee', 'HR_employee_loan_application.employee_id = HR_employee.id');
        //$this->db->where('HR_employee_loan_application.employee_id', $id);
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
         //echo '<pre>'; print_r($_POST); die;  
      /* $this->db->select('t1.*');
        $this->db->from(tablename('employee_loan_application') . ' as t1');
        $this->db->where('t1.employee_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result->attachment)) {
            $allattach = $result->attachment;
        } else {
            $allattach = '';
        }
        $employee_id = $id;
        $reference_name = $this->input->post('reference_name');
        $request_amount = $this->input->post('request_amount');
        $loan_requirement_note = $this->input->post('loan_requirement_note');

        $attachmentfileall = '';
        $attachmentfile = '';
        $attachment = $_FILES['attachment'];
    
        if (!empty($attachment)) {
            for ($i = 0; $i <= count($attachment['name']); $i++) {

                if (!empty($attachment['name'][$i])) {

                    $attachment_doc = $this->upload_files_new($attachment['name'][$i], $attachment['tmp_name'][$i]);
                    $attachmentfile.=$attachment_doc . ',';
                }
            }
            $attachmentfile = $attachmentfile . $allattach;
            if (!empty($attachmentfile)) {
                $attachmentfileall = rtrim($attachmentfile, ',');
            }
        }*/
       $employee_id = $this->input->post('employee_id');
         $reference_name = $this->input->post('reference_name');
        $request_amount = $this->input->post('request_amount');
        $loan_requirement_note = $this->input->post('loan_requirement_note');
        $loan_approved = $this->input->post('loan_approved_hidden');
        $loan_sanction_note = $this->input->post('loan_sanction_note');
        $sanction_amount = $this->input->post('sanction_amount');
        $installment_amount = $this->input->post('installment_amount');
        $installment_start_date = $this->input->post('installment_start_date');
        $deduction_from_salary = $this->input->post('deduction_from_salary_hidden');
        $loan_issue_date = $this->input->post('loan_issue_date');
        $tenure_in_months = $this->input->post('tenure_in_months');
        $loan_end_date = $this->input->post('loan_end_date');
        $loan_cancel_note = $this->input->post('loan_cancel_note');





        //echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;
//        if (!empty($result)) {
//            return $result;
//        }



        if ($this->input->post('loan_application_edit_id') != '') {

            //$data['employee_id'] = $id;
            $data['reference_name'] = $reference_name;
            $data['request_amount'] = $request_amount;
            $data['loan_requirement_note'] = $loan_requirement_note;
           /* if (!empty($attachmentfileall)) {
                $data['attachment'] = $attachmentfileall;
            }*/
            $data['loan_approved'] = $loan_approved;
            $data['loan_sanction_note'] = $loan_sanction_note;
            $data['sanction_amount'] = $sanction_amount;
            $data['installment_amount'] = $installment_amount;
            $data['installment_start_date'] = $installment_start_date;
            $data['deduction_from_salary'] = $deduction_from_salary;
            $data['loan_issue_date'] = $loan_issue_date;
            $data['tenure_in_months'] = $tenure_in_months;
            $data['loan_end_date'] = $loan_end_date;
            $data['loan_cancel_note'] = $loan_cancel_note;
             $data['employee_id'] = $employee_id;
            //$data['society_of_engineers'] = $society_of_engineers;


            $this->db->where('id', $this->input->post('loan_application_edit_id'))->update(tablename('employee_loan_application'), $data);
//echo $this->db->last_query();exit;
            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            redirect(base_url('page/85/1'));
            //  redirect(base_url('edit_employees_details/' . $id));
        } else {

            $data['employee_id'] = $employee_id;
            $data['reference_name'] = $reference_name;
            $data['request_amount'] = $request_amount;
            $data['loan_requirement_note'] = $loan_requirement_note;
            /*if (!empty($attachmentfileall)) {
                $data['attachment'] = $attachmentfileall;
            }*/
            $data['loan_approved'] = $loan_approved;
            $data['loan_sanction_note'] = $loan_sanction_note;
            $data['sanction_amount'] = $sanction_amount;
            $data['installment_amount'] = $installment_amount;
            $data['installment_start_date'] = $installment_start_date;
            $data['deduction_from_salary'] = $deduction_from_salary;
            $data['loan_issue_date'] = $loan_issue_date;
            $data['tenure_in_months'] = $tenure_in_months;
            $data['loan_end_date'] = $loan_end_date;
            $data['loan_cancel_note'] = $loan_cancel_note;



            $this->db->insert(tablename('employee_loan_application'), $data);
            $insert_id = $this->db->insert_id();

            $this->session->set_flashdata('successmessage', 'Loan added successfully');
            redirect(base_url('page/85/1'));
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
        $this->db->from(tablename('employee_loan_application'));
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

    public function delete_this($id) {
       // echo $id; die;
        
      
        if (!empty($id)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            $this->db->delete('HR_employee_loan_application');
            $this->session->set_flashdata('successmessage', 'Loan Application Deleted successfully');
            redirect(base_url('page/85/1'));
            
        } else {
            $this->session->set_flashdata('errormessage', 'Loan Application not matched');
            redirect(base_url('page/85/1'));
        }
    }


}

/* End of file EmpLeaveModel.php */
/* Location: ./application/modules/employee_leave/models/admin/Model.php */