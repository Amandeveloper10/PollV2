<?php
/**
 * attendance_rules Model Class. Handles all the datamin_hrs_for_full_days and methodes required for handling attendance_rules
 */
class AttRulesModel extends CI_Model {

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
     * <p>This function Used for add/edit attendance_rules</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;
        //$grade= $this->input->post('grade');
        $work_shift_id= $this->input->post('work_shift_id');

        $min_hrs_for_half_day= $this->input->post('min_hrs_for_half_day');
        $min_hrs_for_full_day= $this->input->post('min_hrs_for_full_day');
        $incomplete_present_for_less_then= $this->input->post('incomplete_present_for_less_then');
        $over_time_after_hour= $this->input->post('over_time_after_hour');
        $date = date("Y-m-d H:i:s");
        $leave_type = ($this->input->post('leave_type')) ? implode(',', $this->input->post('leave_type')) :'' ;
        $nos= $this->input->post('nos'); 
        $day_type= $this->input->post('day_type'); 
        $leave_type_half = ($this->input->post('leave_type_half')) ? implode(',', $this->input->post('leave_type_half')) :'' ;
        $nos_half= $this->input->post('nos_half'); 
       

         if (!empty($id)) {
        $data = array(
            //'grade' =>  $grade,
            'work_shift_id'=>$work_shift_id,
            'day_type' => $day_type,
            'leave_type_half' => $leave_type_half,
            'nos_half' => $nos_half,
            'leave_type' => $leave_type,
            'nos' => $nos,
            'min_hrs_for_half_day' =>  $min_hrs_for_half_day,
            'min_hrs_for_full_day' => $min_hrs_for_full_day,
            'incomplete_present_for_less_then' => $incomplete_present_for_less_then,
            'over_time_after_hour' => $over_time_after_hour,
            'modified_date' => $date
        );
   
        $this->db->where('id', $id)->update(tablename('master_attendance_rules'), $data);
        $this->session->set_flashdata('successmessage', 'Attendance Rules modified successfully');
        redirect(base_url('page/24/1'));
    }else{
        $data = array(
            //'grade' =>  $grade,
            'work_shift_id'=>$work_shift_id,
            'day_type' => $day_type,
            'leave_type_half' => $leave_type_half,
            'nos_half' => $nos_half,
            'leave_type' => $leave_type,
            'nos' => $nos,
            'min_hrs_for_half_day' =>  $min_hrs_for_half_day,
            'min_hrs_for_full_day' => $min_hrs_for_full_day,
            'incomplete_present_for_less_then' => $incomplete_present_for_less_then,
            'over_time_after_hour' => $over_time_after_hour,
            'entry_date' => $date
        );
        $this->db->insert(tablename('master_attendance_rules'), $data);
        $this->session->set_flashdata('successmessage', 'Attendance Rules added successfully');
        redirect(base_url('page/24/1'));
    }
        
    }



    /**
     * Used for get attendance_rules by id
     *
     * <p>Description</p>
     *
     * <p>This function get attendance_rules by id from table [Table: master_attendance_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_attendance_rules'));
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
     * Used for loading functionality of attendance_rules for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the attendance_rules that has been added by current admin [Table: attendance_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_attendance_rules') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->result();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

     /*public function check_grade($grade_id=NULL,$rule_id=NULL) {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_attendance_rules') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.grade', $grade_id);
        $this->db->where('t1.id<>', $rule_id);
        $query = $this->db->get();
        $result = $query->row();
       // echo $this->db->last_query() ; die;
        // echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }*/

    public function check_grade($work_shift_id=NULL,$rule_id=NULL,$day_type=NULL) {
        $this->db->select('t1.*'); 
        $this->db->from(tablename('master_attendance_rules') . ' as t1');
        $this->db->where('t1.delete_flag', 'N');
        $this->db->where('t1.work_shift_id', $work_shift_id);
        $this->db->where('t1.day_type', $day_type);
        $this->db->where('t1.id<>', $rule_id);
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

     /**
     * Used for status attendance_rules
     *
     * <p>Description</p>
     *
     * <p>This function status attendance_rules [Table: master_attendance_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_attendance_rules'));
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
            if ($this->db->update('master_attendance_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Attendance Rule Status changed successfully');
            redirect(base_url('page/24/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/24/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Attendance Rule not matched');
            redirect(base_url('page/24/1'));
        }
    }

    /**
     * Used for delete attendance_rules
     *
     * <p>Description</p>
     *
     * <p>This function delete attendance_rules [Table: master_attendance_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_attendance_rules'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_attendance_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Attendance Rule Deleted successfully');
            redirect(base_url('page/24/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/24/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Attendance Rule not matched');
            redirect(base_url('page/24/1'));
        }
    }
}
/* End of file AttRulesModel.php */
/* Location: ./application/modules/attendance_rules/Models/admin/AttRulesModel.php */