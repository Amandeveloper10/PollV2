<?php
/**
 * leave_rules Model Class. Handles all the datatypes and methodes required for handling leave_rules
 */
class LeaveRulesModel extends CI_Model {

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
     * Used for loading functionality of leave_rules for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the leave_rules that has been added by current admin [Table: master_leave_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
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
     * <p>This function Used for add/edit leave_rules</p>
     *
     * @access  public
     * @param   id
     * @return string
     */

     public function modify($id) {  
      //echo "<pre>"; print_r($_POST); die;

        $rule_name= $this->input->post('rule_name');
        $encahasable= $this->input->post('encahasable1');
        $carried_forward= $this->input->post('carried_forward1');
        $credit_month= $this->input->post('credit_month');
        $unit= $this->input->post('unit');
        $period_day= $this->input->post('period_day');
        $period_month= $this->input->post('period_month'); 
        $is_entitlement_situational= $this->input->post('is_entitlement_situational1'); 
        $status= $this->input->post('status1'); 

        $carried_forward_type= $this->input->post('carried_forward_type'); 
        $carriedforward_value= $this->input->post('carriedforward_value'); 

        $encahasable_type= $this->input->post('encahasable_type'); 
        $encahasable_value= $this->input->post('encahasable_value'); 
        $applicable_for = ($this->input->post('applicable_for')) ? implode(',', $this->input->post('applicable_for')) :'' ;
        $date = date("Y-m-d H:i:s");

        if (!empty($id)) {
                $data = array(
                    'rule_name' =>  $rule_name,
                    'encahasable' => $encahasable,
                    'carried_forward' => $carried_forward,
                    'credit_month' => $credit_month,
                    'unit' => $unit,
                    'period_day' => $period_day,
                    'period_month' => $period_month,
                    'is_entitlement_situational' => $is_entitlement_situational,
                    'status' => $status,
                    'applicable_for' =>$applicable_for,
                    'modified_date' => $date
                );

                if($carried_forward == 'Yes'){
                    $data['carried_forward_type']= $carried_forward_type;
                    $data['carriedforward_value']= $carriedforward_value;
                }else{
                     $data['carried_forward_type']= '';
                    $data['carriedforward_value']= '';
                }

                 if($encahasable == 'Yes'){
                    $data['encahasable_type']= $encahasable_type;
                    $data['encahasable_value']= $encahasable_value;
                }else{
                     $data['encahasable_type']= '';
                    $data['encahasable_value']= '';
                }
           
            $this->db->where('id', $id)->update(tablename('master_leave_rules'), $data);
            $this->session->set_flashdata('successmessage', 'Leave Rules modified successfully');
            redirect(base_url('page/25/1'));
        } else {
         
                $data = array(
                    'rule_name' =>  $rule_name,
                    'encahasable' => $encahasable,
                    'carried_forward' => $carried_forward,
                    'credit_month' => $credit_month,
                    'unit' => $unit,
                    'period_day' => $period_day,
                    'period_month' => $period_month,
                    'is_entitlement_situational' => $is_entitlement_situational,
                    'status' => $status,
                    'applicable_for' =>$applicable_for,
                    'entry_date' => $date
                );

                if($carried_forward == 'Yes'){
                    $data['carried_forward_type']= $carried_forward_type;
                    $data['carriedforward_value']= $carriedforward_value;
                }else{
                     $data['carried_forward_type']= '';
                    $data['carriedforward_value']= '';
                }

                 if($encahasable == 'Yes'){
                    $data['encahasable_type']= $encahasable_type;
                    $data['encahasable_value']= $encahasable_value;
                }else{
                     $data['encahasable_type']= '';
                    $data['encahasable_value']= '';
                }
            
            $this->db->insert(tablename('master_leave_rules'), $data);
            
             $this->session->set_flashdata('successmessage', 'Leave Rules added successfully');
            redirect(base_url('page/25/1'));
        }
    }



    /**
     * Used for get leave_rules by id
     *
     * <p>Description</p>
     *
     * <p>This function get leave_rules by id from table [Table: master_leave_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_single_data($id = "") {
        $this->db->select('*');
        $this->db->from(tablename('master_leave_rules'));
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
     * Used for status leave_rules
     *
     * <p>Description</p>
     *
     * <p>This function status leave_rules [Table: master_leave_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function status_change($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_leave_rules'));
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
            if ($this->db->update('master_leave_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Leave Rules Status changed successfully');
            redirect(base_url('page/25/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/25/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Leave Rules not matched');
            redirect(base_url('page/25/1'));
        }
    }

    /**
     * Used for delete leave_rules
     *
     * <p>Description</p>
     *
     * <p>This function delete leave_rules [Table: master_leave_rules]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function delete_this($id) {
        $this->db->select('*');
        $this->db->from(tablename('master_leave_rules'));
        $this->db->where('id', $id);
        $this->db->where('delete_flag', 'N');
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {            
            $update_faq = array('is_active' => 'N','delete_flag'=> 'Y');
            $this->db->where('id', $id);
            if ($this->db->update('master_leave_rules', $update_faq)) {
            $this->session->set_flashdata('successmessage', 'Leave Rules Deleted successfully');
            redirect(base_url('page/25/1'));
            } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
            redirect(base_url('page/25/1'));
            }
        } else {
            $this->session->set_flashdata('errormessage', 'Leave Rules not matched');
            redirect(base_url('page/25/1'));
        }
    }

    public function get_row_data_orderby($table, $where) {
      $this->db->order_by("id", "desc"); 
        $this->db->limit(1);
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }


   
 
}
/* End of file LeaveRulesModel.php */
/* Location: ./application/modules/leave_rules/Models/admin/LeaveRulesModel.php */