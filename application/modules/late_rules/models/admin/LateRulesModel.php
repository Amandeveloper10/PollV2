<?php
/**
 * late_rules Model Class. Handles all the datatypes and methodes required for handling late_rules
 */
class LateRulesModel extends CI_Model {

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
     * Used for loading functionality of late_rules for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the late_rules that has been added by current admin [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
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
     * <p>This function Used for add/edit late_rules</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;
        $rule_name= $this->input->post('rule_name');
        $type= $this->input->post('type');
        $no_of_occu_allowed= $this->input->post('no_of_occu_allowed');
        
        $deduction_apply1= $this->input->post('deduction_apply1');        
        //$leave_type= $this->input->post('leave_type');
        $nos= $this->input->post('nos'); 
        $occurrence_type= $this->input->post('occurrence_type');       
        $grade_id = ($this->input->post('grade_id')) ? implode(',', $this->input->post('grade_id')) :'' ;
        $dept_id = ($this->input->post('dept_id')) ? implode(',', $this->input->post('dept_id')) :'' ;
        $include = ($this->input->post('include')) ? implode(',', $this->input->post('include')) :'' ;
        $leave_type = ($this->input->post('leave_type')) ? implode(',', $this->input->post('leave_type')) :'' ;
        

        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'grade_id' =>  $grade_id,
                     'dept_id' =>  $dept_id,
                    'rule_name' =>  $rule_name,
                    'type' => $type,
                    'no_of_occu_allowed' => $no_of_occu_allowed,
                    'include' => $include,
                    'deduction_apply' => $deduction_apply1,
                    'leave_type' => $leave_type,
                    'occurrence_type' =>$occurrence_type,
                    'nos' => $nos,
                    'modified_date' => $date
                );
           
            $this->db->where('id', $id)->update(tablename('master_late_rules'), $data);
            $this->session->set_flashdata('successmessage', 'Late Rule modified successfully');
            redirect(base_url('page/23/1'));
        } else {
         
                $data = array(
                     'grade_id' =>  $grade_id,
                     'dept_id' =>  $dept_id,
                    'rule_name' =>  $rule_name,
                    'type' => $type,
                    'no_of_occu_allowed' => $no_of_occu_allowed,
                    'include' => $include,
                    'deduction_apply' => $deduction_apply1,
                    'leave_type' => $leave_type,
                    'occurrence_type' =>$occurrence_type,
                    'nos' => $nos,
                    'entry_date' => $date
                );
            
            $this->db->insert(tablename('master_late_rules'), $data);
            
             $this->session->set_flashdata('successmessage', 'Late Rule added successfully');
            redirect(base_url('page/23/1'));
        }
    }



    /**
     * Used for get late_rules by id
     *
     * <p>Description</p>
     *
     * <p>This function get late_rules by id from table [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_late_rules'));
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
     * Used for status late_rules
     *
     * <p>Description</p>
     *
     * <p>This function status late_rules [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_late_rules'));
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
            if ($this->db->update('master_late_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Salary rule_name Status changed successfully');
            redirect(base_url('page/23/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/23/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Salary rule_name not matched');
            redirect(base_url('page/23/1'));
        }
    }

    /**
     * Used for delete late_rules
     *
     * <p>Description</p>
     *
     * <p>This function delete late_rules [Table: master_late_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_late_rules'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_late_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Salary rule_name Deleted successfully');
            redirect(base_url('page/23/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/23/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Salary rule_name not matched');
            redirect(base_url('page/23/1'));
        }
    }
 
}
/* End of file LateRulesModel.php */
/* Location: ./application/modules/late_rules/Models/admin/LateRulesModel.php */