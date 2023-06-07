<?php
/**
 * grade Model Class. Handles all the datatypes and methodes required for handling grade
 */
class GradeModel extends CI_Model {

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
     * Used for loading functionality of grade for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the grade that has been added by current admin [Table: master_grade]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_grade') . ' as t1');
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
    
     public function load_leave_rule() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_leave_rules') . ' as t1');
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
     public function load_work_shift() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_work_shift') . ' as t1');
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
     public function load_over_time() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_overtime_rules') . ' as t1');
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
     public function load_late() {
        $this->db->select('t1.*');
        $this->db->from(tablename('master_late_rules') . ' as t1');
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
     * <p>This function Used for add/edit grade</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
        //echo "<pre>"; print_r($_POST); die;
        $grade_name= $this->input->post('grade_name');
        $min_salary= $this->input->post('min_salary');
        $max_salary= $this->input->post('max_salary');
        $leave_rule_id= implode(',',$this->input->post('leave_rule_id'));
        $late_rule_id= $this->input->post('late_rule_id');
        $overtime_rule_id= $this->input->post('overtime_rule_id');
        $work_shift_id= $this->input->post('work_shift_id');
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'grade_name' =>  $grade_name,
                    'min_salary' => $min_salary,
                    'max_salary' => $max_salary,
                    'modified_date' => $date,
                    'leave_rule_id' =>  $leave_rule_id,
                    'late_rule_id' => $late_rule_id,
                    'overtime_rule_id' => $overtime_rule_id,
                    //'work_shift_id' => $work_shift_id
                );
           
            $this->db->where('id', $id)->update(tablename('master_grade'), $data);
            $this->session->set_flashdata('successmessage', 'grade modified successfully');
            redirect(base_url('page/8/1'));
        } else {
         
                $data = array(
                    'grade_name' =>  $grade_name,
                    'min_salary' => $min_salary,
                    'max_salary' => $max_salary,
                    'entry_date' => $date,
                    'leave_rule_id' =>  $leave_rule_id,
                    'late_rule_id' => $late_rule_id,
                    'overtime_rule_id' => $overtime_rule_id,
                    //'work_shift_id' => $work_shift_id
                );
            
            $this->db->insert(tablename('master_grade'), $data);
            
             $this->session->set_flashdata('successmessage', 'grade added successfully');
            redirect(base_url('page/8/1'));
        }
    }



    /**
     * Used for get grade by id
     *
     * <p>Description</p>
     *
     * <p>This function get grade by id from table [Table: master_grade]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_grade'));
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
     * Used for status grade
     *
     * <p>Description</p>
     *
     * <p>This function status grade [Table: master_grade]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_grade'));
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
            if ($this->db->update('master_grade', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'grade Status changed successfully');
            redirect(base_url('page/8/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/8/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'grade not matched');
            redirect(base_url('page/8/1'));
        }
    }

    /**
     * Used for delete grade
     *
     * <p>Description</p>
     *
     * <p>This function delete grade [Table: master_grade]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_grade'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_grade', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'grade Deleted successfully');
            redirect(base_url('page/8/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/8/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'grade not matched');
            redirect(base_url('page/8/1'));
        }
    }

       public function check_grade($grade = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_grade') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        $this->db->where('t1.grade_name', $grade);
        $this->db->where('t1.id<>', $id);
        $query = $this->db->get();
        $result = $query->row();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function check_min_max_sal($min = "",$max = "",$id = "") {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_grade') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.is_active', 'Y');
        if($min != '' && $max != ''){
        $this->db->where('min_salary >=',$min);
        $this->db->where('max_salary <=',$max);
        }elseif($min != '' && $max == ''){
            $this->db->like('min_salary', $min); 
        }elseif($min == '' && $max != ''){
            $this->db->like('max_salary', $max); 
        }
        if(!empty($id)){
            $this->db->where('t1.id<>', $id);
        }
        //$this->db->where('t1.id<>', $id);
        $query = $this->db->get();
        $result = $query->row();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    
 
}
/* End of file GradeModel.php */
/* Location: ./application/modules/grade/models/admin/GradeModel.php */