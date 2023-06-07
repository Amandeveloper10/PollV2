<?php
/**
 * employees Model Class. Handles all the datatypes and methodes required for handling employees
 */
class EmployeesModel extends CI_Model {

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
     * Used for loading functionality of employees for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the employees that has been added by current admin [Table: employee]</p>
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
     * <p>This function Used for add/edit employees</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;


        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');
        $last_name = $this->input->post('last_name');
        $pan_no = $this->input->post('pan_no');
        $new_pan_no_img = $this->input->post('new_pan_no_img');
        $aadhar_no= $this->input->post('aadhar_no');
        $new_aadhar_no_img = $this->input->post('new_aadhar_no_img');        
        $passport_no = $this->input->post('passport_no');
        $new_passport_no_img = $this->input->post('new_passport_no_img');
        $voter_no = $this->input->post('voter_no');
        $new_voter_no_img = $this->input->post('new_voter_no_img');
        $driving_no = $this->input->post('driving_no');
        $new_driving_no_img = $this->input->post('new_driving_no_img');
        $ration_no = $this->input->post('ration_no');
        $new_ration_no_img = $this->input->post('new_ration_no_img');
        $gender = $this->input->post('gender');
        $marital_status = $this->input->post('marital_status');
        $nationality = $this->input->post('nationality');
        $dob = $this->input->post('dob');
        $dom = $this->input->post('dom');
        $contact_name = $this->input->post('contact_name');
        $contact_relation = $this->input->post('contact_relation');
        $contact_phone = $this->input->post('contact_phone');
        $contact_mobile = $this->input->post('contact_mobile');
        $contact_email = $this->input->post('contact_email');
        $address = $this->input->post('address');
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $pin = $this->input->post('pin');
        $country = $this->input->post('country');
        $email_personal = $this->input->post('email_personal');
        $phone = $this->input->post('phone');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $employee_code = $this->input->post('employee_code');
        $email_work = $this->input->post('email_work');
        $grade = $this->input->post('grade');
        $designation = $this->input->post('designation');
        $department = $this->input->post('department');
        $status = $this->input->post('status');
        $location = $this->input->post('location');
        $report_to = $this->input->post('report_to');
        $joining_date = $this->input->post('joining_date');
        $confirmation_date = $this->input->post('confirmation_date');
        $probation_period = $this->input->post('probation_period');
        $contract_start_date = $this->input->post('contract_start_date');
        $contract_end_date = $this->input->post('contract_end_date');
        $notice_period = $this->input->post('notice_period');




        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'date_set' => $date_set,
                    'job_opening_no' => $job_opening_no,
                    'candidate_id' => $candidate_id,
                    'interviewer' => $interviewer,
                    'location' => $location,
                    'int_date_time'=> $int_date_time,
                    'comment' => $comment,
                    'mail_candidate' => $mail_candidate,
                    'mail_interviewer' => $mail_interviewer,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('employee'), $data);

            $this->session->set_flashdata('successmessage', 'Employees modified successfully');
            redirect(base_url('page/40/1'));
        } else {
         
                $data = array(
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'pan_no' => $pan_no,
                    'new_pan_no_img' => $new_pan_no_img,
                    'aadhar_no' => $aadhar_no,
                    'new_aadhar_no_img' => $new_aadhar_no_img,
                    'passport_no' => $passport_no,
                    'new_passport_no_img' => $new_passport_no_img,
                    'voter_no' => $voter_no,
                    'new_voter_no_img' => $new_voter_no_img,
                    'driving_no' => $driving_no,
                    'new_driving_no_img' => $new_driving_no_img,
                    'ration_no' => $ration_no,
                    'new_ration_no_img' => $new_ration_no_img,
                    'gender' => $gender,
                    'marital_status' => $marital_status,
                    'nationality' => $nationality,
                    'dob' => $dob,
                    'dom' => $dom,
                    'contact_name' => json_encode($contact_name),
                    'contact_relation' => json_encode($contact_relation),
                    'contact_phone' => json_encode($contact_phone),
                    'contact_mobile' => json_encode($contact_mobile),
                    'contact_email' => json_encode($contact_email),
                    'address' => $address,
                    'state' => $state,
                    'city' => $city,
                    'pin' => $pin,
                    'country' => $country,
                    'email_personal' => $email_personal,
                    'phone' => $phone,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'employee_code' => $employee_code,
                    'email_work' => $email_work,
                    'grade' => $grade,
                    'designation' => $designation,
                    'department' => $department,
                    'status' => $status,
                    'location' => $location,
                    'report_to' => $report_to,
                    'joining_date' => $joining_date,
                    'confirmation_date' => $confirmation_date,
                    'probation_period' => $probation_period,
                    'contract_start_date' => $contract_start_date,
                    'contract_end_date' => $contract_end_date,
                    'notice_period' => $notice_period,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('employee'), $data);
            
             $this->session->set_flashdata('successmessage', 'Employees added successfully');
            redirect(base_url('page/40/1'));
        }
    }



    /**
     * Used for get employees by id
     *
     * <p>Description</p>
     *
     * <p>This function get employees by id from table [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
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

    /**
     * Used for get employees exp/edu/att by id 
     *
     * <p>Description</p>
     *
     * <p>This function get employees exp/edu/attby id from table [Table: employee exp/edu/att]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data_details($table="", $id = "") {
        $this->db->select('*');
        $this->db->from(tablename($table));
        $this->db->where('rec_candidate_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {           
            return $result;
        } else {
            return array();
        }
    }

 /**
     * Used for status employees
     *
     * <p>Description</p>
     *
     * <p>This function status employees [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('employee'));
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
            if ($this->db->update('employee', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Employees Status changed successfully');
            redirect(base_url('page/40/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/40/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Employees not matched');
            redirect(base_url('page/40/1'));
        }
    }

    /**
     * Used for delete employees
     *
     * <p>Description</p>
     *
     * <p>This function delete employees [Table: employee]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('employee'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('employee', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Employees Deleted successfully');
            redirect(base_url('page/40/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/40/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Employees not matched');
            redirect(base_url('page/40/1'));
        }
    }
 
}
/* End of file EmployeesModel.php */
/* Location: ./application/modules/employees/models/admin/EmployeesModel.php */